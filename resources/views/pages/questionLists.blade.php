@extends('layouts.main')

@section('container')
        @auth
        <!-- Question Group Start -->
        <section class="pt-28 pb-20 bg-white">
          <div class="container max-w-screen-xl mx-auto px-4">
            <div class="text-center mb-12">
              <h1 class="text-4xl md:text-5xl font-bold text-slate-800 mb-4">
                Pilih <span class="text-teal-500">Kelompok Soal</span>
              </h1>
              <p class="text-slate-600 md:text-lg text-base max-w-3xl mx-auto leading-relaxed">
                Mulailah belajar dengan memilih jenjang dan mapel yang kamu inginkan.
                Kami menyediakan soal-soal berkualitas dengan sistem tryout interaktif untuk membantu persiapanmu.
              </p>
            </div>

            @foreach ($levels as $level)
              <div class="mb-12">
                <h2 class="text-2xl md:text-3xl font-semibold text-slate-700 mb-5 flex items-center gap-2">
                  <i data-feather="bookmark" class="text-teal-500 w-5 h-5"></i>
                  {{ $level->name }}
                </h2>
                <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4">
                  @foreach ($level->subjects as $subject)
                    <div 
                      onclick="openConfirmationModal(
                        '{{ $level->name }}', 
                        '{{ $subject->name }}', 
                        '{{ $level->slug }}', 
                        '{{ $subject->slug }}', 
                        {{ $subject->questions()->where('level_id', $level->id)->where('status', 'diterima')->count() }}
                      )"
                      class="cursor-pointer bg-white shadow-md rounded-xl p-5 border hover:shadow-lg transition-all duration-200 hover:border-teal-500 group"
                    >
                      <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-slate-800 group-hover:text-teal-600">
                          {{ $subject->name }}
                        </h3>
                        <i data-feather="arrow-right-circle" class="w-5 h-5 text-teal-500 group-hover:translate-x-1 transition-transform"></i>
                      </div>
                      <p class="mt-2 text-sm text-slate-500">
                        {{ $subject->questions()->where('level_id', $level->id)->where('status', 'diterima')->count() }} soal tersedia
                      </p>
                    </div>
                  @endforeach
                </div>
              </div>
            @endforeach
          </div>
        </section>
        <!-- Question Group End -->
        @endauth

        @guest
          <div class="h-[80vh] flex flex-col justify-center items-center text-center">
            <h1 class="text-xl text-slate-800 font-semibold mb-4">
              Ingin akses tryout seru?
            </h1>
            <a href="/register" class="bg-teal-500 hover:bg-teal-600 text-white px-6 py-3 rounded-xl shadow-md font-medium transition">
              Daftar Sekarang
            </a>
          </div>
        @endguest

        <!-- Modal Konfirmasi -->
        <div id="confirmationModal" class="fixed inset-0 z-50 hidden backdrop-blur-sm bg-white/30 flex items-center justify-center"
            style="animation: fadeIn 0.3s ease-out;">
          <div class="bg-white rounded-2xl shadow-2xl w-[90%] max-w-md p-6"
              style="animation: fadeInScale 0.3s ease-out;">
            <div class="flex items-center mb-4 gap-2">
              <i data-feather="alert-circle" class="text-teal-500 w-6 h-6"></i>
              <h2 class="text-2xl font-semibold text-teal-600">Konfirmasi Masuk Soal</h2>
            </div>

            <div class="space-y-3 text-gray-700 text-sm md:text-base">
              <p><i data-feather="book-open" class="inline w-4 h-4 mr-1 text-gray-500"></i><strong>Tingkat:</strong> <span id="modalLevelName"></span></p>
              <p><i data-feather="book" class="inline w-4 h-4 mr-1 text-gray-500"></i><strong>Mapel:</strong> <span id="modalSubjectName"></span></p>
              <p><i data-feather="file-text" class="inline w-4 h-4 mr-1 text-gray-500"></i><strong>Jumlah Soal:</strong> <span id="modalQuestionCount"></span></p>
            </div>

            <div class="flex justify-end mt-6 gap-3">
              <button onclick="closeConfirmationModal()" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 text-gray-800 flex items-center gap-1">
                <i data-feather="x-circle" class="w-4 h-4"></i> Batal
              </button>
              <a id="modalGoButton" href="#" class="px-4 py-2 rounded-lg bg-teal-500 hover:bg-teal-600 text-white font-semibold flex items-center gap-1">
                <i data-feather="arrow-right-circle" class="w-4 h-4"></i> Mulai
              </a>
            </div>
          </div>
        </div>

            <!-- Feather & Style -->
            <script>
              function openConfirmationModal(levelName, subjectName, levelSlug, subjectSlug, questionCount) {
                if (questionCount === 0) {
                  alert('Belum ada soal tersedia untuk mapel ini.');
                  return;
                }

                document.getElementById('modalLevelName').textContent = levelName;
                document.getElementById('modalSubjectName').textContent = subjectName;
                document.getElementById('modalQuestionCount').textContent = questionCount + ' soal';

                const goLink = `/question/${levelSlug}/${subjectSlug}`;
                document.getElementById('modalGoButton').href = goLink;

                document.getElementById('confirmationModal').classList.remove('hidden');
              }

              function closeConfirmationModal() {
                document.getElementById('confirmationModal').classList.add('hidden');
              }
            </script>

            <style>
              @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
              }

              @keyframes fadeInScale {
                from {
                  opacity: 0;
                  transform: scale(0.95);
                }
                to {
                  opacity: 1;
                  transform: scale(1);
                }
              }
            </style>

            <script>
              function openConfirmationModal(levelName, subjectName, levelSlug, subjectSlug, questionCount) {
                if (questionCount === 0) {
                  Swal.fire({
                    icon: 'warning',
                    title: 'Tidak Ada Soal',
                    text: 'Belum ada soal tersedia untuk mapel ini.',
                    confirmButtonColor: '#14b8a6', // teal-500
                    confirmButtonText: 'OK'
                  });
                  return;
                }

                document.getElementById('modalLevelName').textContent = levelName;
                document.getElementById('modalSubjectName').textContent = subjectName;
                document.getElementById('modalQuestionCount').textContent = `${questionCount} soal`;

                const goLink = `/question/${levelSlug}/${subjectSlug}`;
                document.getElementById('modalGoButton').href = goLink;

                document.getElementById('confirmationModal').classList.remove('hidden');
                feather.replace();
              }

              function closeConfirmationModal() {
                document.getElementById('confirmationModal').classList.add('hidden');
              }
            </script>

@endsection