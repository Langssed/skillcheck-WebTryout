<!-- Footer Start -->
<footer class="w-full bg-teal-500 text-white py-8 mt-10">
  <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center gap-4 text-center md:text-left">
    <div class="flex items-center gap-3">
      <img src="{{ asset('img/logoSK.png') }}" alt="SkillCheck Logo" class="w-10 h-10 rounded-lg">
      <div>
        <h2 class="text-lg font-semibold">SkillCheck</h2>
        <p class="text-sm text-white/80">Universitas Mercu Buana</p>
      </div>
    </div>

    <div class="flex gap-6 items-center text-white">
      <a href="/" class="hover:text-slate-800 transition duration-300">
        <i data-feather="home" class="w-5 h-5 inline"></i> <span class="hidden md:inline">Home</span>
      </a>
      <a href="/about" class="hover:text-slate-800 transition duration-300">
        <i data-feather="info" class="w-5 h-5 inline"></i> <span class="hidden md:inline">About</span>
      </a>
      <a href="/question-lists" class="hover:text-slate-800 transition duration-300">
        <i data-feather="edit-3" class="w-5 h-5 inline"></i> <span class="hidden md:inline">Tryout</span>
      </a>
    </div>

    <p class="text-sm text-white/80">&copy; 2025 SkillCheck. All rights reserved.</p>
  </div>
</footer>
<!-- Footer End -->