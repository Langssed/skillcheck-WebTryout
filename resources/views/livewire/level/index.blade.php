<div>
      <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="fas fa-school mr-1"></i>
                    {{ $title }}
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active"><i class="fas fa-school mr-1"></i>{{ $title }}</li>
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
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr class="bg-secondary">
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>
                                <i class="fas fa-cog"></i>
                            </th>
                        </tr>
                        @foreach ($levels as $level)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $level->id }}</td>
                                <td>{{ $level->name }}</td>
                                <td>
                                    @if (session('active_role') !== 'teacher')
                                        <button wire:click="edit({{ $level->id }})" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button wire:click="confirm({{ $level->id }})" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        </section>

        {{-- Create Modal --}}
        @include('livewire.level.create')
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
        @include('livewire.level.edit')
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
        @include('livewire.level.delete')
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