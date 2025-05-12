@extends('layouts.main')

@section('container')
    <!-- Register Section Start -->
    <section id="register" class="pt-48 pb-22 bg-slate-50">
      <div
        class="container max-w-screen-xl mx-auto h-[100vh] flex justify-center items-center"
      >
        <div
          class="flex w-3/4 rounded-3xl shadow-2xl shadow-slate-800 overflow-hidden"
        >
          <div
            class="sm:w-1/2 hidden bg-slate-800 p-10 sm:flex flex-col items-center"
          >
            <h2 class="text-3xl font-bold my-2 mb-2 text-teal-500">
              Daftar Sekarang
            </h2>
            <p class="text-base mb-10 text-teal-500 text-center">
              Buat akun baru Anda dan mulai menjelajahi semua fitur hebat kami.
            </p>
            <img src="img/register.svg" alt="" class="w-9/10" />
          </div>
          <div class="sm:w-1/2 w-full bg-white py-15 px-8">
            <h2 class="text-2xl font-bold my-2 mb-8 text-slate-900 text-center">
              Buat Akun Baru
            </h2>
            <form action="">
              <label for="name" class="font-medium text-md">Nama Lengkap</label>
              <div class="relative flex justify-center">
                <i data-feather="user" class="absolute left-3 top-5"></i
                ><input
                  type="text"
                  name="name"
                  id="name"
                  class="w-full text-md px-2 pl-12 mt-2 mb-5 py-3 rounded-2xl border border-slate-900 focus:bg-slate-50 focus:outline-none focus:ring-2 focus:border-0 focus:ring-slate-800"
                  placeholder="Nama lengkap Anda"
                />
              </div>

              <label for="email" class="font-medium text-md">Email</label>
              <div class="relative flex justify-center">
                <i data-feather="mail" class="absolute left-3 top-5"></i
                ><input
                  type="email"
                  name="email"
                  id="email"
                  class="w-full text-md px-2 pl-12 mt-2 mb-5 py-3 rounded-2xl border border-slate-900 focus:bg-slate-50 focus:outline-none focus:ring-2 focus:border-0 focus:ring-slate-800"
                  placeholder="contoh@gmail.com"
                />
              </div>

              <label for="school" class="font-medium text-md"
                >Asal Sekolah</label
              >
              <div class="relative flex justify-center">
                <i data-feather="map-pin" class="absolute left-3 top-5"></i
                ><input
                  type="text"
                  name="school"
                  id="school"
                  class="w-full text-md px-2 pl-12 mt-2 mb-5 py-3 rounded-2xl border border-slate-900 focus:bg-slate-50 focus:outline-none focus:ring-2 focus:border-0 focus:ring-slate-800"
                  placeholder="Asal Sekolah Anda"
                />
              </div>

              <label for="password" class="font-medium text-md"
                >Kata Sandi</label
              >
              <div class="relative flex justify-center">
                <i data-feather="lock" class="absolute left-3 top-5"></i
                ><input
                  type="password"
                  name="password"
                  id="password"
                  class="w-full text-md px-2 pl-12 mt-2 mb-5 py-3 rounded-2xl border border-slate-900 focus:bg-slate-50 focus:outline-none focus:ring-2 focus:border-0 focus:ring-slate-800"
                  placeholder="********"
                />
              </div>

              <label for="confirm" class="font-medium text-md"
                >Konfirmasi Kata Sandi</label
              >
              <div class="relative flex justify-center">
                <i data-feather="lock" class="absolute left-3 top-5"></i
                ><input
                  type="password"
                  name="confirm"
                  id="confirm"
                  class="w-full text-md px-2 pl-12 mt-2 mb-5 py-3 rounded-2xl border border-slate-900 focus:bg-slate-50 focus:outline-none focus:ring-2 focus:border-0 focus:ring-slate-800"
                  placeholder="********"
                />
              </div>

              <div class="flex items-center justify-center w-full mt-4">
                <button
                  class="bg-slate-800 px-8 py-3 w-full rounded-2xl text-lg font-bold text-teal-50 hover:opacity-75"
                >
                  Daftar
                </button>
              </div>
            </form>
            <p class="text-base text-slate-900 text-center mt-3">
              Sudah punya akun?
              <a href="/login" class="text-base text-teal-500 hover:opacity-80"
                >Masuk di sini</a
              >
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- Register Section End -->
@endsection