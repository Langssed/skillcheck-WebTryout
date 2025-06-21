<aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed">
  <!-- Brand Logo -->
  <a href="/" class="brand-link">
    <img src="{{ asset('adminlte3/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Skill Check</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    @php
      use Spatie\Permission\Models\Role;
      $activeRoleName = session('active_role');
      $activePermissions = [];
      $isSuperAdmin = false;

      if ($activeRoleName) {
          try {
              $role = Role::findByName($activeRoleName);
              $activePermissions = $role->permissions->pluck('name')->toArray();
          } catch (\Exception $e) {
              error.log('Role Not Found');
          }
      }

      if($activeRoleName === 'super admin'){
          $isSuperAdmin = true;
      }
    @endphp

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-header text-uppercase">menu {{ session('active_role') }}</li>

        @if($isSuperAdmin || in_array('Dashboard Access', $activePermissions))
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link @yield('dashboard')">
            <i class="nav-icon fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        @endif

        @if($isSuperAdmin || in_array('Profile Access', $activePermissions))
        <li class="nav-item">
          <a href="{{ route('dashboard.profile') }}" class="nav-link @yield('dashboardProfile')">
            <i class="nav-icon fas fa-user-circle"></i>
            <p>Profile</p>
          </a>
        </li>
        @endif

        @if($isSuperAdmin || in_array('History Access', $activePermissions))
        <li class="nav-item">
          <a href="{{ route('dashboard.history') }}" class="nav-link @yield('dashboardHistory')">
            <i class="nav-icon fas fa-history"></i>
            <p>History</p>
          </a>
        </li>
        @endif

        @if($isSuperAdmin || in_array('Role Access', $activePermissions))
        <li class="nav-item">
          <a href="{{ route('dashboard.role.index') }}" class="nav-link @yield('dashboardRole')">
            <i class="nav-icon fas fa-lock"></i>
            <p>Role</p>
          </a>
        </li>
        @endif

        @if($isSuperAdmin || in_array('Permission Access', $activePermissions))
        <li class="nav-item">
          <a href="{{ route('dashboard.permission.index') }}" class="nav-link @yield('dashboardPermission')">
            <i class="nav-icon fas fa-check-square"></i>
            <p>Permission</p>
          </a>
        </li>
        @endif

        @if($isSuperAdmin || in_array('User Access', $activePermissions))
        <li class="nav-item">
          <a href="{{ route('dashboard.user.index') }}" class="nav-link @yield('dashboardUser')">
            <i class="nav-icon fas fa-users"></i>
            <p>User</p>
          </a>
        </li>
        @endif

        @if($isSuperAdmin || in_array('Level Access', $activePermissions))
        <li class="nav-item">
          <a href="{{ route('dashboard.level.index') }}" class="nav-link @yield('dashboardLevel')">
            <i class="nav-icon fas fa-school"></i>
            <p>Tingkat</p>
          </a>
        </li>
        @endif

        @if($isSuperAdmin || in_array('Subject Access', $activePermissions))
        <li class="nav-item">
          <a href="{{ route('dashboard.subject.index') }}" class="nav-link @yield('dashboardSubject')">
            <i class="nav-icon fas fa-book"></i>
            <p>Mapel</p>
          </a>
        </li>
        @endif

        @if($isSuperAdmin || in_array('Category Access', $activePermissions))
        <li class="nav-item">
          <a href="{{ route('dashboard.category.index') }}" class="nav-link @yield('dashboardCategory')">
            <i class="nav-icon fas fa-list"></i>
            <p>Kategori</p>
          </a>
        </li>
        @endif

        @if($isSuperAdmin || in_array('Question Access', $activePermissions))
        <li class="nav-item">
          <a href="{{ route('dashboard.question.index') }}" class="nav-link @yield('dashboardQuestion')">
            <i class="nav-icon fas fa-question"></i>
            <p>Soal</p>
          </a>
        </li>
        @endif

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>