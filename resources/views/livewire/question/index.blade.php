<div>
      <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="fas fa-question-circle mr-1"></i>
                    {{ $title }}
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active"><i class="fas fa-question-circle mr-1"></i>{{ $title }}</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <!-- Tombol Tambah Data -->
                    <div>
                        <button wire:click="create" class="btn btn-md btn-primary" data-toggle="modal" data-target="#createModal">
                            <i class="fas fa-plus mr-1"></i>Tambah Data
                        </button>
                    </div>

                    <!-- Form Import Soal: [Download] [Input File] [Import] -->
                    <form wire:submit.prevent="importQuestions" class="d-flex align-items-center gap-2">
                        <label for="file" class="mb-0 mr-2 font-weight-bold">Import Soal:</label>

                        <!-- Button download template -->
                        <a href="{{ asset('tamplate/template_soal.xlsx') }}" class="btn btn-sm btn-success" download>
                            <i class="fas fa-download mr-1"></i>Template
                        </a>

                        <!-- Input file -->
                        <input type="file" wire:model="file" class="form-control form-control-sm" id="file" accept=".xlsx,.xls" style="width: 200px;">
                        @error('file')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror

                        <!-- Button import -->
                        <button type="submit" class="btn btn-sm btn-warning">
                            <i class="fas fa-file-import mr-1"></i>Import
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <div class="col-2">
                        <select wire:model.live="paginate" id="paginate" class="form-control">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="col-4"><div class="input-group mb-3">
                        <input wire:model.live="search"  type="text" class="form-control" placeholder="Pencarian...">
                        <div class="input-group-append">
                            <button wire:click="resetSearch" class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-times"></i></button>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive col-12">
                    <table class="table table-hover">
                        <tr class="bg-secondary">
                            <th>No</th>
                            <th>Tingkat</th>
                            <th>Mapel</th>
                            <th>Kategori</th>
                            <th>Soal</th>
                            <th>Status</th>
                            <th>
                                <i class="fas fa-cog"></i>
                            </th>
                        </tr>
                        @foreach ($questions as $question)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $question->level->name }}</td>
                                <td>{{ $question->subject->name }}</td>
                                <td>{{ $question->category->name }}</td>
                                <td class="text-truncate" style="max-width: 200px;">{{ $question->content }}</td>
                                <td>
                                    @if (session('active_role') === 'super admin' || session('active_role') === 'admin')
                                        <select wire:change="updateStatus({{ $question->id }}, $event.target.value)" class="form-control form-control-sm">
                                            <option value="review" {{ $question->status == 'review' ? 'selected' : '' }}>Review</option>
                                            <option value="ditolak" {{ $question->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                            <option value="diterima" {{ $question->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                        </select>
                                    @else
                                        <span class="badge badge-{{ $question->status === 'diterima' ? 'success' : ($question->status === 'ditolak' ? 'danger' : 'secondary') }}">
                                            {{ ucfirst($question->status) }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <button wire:click="show({{ $question->id }})" class="btn btn-sm btn-success" data-toggle="modal" data-target="#showModal">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button wire:click="edit({{ $question->id }})" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button wire:click="confirm({{ $question->id }})" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $questions->links() }}
                </div>
            </div>
        </div>

        </section>

        {{-- sukses import soal --}}
        @script
        <script>
                $wire.on('importQuestions', () => {
                    Swal.fire({
                        title: "Sukses!",
                        text: "Berhasil Import Soal",
                        icon: "success"
                    });
                });
            </script>
        @endscript
        {{-- sukses import soal --}}

        {{-- Create Modal --}}
        @include('livewire.question.create')
        {{-- Create Modal --}}

        {{-- Close Create Modal --}}
        @script
            <script>
                $wire.on('closeCreateModal', () => {
                    $('#createModal').modal('hide');

                    Swal.fire({
                        title: "Sukses!",
                        text: "Data berhasil ditambahkan",
                        icon: "success"
                    });
                });
            </script>
        @endscript
        {{-- Close Create Modal --}}

        {{-- Close Create Modal --}}
        @script
            <script>
                $wire.on('updateStatus', () => {
                    Swal.fire({
                        title: "Sukses!",
                        text: "Status berhasil diubah",
                        icon: "success"
                    });
                });
            </script>
        @endscript
        {{-- Close Create Modal --}}

        {{-- Edit Modal --}}
        @include('livewire.question.edit')
        {{-- Edit Modal --}}

        {{-- Close Edit Modal --}}
        @script
            <script>
                $wire.on('closeEditModal', () => {
                    $('#editModal').modal('hide');

                    Swal.fire({
                        title: "Sukses!",
                        text: "Data berhasil diubah",
                        icon: "success"
                    });
                });
            </script>
        @endscript
        {{-- Close Edit Modal --}}

        {{-- Delete Modal --}}
        @include('livewire.question.delete')
        {{-- Delete Modal --}}
        
        {{-- Close Delete Modal --}}
        @script
            <script>
                $wire.on('closeDeleteModal', () => {
                    $('#deleteModal').modal('hide');

                    Swal.fire({
                        title: "Sukses!",
                        text: "Data berhasil diubah",
                        icon: "success"
                    });
                });
            </script>
        @endscript
        {{-- Close Delete Modal --}}

        {{-- Show Modal --}}
        @include('livewire.question.show')
        {{-- Show Modal --}}
    </div>
    <!-- /.content-wrapper -->
</div>