@extends('layouts.main')

@section('container')
    <!-- Hero Section Start -->
    <section class="pt-38 pb-22">
        <div class="container max-w-screen-xl mx-auto px-4">
          <div class="flex">
            <div class="md:w-3/5 w-full">
              <h1 class="md:text-3xl text-2xl text-teal-500">
                TRYOUT ONLINE: UNTUK SD, SMP, SMA, UTBK, SNBT, STAN, CPNS/CASN,
                IPDN, BUMN, TOEFL, TNI/POLRI, DAN UJI KOMPETENSI
              </h1>
              <h3 class="md:text-lg text-md text-slate-800 font-medium mt-5">
                Khawatir tidak lolos ujian? Bingung menghadapi tes kerja? Atau
                ingin lanjut kuliah? Kami punya jawabannya.
              </h3>
              <h3 class="md:text-lg text-md text-slate-800 font-medium mt-5">
                Kami hadir untuk membantu kamu berlatih dan mempersiapkan diri
                menghadapi berbagai jenis ujian seperti SD, SMP, SMA, SMK, SNBT,
                STAN, UTBK, CPNS/CASN, BUMN, TOEFL, TNI/POLRI, IPDN, serta uji
                kompetensi lainnya.
              </h3>
              <h3 class="md:text-lg text-md text-slate-800 font-medium mt-5">
                SKILLCHECK adalah solusi belajar fleksibel — bisa kapan saja dan
                di mana saja.
              </h3>
              <h3 class="md:text-lg text-md text-slate-800 font-medium mt-5">
                Yuk, semangat belajar!
              </h3>
              <a href="/register"
                class="px-8 py-3 rounded-2xl bg-teal-500 mt-8 w-2/5 flex justify-center hover:opacity-80"
              >
                <span
                  class="md:text-lg text-md whitespace-nowrap text-white text-center font-medium"
                >
                  Daftar Sekarang
                </span>
              </a>
            </div>
            <div class="md:w-2/5 hidden md:block ml-10">
              <img src="{{ asset('img/hero.svg') }}" alt="" />
            </div>
          </div>
        </div>
      </section>
      <!-- Hero Section End -->
  
      <!-- Advantage Section Start -->
      <section id="advantage" class="pt-20 pb-16 bg-slate-800">
        <div class="container max-w-screen-xl mx-auto px-4">
          <div class="flex flex-wrap">
            <div class="md:w-1/4 w-1/2 flex flex-col items-center">
              <div
                class="bg-teal-500 p-5 rounded-2xl max-w-6/9 flex justify-center items-center"
              >
                <i data-feather="clock" class="text-white w-15 h-15"></i>
              </div>
              <h4
                class="mt-5 md:text-xl text-lg text-white font-semibold text-center"
              >
                Waktu Belajar Flexible
              </h4>
              <p class="mt-2 text-white md:text-base text-sm w-4/5 text-center">
                Siapapun bisa belajar asal memiliki HP, kapanpun dan dimanapun.
                Waktu dan tempat flexible.
              </p>
            </div>
            <div class="md:w-1/4 w-1/2 flex flex-col items-center">
              <div
                class="bg-teal-500 p-5 rounded-2xl max-w-6/9 flex justify-center items-center"
              >
                <i data-feather="thumbs-up" class="text-white w-15 h-15"></i>
              </div>
              <h4
                class="mt-5 md:text-xl text-lg text-white font-semibold text-center"
              >
                Gratis Selamanya
              </h4>
              <p class="mt-2 text-white md:text-base text-sm w-4/5 text-center">
                Web Tryout Gratis Pertama dengan menyediakan banyak soal
              </p>
            </div>
            <div class="md:w-1/4 md:mt-0 w-1/2 mt-5 flex flex-col items-center">
              <div
                class="bg-teal-500 p-5 rounded-2xl max-w-6/9 flex justify-center items-center"
              >
                <i data-feather="file-text" class="text-white w-15 h-15"></i>
              </div>
              <h4
                class="mt-5 md:text-xl text-lg text-white font-semibold text-center"
              >
                Tersedia Banyak Soal
              </h4>
              <p class="mt-2 text-white md:text-base text-sm w-4/5 text-center">
                SKILLCHECK menyediakan banyak soal, solusi bagi yang mau ujian.
              </p>
            </div>
            <div class="md:w-1/4 md:mt-0 w-1/2 mt-5 flex flex-col items-center">
              <div
                class="bg-teal-500 p-5 rounded-2xl max-w-6/9 flex justify-center items-center"
              >
                <i data-feather="smile" class="text-white w-15 h-15"></i>
              </div>
              <h4
                class="mt-5 md:text-xl text-lg text-white font-semibold text-center"
              >
                Mudah Digunakan
              </h4>
              <p class="mt-2 text-white md:text-base text-sm w-4/5 text-center">
                Dengan layout yang clean dan ringan sehingga memudahkan cara
                penggunaanya
              </p>
            </div>
          </div>
        </div>
      </section>
      <!-- Advantage Section End -->
  
      <!-- achievement Section Start -->
      <section id="achievement" class="pt-16 pb-20">
        <div class="container max-w-screen-xl mx-auto px-4">
          <div class="flex flex-wrap justify-evenly">
            <div class="w-1/4 flex items-center md:justify-center flex-col">
              <h3
                class="md:text-6xl text-4xl font-bold text-teal-500 text-center"
              >
                20.000+
                <span
                  class="md:text-3xl text-lg font-semibold text-slate-800 mt-2 md:mt-5 block"
                  >Pengguna Aktif</span
                >
              </h3>
            </div>
            <div class="w-1/4 flex items-center md:justify-center flex-col">
              <h3
                class="md:text-6xl text-4xl font-bold text-teal-500 text-center md:pt-8"
              >
                95%
                <span
                  class="md:text-3xl text-lg font-semibold text-slate-800 mt-2 md:mt-5 block"
                  >Pengguna Merasa Terbantu</span
                >
              </h3>
            </div>
            <div class="w-1/4 flex items-center md:justify-center flex-col">
              <h3
                class="md:text-6xl text-4xl font-bold text-teal-500 text-center"
              >
                5000+
                <span
                  class="md:text-3xl text-lg font-semibold text-slate-800 mt-2 md:mt-5 block"
                  >Soal Tryout Tersedia</span
                >
              </h3>
            </div>
          </div>
        </div>
      </section>
      <!-- achievement Section End -->
@endsection