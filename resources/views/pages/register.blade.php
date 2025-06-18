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
            <form id="registerForm" action="/auth/register" method="POST"> <!-- 💡 -->
              @csrf
              <div class="w-full mb-5">
                <label for="name" class="font-medium text-md">Nama Lengkap</label>
                <div class="relative flex justify-center">
                  <i data-feather="user" class="absolute left-3 top-5"></i
                  ><input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                    class="w-full text-md px-2 pl-12 mt-2 py-3 rounded-2xl border border-slate-900 focus:bg-slate-50 focus:outline-none focus:ring-2 focus:border-0 focus:ring-slate-800"
                    placeholder="Nama lengkap Anda"
                  />
                </div>
                @error('name')
                  <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
              </div>

              <div class="w-full mb-5">
                <label for="email" class="font-medium text-md">Email</label>
                <div class="relative flex justify-center">
                  <i data-feather="mail" class="absolute left-3 top-5"></i
                  ><input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    class="w-full text-md px-2 pl-12 mt-2 py-3 rounded-2xl border border-slate-900 focus:bg-slate-50 focus:outline-none focus:ring-2 focus:border-0 focus:ring-slate-800"
                    placeholder="contoh@gmail.com"
                  />
                </div>
                @error('email')
                  <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
              </div>

              <div class="w-full mb-5">
                <label for="school" class="font-medium text-md"
                  >Asal Sekolah</label
                >
                <div class="relative flex justify-center">
                  <i data-feather="map-pin" class="absolute left-3 top-5"></i
                  ><input
                    type="text"
                    name="school"
                    id="school"
                    value="{{ old('school') }}"
                    class="w-full text-md px-2 pl-12 mt-2 py-3 rounded-2xl border border-slate-900 focus:bg-slate-50 focus:outline-none focus:ring-2 focus:border-0 focus:ring-slate-800"
                    placeholder="Asal Sekolah Anda"
                  />
                </div>
                @error('school')
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
                    class="w-full text-md px-2 pl-12 mt-2 py-3 rounded-2xl border border-slate-900 focus:bg-slate-50 focus:outline-none focus:ring-2 focus:border-0 focus:ring-slate-800"
                    placeholder="********"
                  />
                </div>
                @error('password')
                  <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
              </div>

              <div class="w-full mb-5">
                <label for="password_confirmation" class="font-medium text-md"
                  >Konfirmasi Kata Sandi</label
                >
                <div class="relative flex justify-center">
                  <i data-feather="lock" class="absolute left-3 top-5"></i
                  ><input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    class="w-full text-md px-2 pl-12 mt-2 py-3 rounded-2xl border border-slate-900 focus:bg-slate-50 focus:outline-none focus:ring-2 focus:border-0 focus:ring-slate-800"
                    placeholder="********"
                  />
                </div>
                @error('password_confirmation')
                  <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
              </div>

              <div class="flex items-center justify-center w-full mt-4">
                <button
                  type="button"
                  id="submitBtn"
                  class="bg-slate-800 px-8 py-3 w-full rounded-2xl text-lg font-bold text-teal-50 hover:opacity-75">
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