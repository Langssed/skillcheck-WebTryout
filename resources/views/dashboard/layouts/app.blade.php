<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Skill Check | @yield('title')</title>

  @include('dashboard.layouts.style')

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  
    @if (Request::is('dashboard*'))
      @include('dashboard.layouts.navbar')

      @include('dashboard.layouts.sidebar')
    @endif

    @yield('content')

    @if (Request::is('dashboard*'))
      @include('dashboard.layouts.footer')
    @endif

@include('dashboard.layouts.script')

</body>
</html>