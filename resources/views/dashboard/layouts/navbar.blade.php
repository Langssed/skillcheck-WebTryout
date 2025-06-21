<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      @if (Auth::user()->roles->count() !== 1)
        <li>
          <a href="/choose-role" class="btn btn-md btn-info">Pilih Role</a>
        </li>
      @endif
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="{{ asset('adminlte3/dist/img/user2-160x160.jpg') }}" class="user-image img-circle" alt="User Image">
          <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="{{ asset('adminlte3/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

            <p>
              {{ Auth::user()->name }}
              <div>
                <span class="badge badge-success">{{session('active_role') }}</span>
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