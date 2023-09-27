<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}} | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte')}}/dist/css/adminlte.min.css">
    
    {{-- Back to Top --}}
    <link rel="stylesheet" href="{{asset('adminlte')}}/dist/css/backtotop.css">
    

    <!-- jS--------------------------------------------------------------------------------------------------------------------------------- -->
    @yield('css')
    <!-- /jS-------------------------------------------------------------------------------------------------------------------------------- -->

  </head>
  <body class="hold-transition sidebar-mini sidebar-collapse layout-footer-fixed layout-navbar-fixed layout-fixed text-sm">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav"> 
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link user-panel" data-toggle="dropdown" href="#">
            Wildan Auliana <i class="far fa-user"> </i> 
          </a>
          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
            <div class="user-panel mt-2 pb-2 mb-2 d-flex">
              <div class="image">
                <img src="{{asset('adminlte')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
            </div>
            <div class="dropdown-divider"></div>
            <a href="userprofile" class="dropdown-item">
              <i class="fas fa-user mr-1"></i> User Profile
            </a>
            <a href="#" class="dropdown-item">
              <i class="fas fa-sign-out-alt mr-1"></i> Logout
            </a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="dashboard" class="brand-link">
        <img src="{{asset('adminlte')}}/src/icon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{config('app.name')}}</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar menu ------------------------------------------------------------------------------------------------------------------------- -->
        @include('layout.sidebarmenu')
        <!-- /Sidebar menu ------------------------------------------------------------------------------------------------------------------------ -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Main content---------------------------------------------------------------------------------------------------------------------------- -->
      @yield('konten')
      <!-- /.content------------------------------------------------------------------------------------------------------------------------------- -->

    </div>
    <!-- /.content-wrapper -->

    <!-- Modal ----------------------------------------------------------------------------------------------------------------------------------- -->
    @yield('modals')
    <!-- Modal ----------------------------------------------------------------------------------------------------------------------------------- -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        we play with <b>inovation</b> | <b>Version</b> 1.0.0
      </div>
      <strong>Copyright &copy; 2023 <a href="#">{{config('app.name')}}</a>.</strong> All rights reserved.
    </footer>

  </div>
  <!-- ./wrapper -->

  {{-- Back to top ---------------------------------------------------------------------------------------------------------------------------------}}
  <a id="back-to-top" href="#content-header">
    <i class="fa fa-arrow-up"></i> Back to Top
  </a>

  <!-- jQuery -->
  <script src="{{asset('adminlte')}}/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('adminlte')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('adminlte')}}/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('adminlte')}}/dist/js/demo.js"></script>

  <!-- jS--------------------------------------------------------------------------------------------------------------------------------- -->
  @yield('js')
  <!-- /jS-------------------------------------------------------------------------------------------------------------------------------- -->

  </body>
</html>
