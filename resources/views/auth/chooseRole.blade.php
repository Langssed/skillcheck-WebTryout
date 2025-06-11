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

    <div class="flex flex-col mt-20 items-center w-full h-[100vh]">
        <h3 class="text-3xl font-semibold text-slate-800 text-center mb-8">Pilih Role</h3>

        <div class="flex gap-4 flex-wrap justify-center">
            @foreach ($roles as $role)
                <form method="POST" action="{{ route('choose.role.store') }}">
                    @csrf
                    <input type="hidden" name="role" value="{{ $role->name }}">
                    
                    @if($hasRoles->contains('name', $role->name))
                        <button type="submit" class="flex flex-col items-center px-8 py-4 min-w-50 text-white bg-yellow-500 hover:bg-yellow-600 text-xl font-medium rounded-xl">
                          <i data-feather="user" class="w-10 h-10"></i>
                          {{ $role->name }}
                        </button>
                        @else
                        <div class="flex flex-col items-center px-8 py-4 min-w-50 text-white bg-slate-500 cursor-not-allowed text-xl font-medium rounded-xl" disabled>
                          <i data-feather="x-circle" class="w-10 h-10"></i>
                          {{ $role->name }}
                        </div>
                    @endif
                </form>
            @endforeach
        </div>
    </div>


    <!-- Javascript -->
    <script src="{{ asset('js/script.js') }}"></script>

    <!-- Feather Icon -->
    <script>
      feather.replace();
    </script>
  </body>
</html>