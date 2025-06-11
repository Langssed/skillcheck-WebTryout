<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- Tailwind --}}
    @vite('resources/css/app.css')
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Skill Check</title>
  </head>
  <body>
    {{-- Header --}}
    @include('partials.header')

    {{-- Contianer --}}
    <div class="w-full min-h-[100dvh]">
        @yield('container')
    </div>

    {{-- Footer --}}
    @include('partials.footer')

    <!-- Javascript -->
    <script src="{{ asset('js/script.js') }}"></script>

    <!-- Feather Icon -->
    <script>
      feather.replace();
    </script>
  </body>
</html>