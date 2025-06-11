@extends('layouts.main')

@section('container')
        @auth
          <!-- Question Group Start -->
          <section class="pt-32 pb-22">
            <div class="container max-w-screen-xl mx-auto px-4">
              <h1 class="md:text-5xl text-3xl font-light text-center">
                Kelompok <span class="text-teal-500">Soal</span>
              </h1>
              <p
                class="md:mt-10 mt-5 md:mb-15 mb-8 text-slate-800 font-medium text-center md:text-lg text-md"
              >
                Yuk, pilih soal sesuai jenjang kamu! Di halaman Kelompok Soal ini,
                tersedia berbagai latihan seru mulai dari SD, SMP, SMA, sampai tryout
                CPNS. Kamu bisa asah kemampuan di berbagai mata pelajaran seperti IPA,
                Bahasa Inggris, dan banyak lagi. Tinggal klik, kerjakan, dan uji
                seberapa siap kamu! Semua soal dirancang biar belajar jadi lebih mudah
                dan menyenangkan. Siap-siap jadi jagoan tryout, ya!
              </p>
              @foreach ($levels as $level)
                <div class="mt-5 border-b border-slate-800 pb-12">
                  <h3 class="text-slate-800 md:text-3xl font-medium text-2xl">
                    {{ $level->name }}
                  </h3>
                  <div class="flex flex-wrap px-15 mt-7 gap-3">
                    @foreach ($level->subjects as $subject)
                      <div class="rounded-xl px-5 py-2 bg-teal-500 hover:opacity-80">
                        <a href="/question/{{ $level->slug }}/{{ $subject->slug }}" class="text-white font-medium md:text-lg text-md">{{ $subject->name }}</a>
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
          <h1 class="text-center font-medium text-xl text-slate-800 mt-40 h-[80vh]"><a href="/register" class="text-teal-500 hover:opacity-80">Daftar sekarang</a> untuk mengakses Tryout</h1>
        @endguest
@endsection