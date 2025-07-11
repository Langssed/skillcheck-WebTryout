<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- Tailwind --}}
    @vite('resources/css/app.css')
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    {{-- Sweetalert --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    {{-- Sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Feather Icon -->
    <script>
      feather.replace();
    </script>
  </body>
</html>