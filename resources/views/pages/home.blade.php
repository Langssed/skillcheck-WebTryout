@extends('layouts.main')

@section('container')
      <!-- Hero Section Start -->
      <section class="pt-36 pb-24 bg-gradient-to-b from-white via-teal-50 to-white">
        <div class="container max-w-screen-xl mx-auto px-4">
          <div class="flex flex-col-reverse md:flex-row items-center">
            
            <!-- Left Content -->
            <div class="md:w-3/5 w-full" style="animation: fadeIn 0.6s ease-out;">
              <h1 class="text-teal-500 text-2xl md:text-3xl font-bold leading-relaxed">
                TRYOUT ONLINE: UNTUK SD, SMP, SMA, UTBK, SNBT, STAN, CPNS/CASN, IPDN, BUMN, TOEFL, TNI/POLRI, DAN UJI KOMPETENSI
              </h1>

              <ul class="mt-6 space-y-4 text-slate-800 md:text-lg text-base font-medium">
                <li class="flex gap-3 items-start">
                  <i data-feather="alert-circle" class="text-teal-500 w-5 h-5 mt-1"></i>
                  Khawatir tidak lolos ujian? Bingung menghadapi tes kerja? Atau ingin lanjut kuliah?
                </li>
                <li class="flex gap-3 items-start">
                  <i data-feather="target" class="text-teal-500 w-5 h-5 mt-1"></i>
                  Kami bantu kamu hadapi berbagai ujian: SD, SMP, SMA, SMK, SNBT, UTBK, CPNS, BUMN, TOEFL, TNI, IPDN, dan lainnya.
                </li>
                <li class="flex gap-3 items-start">
                  <i data-feather="clock" class="text-teal-500 w-5 h-5 mt-1"></i>
                  SKILLCHECK adalah solusi belajar fleksibel — bisa kapan saja dan di mana saja.
                </li>
                <li class="flex gap-3 items-start">
                  <i data-feather="book-open" class="text-teal-500 w-5 h-5 mt-1"></i>
                  Yuk, semangat belajar dan capai cita-cita kamu!
                </li>
              </ul>

              @guest
              <a href="/register"
                class="inline-block mt-8 bg-teal-500 hover:bg-teal-600 text-white font-semibold py-3 px-6 rounded-2xl transition duration-200 shadow-lg"
                style="animation: fadeIn 0.8s ease-out;">
                Daftar Sekarang
              </a>
              @endguest

              @auth
              <a href="/question-lists"
                class="inline-block mt-8 bg-teal-500 hover:bg-teal-600 text-white font-semibold py-3 px-6 rounded-2xl transition duration-200 shadow-lg"
                style="animation: fadeIn 0.8s ease-out;">
                Mulai Tryout Sekarang
              </a>
              @endauth
            </div>

            <!-- Right Image -->
            <div class="md:w-2/5 w-full mb-10 md:mb-0 md:ml-10" style="animation: fadeIn 1s ease-out;">
              <img src="{{ asset('img/hero.svg') }}" alt="Tryout Illustration" class="w-full max-w-sm mx-auto drop-shadow-lg" />
            </div>
          </div>
        </div>
      </section>
      <!-- Hero Section End -->
  
      <!-- Advantage Section Start -->
      <section id="advantage" class="pt-20 pb-16 bg-slate-800">
        <div class="container max-w-screen-xl mx-auto px-4">
          <h2 class="text-center text-white text-3xl font-bold mb-12">Keunggulan SKILLCHECK</h2>

          <div class="flex flex-wrap justify-center gap-8">
            <!-- Card 1 -->
            <div class="w-full md:w-1/4 sm:w-1/2 flex flex-col items-center text-center" style="animation: fadeIn 0.3s ease-in;">
              <div class="bg-teal-500 p-4 rounded-2xl shadow-lg">
                <i data-feather="clock" class="w-10 h-10 text-white"></i>
              </div>
              <h4 class="mt-5 text-xl font-semibold text-white">Waktu Belajar Fleksibel</h4>
              <p class="mt-2 text-sm text-white w-4/5">
                Belajar bisa kapan saja dan di mana saja. Cukup dengan HP & internet.
              </p>
            </div>

            <!-- Card 2 -->
            <div class="w-full md:w-1/4 sm:w-1/2 flex flex-col items-center text-center" style="animation: fadeIn 0.4s ease-in;">
              <div class="bg-teal-500 p-4 rounded-2xl shadow-lg">
                <i data-feather="thumbs-up" class="w-10 h-10 text-white"></i>
              </div>
              <h4 class="mt-5 text-xl font-semibold text-white">Gratis Selamanya</h4>
              <p class="mt-2 text-sm text-white w-4/5">
                Platform tryout gratis dengan ribuan soal berkualitas.
              </p>
            </div>

            <!-- Card 3 -->
            <div class="w-full md:w-1/4 sm:w-1/2 flex flex-col items-center text-center" style="animation: fadeIn 0.5s ease-in;">
              <div class="bg-teal-500 p-4 rounded-2xl shadow-lg">
                <i data-feather="file-text" class="w-10 h-10 text-white"></i>
              </div>
              <h4 class="mt-5 text-xl font-semibold text-white">Tersedia Banyak Soal</h4>
              <p class="mt-2 text-sm text-white w-4/5">
                Ribuan soal tersedia untuk berbagai jenjang dan kebutuhan ujian.
              </p>
            </div>

            <!-- Card 4 -->
            <div class="w-full md:w-1/4 sm:w-1/2 flex flex-col items-center text-center" style="animation: fadeIn 0.6s ease-in;">
              <div class="bg-teal-500 p-4 rounded-2xl shadow-lg">
                <i data-feather="smile" class="w-10 h-10 text-white"></i>
              </div>
              <h4 class="mt-5 text-xl font-semibold text-white">Mudah Digunakan</h4>
              <p class="mt-2 text-sm text-white w-4/5">
                Antarmuka clean, ringan, dan ramah pengguna di semua perangkat.
              </p>
            </div>

            <div class="w-full md:w-1/4 sm:w-1/2 flex flex-col items-center text-center" style="animation: fadeIn 0.7s ease-in;">
              <div class="bg-teal-500 p-4 rounded-2xl shadow-lg">
                <i data-feather="award" class="w-10 h-10 text-white"></i>
              </div>
              <h4 class="mt-5 text-xl font-semibold text-white">Sertifikat Otomatis</h4>
              <p class="mt-2 text-sm text-white w-4/5">
                Dapatkan sertifikat secara otomatis setelah menyelesaikan tryout.
              </p>
            </div>
          </div>
        </div>
      </section>
      <!-- Advantage Section End -->
  
      <!-- Achievement Section Start -->
      <section id="achievement" class="pt-16 pb-20 bg-white">
        <div class="container max-w-screen-xl mx-auto px-4">
          <h2 class="text-3xl md:text-4xl font-bold text-center text-slate-800 mb-12">Pencapaian SKILLCHECK</h2>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <!-- Card 1 -->
            <div class="p-6 bg-slate-100 rounded-2xl shadow hover:shadow-lg transition-all duration-300" style="animation: fadeIn 0.3s ease-in;">
              <i data-feather="users" class="w-10 h-10 text-teal-500 mx-auto mb-4"></i>
              <h3 class="text-5xl font-bold text-teal-500">20.000+</h3>
              <p class="mt-2 text-lg font-semibold text-slate-800">Pengguna Aktif</p>
            </div>

            <!-- Card 2 -->
            <div class="p-6 bg-slate-100 rounded-2xl shadow hover:shadow-lg transition-all duration-300" style="animation: fadeIn 0.4s ease-in;">
              <i data-feather="smile" class="w-10 h-10 text-teal-500 mx-auto mb-4"></i>
              <h3 class="text-5xl font-bold text-teal-500">95%</h3>
              <p class="mt-2 text-lg font-semibold text-slate-800">Pengguna Terbantu</p>
            </div>

            <!-- Card 3 -->
            <div class="p-6 bg-slate-100 rounded-2xl shadow hover:shadow-lg transition-all duration-300" style="animation: fadeIn 0.5s ease-in;">
              <i data-feather="file-text" class="w-10 h-10 text-teal-500 mx-auto mb-4"></i>
              <h3 class="text-5xl font-bold text-teal-500">5000+</h3>
              <p class="mt-2 text-lg font-semibold text-slate-800">Soal Tryout Tersedia</p>
            </div>
          </div>
        </div>
      </section>
      <!-- Achievement Section End -->

      <!-- Optional Animasi -->
      <style>
        @keyframes fadeIn {
          from { opacity: 0; transform: translateY(20px) scale(0.95); }
          to { opacity: 1; transform: translateY(0) scale(1); }
        }

      </style>
@endsection