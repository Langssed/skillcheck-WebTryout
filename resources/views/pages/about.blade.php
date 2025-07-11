@extends('layouts.main')

@section('container')
    <!-- Hero Section Start -->
    <section class="pt-36 pb-16 bg-gradient-to-b from-white via-teal-50 to-white">
      <div class="container max-w-screen-xl mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
          <h1 class="text-teal-500 text-4xl md:text-6xl font-bold mb-6" style="animation: fadeIn 0.6s ease-out;">
            Tentang <span class="text-slate-800">SkillCheck</span>
          </h1>
          <p class="text-slate-700 md:text-lg text-base leading-relaxed" style="animation: fadeIn 0.8s ease-out;">
            <strong>SKILLCHECK</strong> adalah platform latihan online yang dirancang untuk membantu kamu mempersiapkan ujian SMA dan seleksi masuk perguruan tinggi seperti <strong>UTBK</strong>, <strong>SBMPTN</strong>, dan lainnya.
          </p>
          <p class="text-slate-700 md:text-lg text-base mt-4 leading-relaxed" style="animation: fadeIn 1s ease-out;">
            Kami menyediakan soal latihan terkini, berkualitas, dan berbasis CBT agar kamu siap menghadapi ujian dengan lebih percaya diri.
          </p>
        </div>
      </div>
    </section>
    <!-- Hero Section End -->

    <!-- Why Section Start -->
    <section id="why" class="pt-6 pb-20 bg-slate-800">
      <div class="container max-w-screen-xl mx-auto px-4">
        <div class="rounded-3xl px-8 py-10 shadow-lg max-w-4xl mx-auto bg-white/10 backdrop-blur-md" style="animation: fadeIn 1.2s ease-out;">
          <h2 class="text-2xl md:text-4xl font-semibold text-teal-400 text-center mb-10">
            Mengapa Memilih <span class="text-white">SKILLCHECK?</span>
          </h2>

          <div class="space-y-6">
            <div class="flex gap-4 items-start">
              <i data-feather="check-circle" class="text-teal-400 w-6 h-6 mt-1"></i>
              <p class="text-white text-base leading-relaxed">
                Pilihan soal latihan lengkap dan terus diperbarui sesuai kebutuhan ujian SMA dan seleksi perguruan tinggi.
              </p>
            </div>
            <div class="flex gap-4 items-start">
              <i data-feather="book-open" class="text-teal-400 w-6 h-6 mt-1"></i>
              <p class="text-white text-base leading-relaxed">
                Pembahasan soal mendalam untuk membantu kamu memahami materi secara menyeluruh.
              </p>
            </div>
            <div class="flex gap-4 items-start">
              <i data-feather="monitor" class="text-teal-400 w-6 h-6 mt-1"></i>
              <p class="text-white text-base leading-relaxed">
                Simulasi ujian berbasis komputer (CBT) untuk pengalaman ujian yang realistis dan interaktif.
              </p>
            </div>
          </div>
        </div>

        <p class="text-center text-white/80 text-sm md:text-base mt-10 max-w-2xl mx-auto" style="animation: fadeIn 1.4s ease-out;">
          Dengan SKILLCHECK, sukses dalam ujian bukan lagi sekadar harapan. Mari bersama mempersiapkan masa depan yang lebih cerah!
        </p>
      </div>
    </section>
    <!-- Why Section End -->

    <!-- Feather Icon Activation -->
    <script>
      feather.replace();
    </script>

    <!-- Style Animation -->
    <style>
    @keyframes fadeIn {
      0% { opacity: 0; transform: translateY(20px); }
      100% { opacity: 1; transform: translateY(0); }
    }
    </style>

@endsection