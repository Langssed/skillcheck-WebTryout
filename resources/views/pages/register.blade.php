@extends('layouts.main')

@section('container')
  <section id="register" class="min-h-screen bg-slate-50 pt-28">
    <div class="container max-w-screen-xl mx-auto flex justify-center items-center h-full">
      <div class="flex flex-col md:flex-row w-full md:w-3/4 rounded-3xl shadow-xl overflow-hidden bg-white">
        
        {{-- Left Panel --}}
        <div class="hidden md:flex md:w-1/2 bg-gradient-to-br from-slate-800 to-slate-700 p-10 flex-col justify-center items-center text-teal-400">
          <h2 class="text-3xl font-bold mb-4">Daftar Sekarang</h2>
          <p class="text-center mb-8 text-base">Buat akun baru Anda dan mulai menjelajahi semua fitur hebat kami.</p>
          <img src="/img/register.svg" alt="Register Image" class="w-4/5 animate-fade-in" />
        </div>

        {{-- Right Panel (Form) --}}
        <div class="w-full md:w-1/2 p-10">
          <h2 class="text-2xl font-bold text-center text-slate-800 mb-6">Buat Akun Baru</h2>

          <form id="registerForm" action="/auth/register" method="POST" class="space-y-5">
            @csrf

            {{-- Nama --}}
            <div>
              <label for="name" class="block text-sm font-medium text-slate-700">Nama Lengkap</label>
              <div class="relative mt-2">
                <i data-feather="user" class="absolute left-3 top-3.5 text-slate-400"></i>
                <input
                  type="text"
                  name="name"
                  id="name"
                  value="{{ old('name') }}"
                  placeholder="Nama lengkap Anda"
                  class="w-full pl-10 pr-4 py-3 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-slate-800 focus:border-none"
                />
              </div>
              @error('name')
                <span class="text-sm text-red-500">{{ $message }}</span>
              @enderror
            </div>

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
                  class="w-full pl-10 pr-4 py-3 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-slate-800 focus:border-none"
                />
              </div>
              @error('email')
                <span class="text-sm text-red-500">{{ $message }}</span>
              @enderror
            </div>

            {{-- Asal Sekolah --}}
            <div>
              <label for="school" class="block text-sm font-medium text-slate-700">Asal Sekolah</label>
              <div class="relative mt-2">
                <i data-feather="map-pin" class="absolute left-3 top-3.5 text-slate-400"></i>
                <input
                  type="text"
                  name="school"
                  id="school"
                  value="{{ old('school') }}"
                  placeholder="Asal sekolah Anda"
                  class="w-full pl-10 pr-4 py-3 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-slate-800 focus:border-none"
                />
              </div>
              @error('school')
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
                  class="w-full pl-10 pr-4 py-3 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-slate-800 focus:border-none"
                />
              </div>
              @error('password')
                <span class="text-sm text-red-500">{{ $message }}</span>
              @enderror
            </div>

            {{-- Konfirmasi Password --}}
            <div>
              <label for="password_confirmation" class="block text-sm font-medium text-slate-700">Konfirmasi Kata Sandi</label>
              <div class="relative mt-2">
                <i data-feather="lock" class="absolute left-3 top-3.5 text-slate-400"></i>
                <input
                  type="password"
                  name="password_confirmation"
                  id="password_confirmation"
                  placeholder="********"
                  class="w-full pl-10 pr-4 py-3 border border-slate-300 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-slate-800 focus:border-none"
                />
              </div>
              @error('password_confirmation')
                <span class="text-sm text-red-500">{{ $message }}</span>
              @enderror
            </div>

            {{-- Tombol Submit --}}
            <div>
              <button
                type="submit"
                class="w-full bg-slate-800 hover:bg-slate-900 text-white font-semibold py-3 rounded-xl transition duration-300"
              >
                Daftar
              </button>
            </div>
          </form>

          {{-- Punya akun? --}}
          <p class="text-sm text-slate-600 text-center mt-6">
            Sudah punya akun?
            <a href="/login" class="text-teal-500 hover:underline font-medium">Masuk di sini</a>
          </p>
        </div>
      </div>
    </div>

    <script>
      feather.replace();
    </script>
  </section>
@endsection

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("registerForm");
    const submitBtn = document.getElementById("submitBtn");

    submitBtn.addEventListener("click", async function (e) {
      e.preventDefault();

      // Reset semua pesan error
      document.querySelectorAll(".text-red-500").forEach(el => el.textContent = "");

      let isValid = true;

      // Ambil input
      const name = document.getElementById("name").value.trim();
      const email = document.getElementById("email").value.trim();
      const school = document.getElementById("school").value.trim();
      const password = document.getElementById("password").value;
      const passwordConfirmation = document.getElementById("password_confirmation").value;

      // Validasi name: required|min:3|max:32
      if (name.length < 3 || name.length > 32) {
        showError("name", "Nama harus 3-32 karakter.");
        isValid = false;
      }

      // Validasi email: required|email|unique
      if (email === "") {
        showError("email", "Email wajib diisi.");
        isValid = false;
      } else if (!validateEmail(email)) {
        showError("email", "Format email tidak valid.");
        isValid = false;
      } else {
        const unique = await isEmailUnique(email);
        if (!unique) {
          showError("email", "Email sudah terdaftar.");
          isValid = false;
        }
      }

      // Validasi school: required|min:4|max:64
      if (school.length < 4 || school.length > 64) {
        showError("school", "Asal sekolah harus 4-64 karakter.");
        isValid = false;
      }

      // Validasi password: required|min:8|max:32
      if (password.length < 8 || password.length > 32) {
        showError("password", "Password harus 8-32 karakter.");
        isValid = false;
      }

      // Validasi konfirmasi password
      if (passwordConfirmation === "") {
        showError("password_confirmation", "Konfirmasi password wajib diisi.");
        isValid = false;
      } else if (password !== passwordConfirmation) {
        showError("password_confirmation", "Konfirmasi password tidak cocok.");
        isValid = false;
      }

      if (isValid) {
        form.submit();
      }
    });

    function showError(inputId, message) {
      const input = document.getElementById(inputId);
      const errorSpan = input.closest(".w-full.mb-5").querySelector(".text-red-500");
      if (errorSpan) {
        errorSpan.textContent = message;
      } else {
        const span = document.createElement("span");
        span.className = "text-sm text-red-500";
        span.textContent = message;
        input.closest(".w-full.mb-5").appendChild(span);
      }
    }

    function validateEmail(email) {
      const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return re.test(email);
    }

    async function isEmailUnique(email) {
      try {
        const response = await fetch("/check-email", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
          },
          body: JSON.stringify({ email }),
        });

        const data = await response.json();
        return !data.exists;
      } catch (error) {
        console.error("Gagal cek email:", error);
        return false;
      }
    }
  });
</script>