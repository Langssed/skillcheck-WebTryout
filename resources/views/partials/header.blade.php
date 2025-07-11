<!-- Header Start -->
<header class="bg-teal-500 fixed top-0 left-0 w-full z-[9999]">
  <div class="container max-w-screen-xl mx-auto px-5">
    <div class="flex justify-between py-4 items-center relative">
      <a href="/" class="text-3xl font-bold text-white hover:text-slate-800 flex gap-2 items-center">
        <img src="{{ asset('img/logoSK.png') }}" alt="skillcheck" class="w-15 rounded-lg">
        skillcheck.
      </a>

      <!-- Navigation Links -->
      <ul id="ham-nav"
        class="md:flex md:static translate-x-60 md:translate-x-0 md:bg-transparent gap-10 absolute right-2 top-20 bg-teal-50 border-2 border-teal-500 px-8 py-4 rounded-xl transition duration-500">

        @auth
          @if (Auth::user()->roles->isNotEmpty())
            <li class="group mt-2 md:mt-0">
              <a href="/choose-role"
                class="flex items-center gap-2 md:text-xl text-lg {{ Request::is('/dashboard') ? 'md:border-b-3 border-slate-800 md:text-slate-800 text-teal-500' : 'md:text-white text-slate-800' }} pb-1 px-2 md:group-hover:border-b-3 group-hover:border-slate-800 md:group-hover:text-slate-800 group-hover:text-teal-500 font-medium">
                <i data-feather="grid" class="w-5 h-5"></i> Dashboard
              </a>
            </li>
          @endif
        @endauth

        <li class="group mt-2 md:mt-0">
          <a href="/"
            class="flex items-center gap-2 md:text-xl text-lg {{ Request::is('/') ? 'md:border-b-3 border-slate-800 md:text-slate-800 text-teal-500' : 'md:text-white text-slate-800' }} pb-1 px-2 md:group-hover:border-b-3 group-hover:border-slate-800 md:group-hover:text-slate-800 group-hover:text-teal-500 font-medium">
            <i data-feather="home" class="w-5 h-5"></i> Home
          </a>
        </li>

        <li class="group mt-2 md:mt-0">
          <a href="/about"
            class="flex items-center gap-2 md:text-xl text-lg {{ Request::is('about') ? 'md:border-b-3 border-slate-800 md:text-slate-800 text-teal-500' : 'md:text-white text-slate-800' }} pb-1 px-2 md:group-hover:border-b-3 group-hover:border-slate-800 md:group-hover:text-slate-800 group-hover:text-teal-500 font-medium">
            <i data-feather="info" class="w-5 h-5"></i> About
          </a>
        </li>

        <li class="group mt-2 md:mt-0">
          <a href="/question-lists"
            class="flex items-center gap-2 md:text-xl text-lg {{ Request::is('question-lists') ? 'md:border-b-3 border-slate-800 md:text-slate-800 text-teal-500' : 'md:text-white text-slate-800' }} pb-1 px-2 md:group-hover:border-b-3 group-hover:border-slate-800 md:group-hover:text-slate-800 group-hover:text-teal-500 font-medium">
            <i data-feather="file-text" class="w-5 h-5"></i> Tryout
          </a>
        </li>
      </ul>

      <!-- Right Section -->
      <div class="flex justify-center items-center gap-5">
        @guest
        <a href="/login"
          class="flex items-center gap-2 px-8 py-2 {{ Request::is('login') ? 'bg-slate-800 text-white' : 'bg-white text-teal-500' }} hover:bg-slate-800 hover:text-white rounded-2xl text-lg font-medium">
          <i data-feather="log-in" class="w-5 h-5"></i> Login
        </a>
        @endguest

        @auth
        <div id="user-dropdown" class="pb-1 hover:border-b-3 hover:border-white cursor-pointer">
          <span class="font-medium text-md md:text-lg text-white">{{ Auth::user()->name }}</span>
          <span id="user-arrow" class="md:ml-2 ml-1 border-t-3 border-l-3 border-white rotate-45 -mb-[1px] md:h-3 md:w-3 h-2 w-2 inline-block"></span>
        </div>
        @endauth

        <!-- User Dropdown -->
        <div id="user-container"
          class="flex flex-col gap-1 w-40 absolute top-18 right-12 md:right-0 rounded-xl px-6 py-4 bg-teal-50 border-2 border-teal-500 scale-0 origin-top transition duration-500">
          <form action="/auth/logout" method="POST">
            @csrf
            <button type="submit"
              class="flex items-center gap-2 text-red-800 hover:bg-red-600 hover:text-white w-full rounded-xl px-3 py-2 text-md font-medium text-left">
              <i data-feather="log-out" class="w-5 h-5"></i> Logout
            </button>
          </form>
        </div>

        <!-- Hamburger -->
        <div class="flex flex-col gap-[5px] md:hidden" id="hamburger">
          <span class="block h-1 w-7 bg-white origin-top-left transition duration-500"></span>
          <span class="block h-1 w-7 bg-white transition duration-500"></span>
          <span class="block h-1 w-7 bg-white origin-bottom-left transition duration-500"></span>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Header End -->

<!-- Feather Icons Init -->
<script>
  feather.replace();

  const hamBtn = document.querySelector("#hamburger");
  const hamContainer = document.querySelector("#ham-nav");

  hamBtn.addEventListener("click", function () {
    hamContainer.classList.toggle("nav-active");
    hamBtn.classList.toggle("ham-active");
  });

  const userDropDown = document.querySelector("#user-dropdown");
  const userArrow = document.querySelector("#user-arrow");
  const userContainer = document.querySelector("#user-container");

  if (userDropDown && userArrow && userContainer) {
    userDropDown.addEventListener("click", function () {
      userContainer.classList.toggle("user-container-active");
      userArrow.classList.toggle("user-arrow-down");
    });

    document.addEventListener("click", function (event) {
      const isClickInside =
        userContainer.contains(event.target) || userDropDown.contains(event.target);
      if (!isClickInside) {
        userContainer.classList.remove("user-container-active");
        userArrow.classList.remove("user-arrow-down");
      }
    });
  }

  document.addEventListener("click", function (event) {
    const isClickInside = hamContainer.contains(event.target) || hamBtn.contains(event.target);
    if (!isClickInside) {
      hamContainer.classList.remove("nav-active");
      hamBtn.classList.remove("ham-active");
    }
  });
</script>