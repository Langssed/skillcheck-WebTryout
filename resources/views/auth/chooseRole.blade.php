<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />

    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <title>Skill Check</title>

    <style>
      body {
        background: linear-gradient(to right, #f8f9fa, #e9ecef);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }

      .role-card {
        min-width: 220px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }

      .role-card:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      }

      .disabled-role {
        pointer-events: none;
        opacity: 0.6;
      }

      .header-icon {
        font-size: 50px;
        color: #ffc107;
      }

      .subtitle {
        font-size: 1.2rem;
        color: #6c757d;
      }

      .footer {
        position: fixed;
        bottom: 10px;
        width: 100%;
        text-align: center;
        color: #aaa;
        font-size: 0.9rem;
      }
    </style>
  </head>
  <body>

    <div class="container d-flex flex-column mt-5 align-items-center justify-content-center">
      <div class="text-center mb-2">
        <div class="header-icon mb-3"><i class="fas fa-user-check"></i></div>
        <h2 class="font-weight-bold text-dark">Pilih Peran Anda</h2>
        <p class="subtitle">Akses fitur berdasarkan peran yang telah diberikan kepada akun Anda.</p>
      </div>

      <div class="d-flex flex-wrap justify-content-center">
        @foreach ($roles as $role)
          <form method="POST" action="{{ route('choose.role.store') }}" class="m-3">
            @csrf
            <input type="hidden" name="role" value="{{ $role->name }}">

            @if($hasRoles->contains('name', $role->name))
              <button type="submit" class="btn btn-warning text-white role-card d-flex flex-column align-items-center p-4 rounded shadow">
                <i class="fas fa-user-tag fa-2x mb-2"></i>
                <span class="h5 mb-0 text-uppercase">{{ $role->name }}</span>
              </button>
            @else
              <div class="btn btn-secondary role-card disabled-role d-flex flex-column align-items-center p-4 rounded shadow">
                <i class="fas fa-lock fa-2x mb-2"></i>
                <span class="h5 mb-0 text-uppercase">{{ $role->name }}</span>
              </div>
            @endif
          </form>
        @endforeach
      </div>
    </div>

    <div class="footer">
      &copy; {{ date('Y') }} SkillCheck App — All rights reserved.
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>