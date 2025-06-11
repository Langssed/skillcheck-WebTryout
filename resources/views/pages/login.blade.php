@extends('layouts.main')

@section('container')
    <!-- Login Section Start -->
    <section id="login" class="pt-28 bg-teal-50">
      <div
        class="container max-w-screen-xl mx-auto h-[100vh] flex justify-center items-center"
      >
        <div
          class="flex w-3/4 rounded-3xl shadow-2xl shadow-teal-500 overflow-hidden"
        >
          <div
            class="sm:w-1/2 hidden bg-teal-500 p-10 sm:flex flex-col justify-center items-center"
          >
            <h2 class="text-3xl font-bold my-2 mb-2 text-slate-800">
              Selamat Datang Kembali
            </h2>
            <p class="text-base mb-10 text-slate-800 text-center">
              Masukkan kredensial Anda untuk mengakses akun Anda dan mulai
              menjelajahi dashboard
            </p>
            <img src="img/login.svg" alt="" class="w-9/10" />
          </div>
          <div class="sm:w-1/2 w-full bg-white py-15 px-8">
            <h2 class="text-2xl font-bold my-2 text-slate-900 text-center">
              Masuk Ke Akun Anda
            </h2>
            @if(session()->has('failed'))
              <span id="flash-message" class="block py-2 px-4 text-white bg-red-500 text-center rounded-lg mb-2">{{ session('failed') }}</span>
            @endif
            <form action="/auth/login" method="POST" class="mt-8">
              @csrf
              <div class="w-full mb-5">
                <label for="email" class="font-medium text-md">Email</label>
                <div class="relative flex justify-center">
                  <i data-feather="mail" class="absolute left-3 top-5"></i
                  ><input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    class="w-full text-md px-2 pl-12 mt-2 py-3 rounded-2xl border border-slate-900 focus:bg-teal-50 focus:outline-none focus:ring-2 focus:border-0 focus:ring-teal-500"
                    placeholder="contoh@gmail.com"
                  />
                </div>
                @error('email')
                  <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
              </div>

              <div class="w-full mb-5">
                <label for="password" class="font-medium text-md"
                  >Kata Sandi</label
                >
                <div class="relative flex justify-center">
                  <i data-feather="lock" class="absolute left-3 top-5"></i
                  ><input
                    type="password"
                    name="password"
                    id="password"
                    class="w-full text-md px-2 pl-12 mt-2 py-3 rounded-2xl border border-slate-900 focus:bg-teal-50 focus:outline-none focus:ring-2 focus:border-0 focus:ring-teal-500"
                    placeholder="********"
                  />
                </div>
                @error('password')
                  <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
              </div>

              <div class="flex items-center justify-center w-full mt-4">
                <button
                  class="bg-slate-800 px-8 py-3 w-full rounded-2xl text-lg font-bold text-teal-50 hover:opacity-75"
                >
                  Masuk
                </button>
              </div>
            </form>
            <p class="text-base text-slate-900 text-center mt-3">
              Belom punya akun?
              <a href="/register" class="text-base text-teal-500 hover:opacity-80"
                >Daftar Sekarang</a
              >
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- Login Section End -->

    <script>
        // Sembunyikan elemen setelah 5 detik (5000 ms)
        setTimeout(function() {
            const flash = document.getElementById('flash-message');
            if (flash) {
                flash.style.display = 'none';
            }
        }, 3000);
    </script>
@endsection
