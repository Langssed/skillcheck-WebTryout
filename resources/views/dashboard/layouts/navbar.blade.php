<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li>
        <a href="/" class="btn btn-md btn-success"><i class="fas fa-home"></i></a>
        @if (Auth::user()->roles->count() !== 1)
          <a href="/choose-role" class="btn btn-md btn-info"><i class="fas fa-user-check mr-1"></i>Pilih Role</a>
        @endif
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          @if (Auth::user()->profile_photo)
            <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" 
                class="user-image img-circle elevation-2" 
                alt="User Image">
          @else
            <i class="fas fa-user-circle fa-lg text-white mr-1"></i>
          @endif
          <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
        </a>

        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            @if (Auth::user()->profile_photo)
              <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" 
                  class="img-circle elevation-2" 
                  alt="User Image">
            @else
              <i class="fas fa-user-circle fa-5x text-white mb-2"></i>
            @endif

            <p class="mt-2">
              {{ Auth::user()->name }}
              <div>
                <span class="badge badge-success">{{ session('active_role') }}</span>
              </div>
            </p>
          </li>

          <!-- Menu Footer-->
          <li class="user-footer">
            <form action="/auth/logout" method="POST">
              @csrf
              <button type="submit" class="btn btn-danger btn-sm float-right">
                <i class="fas fa-sign-out-alt"></i>
                Logout
              </button>
            </form>
          </li>
        </ul>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->