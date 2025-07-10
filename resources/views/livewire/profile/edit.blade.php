<div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="editModalLabel"><i class="fas fa-edit mr-1"></i>Edit {{ $title }}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form class="modal-body">
            <!-- Nama -->
            <div class="form-group">
                <label for="name" class="form-label">Nama<span class="text-danger">*</span></label>
                <input type="text" wire:model="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan name">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Email -->
            <div class="form-group mt-2">
                <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                <input type="email" wire:model="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email">
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Sekolah -->
            <div class="form-group mt-2">
                <label for="school" class="form-label">Sekolah<span class="text-danger">*</span></label>
                <input type="text" wire:model="school" id="school" class="form-control @error('school') is-invalid @enderror" placeholder="Masukkan school">
                @error('school') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Foto Profil -->
            <div class="form-group mt-3">
                <label for="profile_photo" class="form-label">Foto Profil</label>

                <input type="file" 
                    wire:model="profile_photo" 
                    id="profile_photo" 
                    class="form-control @error('profile_photo') is-invalid @enderror">

                @error('profile_photo') 
                    <small class="text-danger">{{ $message }}</small> 
                @enderror

                {{-- Jika belum upload foto baru, tampilkan foto lama dari database --}}
                @if (!$profile_photo && $existing_profile_photo)
                    <div class="mt-3 text-center">
                        <strong>Foto Saat Ini:</strong><br>
                        <img src="{{ asset('storage/' . $existing_profile_photo) }}" 
                            alt="Foto Saat Ini" 
                            class="rounded-circle shadow-sm" 
                            style="width: 120px; height: 120px; object-fit: cover;">
                    </div>
                @endif

                {{-- Jika upload foto baru, tampilkan preview sementara --}}
                @if ($profile_photo)
                    <div class="mt-3 text-center">
                        <strong>Preview Foto Baru:</strong><br>
                        <img src="{{ $profile_photo->temporaryUrl() }}" 
                            alt="Preview Foto" 
                            class="rounded-circle shadow-sm" 
                            style="width: 120px; height: 120px; object-fit: cover;">
                    </div>
                @endif
            </div>
        </form>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                <i class="fas fa-times mr-1"></i>Tutup
            </button>
            <button wire:click="update({{ $user_id }})" type="button" class="btn btn-warning">
                <i class="fas fa-edit mr-1"></i>Update
            </button>
        </div>
    </div>
  </div>
</div>