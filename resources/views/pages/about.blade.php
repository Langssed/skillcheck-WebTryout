@extends('layouts.main')

@section('container')
    <!-- Hero Section Start -->
      <section class="pt-38 pb-12">
      <div class="container max-w-screen-xl mx-auto px-4">
        <div class="w-2/3 mx-auto">
          <h1 class="text-teal-500 md:text-6xl text-3xl font-bold text-center">
            Tentang skillcheck.
          </h1>
          <h2
            class="md:mt-12 mt-8 text-center md:text-base text-sm font-medium text-slate-800"
          >
            SKILLCHECK adalah platform latihan online yang dirancang khusus
            untuk membantu Anda mempersiapkan ujian SMA dan ujian seleksi masuk
            perguruan tinggi (UTBK dan lainnya) dengan lebih baik.
          </h2>
          <h2
            class="md:mt-7 mt-4 text-center md:text-base text-sm font-medium text-slate-800"
          >
            Kami menyediakan soal latihan yang relevan untuk ujian SMA dan ujian
            masuk perguruan tinggi, seperti UTBK, SBMPTN, dan lainnya, serta
            latihan soal untuk ujian masuk perguruan tinggi negeri.
          </h2>
        </div>
      </div>
    </section>
    <!-- Hero Section End -->

    <!-- Why Section Start -->
    <section id="why" class="pt-6 pb-16">
      <div class="container max-w-screen-xl mx-auto px-4">
        <div
          class="bg-slate-800 rounded-4xl pt-10 pb-12 px-10 mx-auto w-9/10 md:w-3/4"
        >
          <h1
            class="text-teal-500 md:text-4xl text-2xl font-semibold text-center"
          >
            Mengapa Memilih SKILLCHECK?
          </h1>
          <div class="flex gap-5 items-center mt-8 w-4/5 mx-auto">
            <i
              data-feather="check"
              class="text-teal-500 md:w-15 md:h-15 w-20 h-20"
            ></i>
            <p class="font-medium text-base text-white">
              Pilihan soal latihan yang lengkap dan terus diperbarui untuk ujian
              SMA dan seleksi perguruan tinggi.
            </p>
          </div>
          <div class="flex gap-5 items-center mt-8 w-4/5 mx-auto">
            <i
              data-feather="check"
              class="text-teal-500 md:w-15 md:h-15 w-20 h-20"
            ></i>
            <p class="font-medium text-base text-white">
              Pemahaman konsep melalui pembahasan soal yang mendalam, membantu
              Anda memahami materi ujian dengan lebih baik.
            </p>
          </div>
          <div class="flex gap-5 items-center mt-8 w-4/5 mx-auto">
            <i
              data-feather="check"
              class="text-teal-500 md:w-15 md:h-15 w-20 h-20"
            ></i>
            <p class="font-medium text-base text-white">
              Latihan berbasis komputer untuk simulasi ujian yang lebih nyata,
              memberikan pengalaman ujian yang sesungguhnya.
            </p>
          </div>
        </div>
        <h1
          class="mt-15 w-2/3 mx-auto text-center md:text-base text-sm font-medium text-slate-800"
        >
          Dengan SKILLCHECK, sukses dalam ujian SMA dan seleksi perguruan tinggi
          bukan hanya impian. Bersama kami, persiapkan diri Anda untuk masa
          depan yang lebih cerah!
        </h1>
      </div>
    </section>
    <!-- Why Section End -->

@endsection