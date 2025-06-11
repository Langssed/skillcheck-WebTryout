<div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="createModalLabel"><i class="fas fa-plus mr-1"></i>Tambah {{ $title }}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="modal-body">
            <div class="row">
                <label for="name" class="form-label">Nama<span class="text-danger">*</span></label>
                <input type="text" wire:model="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan nama">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row mt-2">
                <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                <input type="email" wire:model="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row mt-2">
                <label for="school" class="form-label">Sekolah<span class="text-danger">*</span></label>
                <input type="school" wire:model="school" id="school" class="form-control @error('school') is-invalid @enderror" placeholder="Masukkan school">
                @error('school')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row mt-2">
                <label for="password" class="form-label">password<span class="text-danger">*</span></label>
                <input type="password" wire:model="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row mt-2">
                <label for="password_confirmation" class="form-label">Password Confirmation<span class="text-danger">*</span></label>
                <input type="password" wire:model="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Konfirmasi Password">
                @error('password_confirmation')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </form>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-1"></i>Tutup</button>
            <button wire:click="store" type="button" class="btn btn-primary"><i class="fas fa-save mr-1"></i>Simpan</button>
        </div>
    </div>
  </div>
</div>