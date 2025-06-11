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
                <label for="level" class="form-label">Level<span class="text-danger">*</span></label>
                <select wire:model="level_id" id="level" class="form-control @error('level') is-invalid @enderror">
                    <option value="">-- Pilih Tingkat --</option>
                    @foreach ($levels as $level)
                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                    @endforeach
                </select>
                @error('level')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row">
                <label for="subject" class="form-label">Mapel<span class="text-danger">*</span></label>
                <select wire:model="subject_id" id="subject" class="form-control @error('subject') is-invalid @enderror">
                    <option value="">-- Pilih Mapel --</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
                @error('subject')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row">
                <label for="category" class="form-label">Kategori<span class="text-danger">*</span></label>
                <select wire:model="category_id" id="category" class="form-control @error('category') is-invalid @enderror">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row">
                <label for="content" class="form-label">Soal<span class="text-danger">*</span></label>
                <input type="text" wire:model="content" id="content" class="form-control @error('content') is-invalid @enderror" placeholder="Masukkan soal">
                @error('content')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row">
                <label for="option_a" class="form-label">Pilihan A<span class="text-danger">*</span></label>
                <input type="text" wire:model="option_a" id="option_a" class="form-control @error('option_a') is-invalid @enderror" placeholder="Masukkan Pilihan A">
                @error('option_a')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row">
                <label for="option_b" class="form-label">Pilihan B<span class="text-danger">*</span></label>
                <input type="text" wire:model="option_b" id="option_b" class="form-control @error('option_b') is-invalid @enderror" placeholder="Masukkan Pilihan B">
                @error('option_b')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row">
                <label for="option_c" class="form-label">Pilihan C<span class="text-danger">*</span></label>
                <input type="text" wire:model="option_c" id="option_c" class="form-control @error('option_c') is-invalid @enderror" placeholder="Masukkan Pilihan C">
                @error('option_c')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row">
                <label for="option_d" class="form-label">Pilihan D<span class="text-danger">*</span></label>
                <input type="text" wire:model="option_d" id="option_d" class="form-control @error('option_d') is-invalid @enderror" placeholder="Masukkan Pilihan D">
                @error('option_d')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row">
                <label for="correct_answer" class="form-label">Jawaban<span class="text-danger">*</span></label>
                <select wire:model="correct_answer" id="subject" class="form-control @error('subject') is-invalid @enderror">
                    <option value="">-- Pilih Jawaban --</option>
                    <option value="A">A. {{ $option_a }}</option>
                    <option value="B">B. {{ $option_b }}</option>
                    <option value="C">C. {{ $option_c }}</option>
                    <option value="D">D. {{ $option_d }}</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-1"></i>Tutup</button>
            <button wire:click="update({{ $question_id }})" type="button" class="btn btn-warning"><i class="fas fa-edit mr-1"></i>Edit</button>
        </div>
    </div>
  </div>
</div>