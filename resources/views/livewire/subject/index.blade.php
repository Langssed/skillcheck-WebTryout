<div>
      <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="fas fa-book mr-1"></i>
                    {{ $title }}
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active"><i class="fas fa-book mr-1"></i>{{ $title }}</li>
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
                        @if (session('active_role') !== 'teacher')
                            <button wire:click="create" class="btn btn-md btn-primary" data-toggle="modal" data-target="#createModal"><i class="fas fa-plus mr-1"></i>Tambah Data</button>
                        @endif
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
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr class="bg-secondary">
                            <th>No</th>
                            <th>ID</th>
                            <th>Tingkat</th>
                            <th>Nama</th>
                            <th>Waktu(menit)</th>
                            <th>
                                <i class="fas fa-cog"></i>
                            </th>
                        </tr>
                        @foreach ($subjects as $subject)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $subject->id }}</td>
                                <td>{{ $subject->level->name }}</td>
                                <td>{{ $subject->name }}</td>
                                <td>{{ $subject->time }}</td>
                                <td>
                                    @if (session('active_role') !== 'teacher')
                                        <button wire:click="edit({{ $subject->id }})" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button wire:click="confirm({{ $subject->id }})" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $subjects->links() }}
                </div>
            </div>
        </div>

        </section>

        {{-- Create Modal --}}
        @include('livewire.subject.create')
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
        @include('livewire.subject.edit')
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
                })
            </script>
        @endscript
        {{-- Close Create Modal --}}

        {{-- Delete Modal --}}
        @include('livewire.subject.delete')
        {{-- Delete Modal --}}

        {{-- Close Delete Modal --}}
        @script
            <script>
                $wire.on('closeDeleteModal', () => {
                    $('#deleteModal').modal('hide');
                    
                    Swal.fire({
                        title: "Sukses!",
                        text: "Data berhasil dihapus",
                        icon: "success"
                    });
                })
            </script>
        @endscript
        {{-- Close Create Modal --}}

    </div>
    <!-- /.content-wrapper -->
</div>