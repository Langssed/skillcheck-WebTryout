<div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="editModalLabel"><i class="fas fa-edit mr-1"></i>Edit {{ $title }}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <label for="subject" class="form-label">Mapel<span class="text-danger">*</span></label>
                <select wire:model="subject_id" id="subject" class="form-control @error('subject') is-invalid @enderror">
                    <option value="">-- Pilih Tingkat --</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
                @error('subject')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row">
                <label for="name" class="form-label">Nama<span class="text-danger">*</span></label>
                <input type="text" wire:model="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan name">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row">
                <label for="slug" class="form-label">Slug<span class="text-danger">*</span></label>
                <input type="text" wire:model="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Masukkan slug">
                @error('slug')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-1"></i>Tutup</button>
            <button wire:click="update({{ $category_id }})" type="button" class="btn btn-warning"><i class="fas fa-edit mr-1"></i>Update</button>
        </div>
    </div>
  </div>
</div>