<div>
      <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="fas fa-user mr-1"></i>
                    {{ $title }}
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home mr-1"></i>Dashboard</a></li>
                <li class="breadcrumb-item active"><i class="fas fa-user mr-1"></i>{{ $title }}</li>
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
                            <i class="fas fa-print mr-1"></i>
                            Cetak
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item text-success" wire:click='exportExcel()'><i class="fas fa-file-excel mr-1"></i>Excel</a>
                            <a class="dropdown-item text-danger" wire:click='exportPdf()'><i class="fas fa-file-pdf mr-1"></i>PDF</a>
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
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr class="bg-secondary">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Sekolah</th>
                            {{-- <th>Role</th> --}}
                            <th>
                                <i class="fas fa-cog"></i>
                            </th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->school }}</td>
                                <td>
                                    <button wire:click="loadRoles({{ $user->id }})" class="btn btn-sm btn-success" data-toggle="modal" data-target="#roleModal">
                                        <i class="fas fa-lock"></i>
                                    </button>
                                    <button wire:click="edit({{ $user->id }})" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button wire:click="confirm({{ $user->id }})" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>

        </section>

        {{-- Create Modal --}}
        @include('livewire.superadmin.user.create')
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
        @include('livewire.superadmin.user.edit')
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
        @include('livewire.superadmin.user.delete')
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
                });
            </script>
        @endscript
        {{-- Close Delete Modal --}}

        {{-- Role Modal --}}
        @include('livewire.superadmin.user.role')
        {{-- Role Modal --}}

        {{-- Close Role Modal --}}
        @script
            <script>
                $wire.on('closeRoleModal', () => {
                    $('#roleModal').modal('hide');
        
                    Swal.fire({
                        title: "Sukses!",
                        text: "Role Berhasil diubah",
                        icon: "success"
                    });
                });
            </script>
        @endscript
        {{-- Close Role Modal --}}

    </div>
    <!-- /.content-wrapper -->
</div>
