<div>
      <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="fas fa-user-circle mr-1"></i>
                    {{ $title }}
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active"><i class="fas fa-user-circle mr-1"></i>{{ $title }}</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

        <div class="card p-4">
            <div class="row">
                <!-- Profil Pengguna -->
                <div class="col-md-6 text-center mb-4">
                    @if (Auth::user()->profile_photo)
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                            alt="Foto Profil"
                            class="rounded-circle mb-3"
                            style="width: 120px; height: 120px; object-fit: cover;">
                    @else
                        <i class="fas fa-user-circle fa-7x text-muted mb-3"></i>
                    @endif

                    <h5 class="mb-3"><i class="fas fa-user-circle mr-1"></i> Informasi Pengguna</h5>
                    <ul class="list-group text-left">
                        <li class="list-group-item"><strong>Nama:</strong> {{ Auth::user()->name }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ Auth::user()->email }}</li>
                        <li class="list-group-item"><strong>School:</strong> {{ Auth::user()->school }}</li>
                    </ul>

                    <button wire:click="edit({{ Auth::user()->id }})"
                            class="btn btn-warning mt-3"
                            data-toggle="modal"
                            data-target="#editModal">
                        <i class="fas fa-edit mr-1"></i>Edit Profile
                    </button>
                </div>

                <!-- Form Ganti Password -->
                <div class="col-md-6">
                    <h5 class="mb-3"><i class="fas fa-key mr-1"></i> Ganti Password</h5>
                    <form wire:submit.prevent="updatePassword">
                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <input type="password" id="password" wire:model.defer="password" class="form-control" placeholder="Password Baru">
                            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input type="password" id="password_confirmation" wire:model.defer="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
                            @error('password_confirmation') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-1"></i> Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>

            <hr>

            <!-- Hapus Akun -->
            <div class="mt-4">
                <h5 class="text-danger"><i class="fas fa-trash-alt mr-1"></i> Hapus Akun</h5>
                <p class="text-muted">Aksi ini tidak dapat dibatalkan. Data kamu akan dihapus secara permanen.</p>
                <button wire:click="confirmDeleteAccount" class="btn btn-danger">
                    <i class="fas fa-trash-alt mr-1"></i> Hapus Akun
                </button>
            </div>
        </div>

        {{-- Edit Modal --}}
        @include('livewire.profile.edit')
        {{-- Edit Modal --}}

        {{-- Close Edit Modal --}}
        @script
            <script>
                $wire.on('closeEditModal', () => {
                    $('#editModal').modal('hide');
                    
                    Swal.fire({
                        title: "Sukses!",
                        text: "Profile berhasil diubah",
                        icon: "success"
                    });
                })
            </script>
        @endscript
        {{-- Close Edit Modal --}}

        {{-- sukses change password soal --}}
        @script
            <script>
                $wire.on('changePasswordQuestions', () => {
                    Swal.fire({
                        title: "Sukses!",
                        text: "Berhasil mengubah password",
                        icon: "success"
                    });
                });
            </script>
        @endscript
        {{-- sukses import soal --}}

        {{-- Confirm delete akun --}}
        @script
            <script>
                $wire.on('confirmDelete', () => {
                    Swal.fire({
                        title: "Apakah anda yakin?",
                        text: "Akun akan terhapus secara permanen!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ya, hapus!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $wire.deleteAccount();
                        }
                    });
                });
            </script>
        @endscript
        {{-- Confirm delete akun --}}

    </section>
    </div>
    <!-- /.content-wrapper -->
</div>