<div>
      <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="fas fa-question mr-1"></i>
                    {{ $title }}
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active"><i class="fas fa-question mr-1"></i>{{ $title }}</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <button wire:click="create" class="btn btn-md btn-primary" data-toggle="modal" data-target="#createModal"><i class="fas fa-plus mr-1"></i>Tambah Data</button>
                    </div>
                    
                    <div class="btn-group dropleft">
                        <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-file-import mr-1"></i>
                            Import
                        </button>
                        <div class="dropdown-menu">
                            <div class="p-4 bg-light border rounded shadow-sm">
                                <form wire:submit.prevent="importQuestions">
                                    <div class="mb-3">
                                        <label for="file" class="form-label">Pilih File Excel</label>
                                        <input type="file" wire:model="file" class="form-control" id="file" accept=".xlsx,.xls">
                                        @error('file') 
                                            <div class="text-danger small mt-1">{{ $message }}</div> 
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-upload"></i> Import Excel
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
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
                            {{-- <th>Jawaban</th> --}}
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
                                {{-- <td>{{ $question->correct_answer }}</td> --}}
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
        @include('livewire.admin.question.create')
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

        {{-- Edit Modal --}}
        @include('livewire.admin.question.edit')
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
        @include('livewire.admin.question.delete')
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
        @include('livewire.admin.question.show')
        {{-- Show Modal --}}
    </div>
    <!-- /.content-wrapper -->
</div>