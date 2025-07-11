@extends('layouts.main')

@section('container')
  <section id="login" class="min-h-screen bg-teal-50 pt-28">
    <div class="container max-w-screen-xl mx-auto flex justify-center items-center h-full">
      <div class="flex flex-col md:flex-row w-full md:w-3/4 rounded-3xl shadow-xl overflow-hidden bg-white">
        
        {{-- Left Panel (Illustration + Welcome Text) --}}
        <div class="hidden md:flex md:w-1/2 bg-gradient-to-br from-teal-500 to-teal-600 p-10 flex-col justify-center items-center text-white">
          <h2 class="text-3xl font-bold mb-4">Selamat Datang Kembali</h2>
          <p class="text-center mb-8 text-base">Masukkan kredensial Anda untuk mengakses akun dan menjelajahi dashboard.</p>
          <img src="/img/login.svg" alt="Login Image" class="w-4/5 animate-fade-in" />
        </div>

        {{-- Right Panel (Login Form) --}}
        <div class="w-full md:w-1/2 p-10">
          <h2 class="text-2xl font-bold text-center text-slate-800 mb-6">Masuk ke Akun Anda</h2>
          
          @if(session()->has('failed'))
            <div id="flash-message" class="bg-red-500 text-white text-center py-2 px-4 rounded-md mb-4 shadow-md animate-pulse">
              {{ session('failed') }}
            </div>
          @endif

          @if(session()->has('success'))
            <div id="flash-message" class="bg-green-500 text-white text-center py-2 px-4 rounded-md mb-4 shadow-md animate-pulse">
              {{ session('success') }}
            </div>
          @endif

          <form action="/auth/login" method="POST" class="space-y-5">
            @csrf

            {{-- Email --}}
            <div>
              <label for="email" class="block text-sm font-medium text-slate-700">Email</label>
              <div class="relative mt-2">
                <i data-feather="mail" class="absolute left-3 top-3.5 text-slate-400"></i>
                <input
                  type="email"
                  name="email"
                  id="email"
                  value="{{ old('email') }}"
                  placeholder="contoh@gmail.com"
                  class="w-full pl-10 pr-4 py-3 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-none"
                />
              </div>
              @error('email')
                <span class="text-sm text-red-500">{{ $message }}</span>
              @enderror
            </div>

            {{-- Password --}}
            <div>
              <label for="password" class="block text-sm font-medium text-slate-700">Kata Sandi</label>
              <div class="relative mt-2">
                <i data-feather="lock" class="absolute left-3 top-3.5 text-slate-400"></i>
                <input
                  type="password"
                  name="password"
                  id="password"
                  placeholder="********"
                  class="w-full pl-10 pr-4 py-3 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-none"
                />
              </div>
              @error('password')
                <span class="text-sm text-red-500">{{ $message }}</span>
              @enderror
            </div>

            {{-- Submit --}}
            <div>
              <button
                type="submit"
                class="w-full bg-teal-600 hover:bg-teal-700 text-white font-semibold py-3 rounded-xl transition duration-300"
              >
                Masuk
              </button>
            </div>
          </form>

          {{-- Google Auth --}}
          <div class="mt-4">
            <a
              href="/auth/redirect"
              class="flex items-center justify-center gap-2 w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-3 rounded-xl transition duration-300"
            >
              <i class="fa-brands fa-google"></i> Masuk dengan Google
            </a>
          </div>

          {{-- Register --}}
          <p class="text-sm text-slate-600 text-center mt-6">
            Belum punya akun?
            <a href="/register" class="text-teal-500 hover:underline font-medium">Daftar Sekarang</a>
          </p>
        </div>
      </div>
    </div>

    {{-- Auto hide flash message --}}
    <script>
      setTimeout(() => {
        const flash = document.getElementById('flash-message');
        if (flash) flash.style.display = 'none';
      }, 3000);
    </script>
  </section>
@endsection
