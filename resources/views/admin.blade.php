<!DOCTYPE html>
<html>
  @include('admin-inc.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  @include('admin-inc.navbar')
  @include('admin-inc.sidebar')
  <div class="content-wrapper">
    @yield('content')
</div>
  @include('admin-inc.footer')
</body>
</html>
