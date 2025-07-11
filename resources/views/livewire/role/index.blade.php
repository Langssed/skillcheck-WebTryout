<div>
      <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="fas fa-lock mr-1"></i>
                    {{ $title }}
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active"><i class="fas fa-lock mr-1"></i>{{ $title }}</li>
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
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive col-5">
                    <table class="table table-hover">
                        <tr class="bg-secondary">
                            <th>No</th>
                            <th>Nama</th>
                            <th>
                                <i class="fas fa-cog"></i>
                            </th>
                        </tr>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <button wire:click="loadPermissions({{ $role->id }})" class="btn btn-sm btn-success" data-toggle="modal" data-target="#permissionModal">
                                        <i class="fas fa-check-square"></i>
                                    </button>
                                    <button wire:click="edit({{ $role->id }})" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button wire:click="confirm({{ $role->id }})" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        </section>

        {{-- Create Modal --}}
        @include('livewire.role.create')
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
        @include('livewire.role.edit')
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
        @include('livewire.role.delete')
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
        {{-- Close Delete Modal --}}

        {{-- Permission Modal --}}
        @include('livewire.role.permission')
        {{-- Permission Modal --}}

        {{-- Close Permission Modal --}}
        @script
            <script>
                $wire.on('closePermissionModal', () => {
                    $('#permissionModal').modal('hide');
                    
                    Swal.fire({
                        title: "Sukses!",
                        text: "Permission berhasil diubah",
                        icon: "success"
                    });
                })
            </script>
        @endscript
        {{-- Close Permission Modal --}}

    </div>
    <!-- /.content-wrapper -->
</div>