<div wire:ignore.self class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="showModalLabel"><i class="fas fa-eye mr-1"></i>Show {{ $title }}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-2">
                    Tingkat
                </div>
                <div class="col-6"> : {{ $level_id }}</div>
            </div>
            <div class="row">
                <div class="col-2">
                    Mapel
                </div>
                <div class="col-6"> : {{ $subject_id }}</div>
            </div>
            <div class="row">
                <div class="col-2">
                    Kategori
                </div>
                <div class="col-6"> : {{ $category_id }}</div>
            </div>
            <div class="row">
                <div class="col-2">
                    Soal
                </div>
                <div class="col-6"> : {{ $content }}</div>
            </div>
            <div class="row">
                <div class="col-2">
                    Pilihan A
                </div>
                <div class="col-6"> : {{ $option_a }}</div>
            </div>
            <div class="row">
                <div class="col-2">
                    Pilihan B
                </div>
                <div class="col-6"> : {{ $option_b }}</div>
            </div>
            <div class="row">
                <div class="col-2">
                    Pilihan C
                </div>
                <div class="col-6"> : {{ $option_c }}</div>
            </div>
            <div class="row">
                <div class="col-2">
                    Pilihan D
                </div>
                <div class="col-6"> : {{ $option_d }}</div>
            </div>
            <div class="row">
                <div class="col-2">
                    Jawaban
                </div>
                <div class="col-6"> : {{ $correct_answer }}</div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-1"></i>Tutup</button>
        </div>
    </div>
  </div>
</div>