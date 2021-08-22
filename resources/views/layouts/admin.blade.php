<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Panafrap | Administration</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('admin')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin')}}/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('style')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('admin')}}/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Panafrap</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin')}}/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item mt-auto ">
            <a href="{{ route('categorie.index')}}" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Categories
              </p>
            </a>
          </li>
          <li class="nav-item mt-auto ">
            <a href="{{ route('tag.index')}}"  class="nav-link">
              <i class="nav-icon fas fa-tag"></i>
              <p>
                Tag
              </p>
            </a>
          </li>
          <li class="nav-item mt-auto ">
            <a href="{{ route('artiste.index')}}"  class="nav-link">
              <i class="nav-icon fas fa-tag"></i>
              <p>
                Artistes
              </p>
            </a>
          </li>
          <li class="nav-item mt-auto ">
            <a href="{{ route('article.index')}}"  class="nav-link">
              <i class="nav-icon fas fa-tag"></i>
              <p>
                Articles
              </p>
            </a>
          </li>
          <li class="nav-item mt-auto ">
            <a href="{{ route('users.index')}}"  class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Utilisateur
              </p>
            </a>
          </li>
          <li class="nav-header">Votre Compte</li>
          <li class="nav-item mt-auto">
            <a href="{{ route('user.profile')}}"  class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
               Votre Profils
              </p>
            </a>
          </li>
          <li class="nav-item mt-auto">
            <a href="{{ route('setting.edit')}}"  class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
              Paramètres
              </p>
            </a>
          </li>
          <li class="nav-item mt-auto bg-danger">
            <a href=" " onclick="event.preventDefault(); document.getElementById('logout').submit();" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Deconnexion
              </p>
            </a>
          </li>
          <li class="text-center mt-2">
            <a href=" {{ route('website') }} "  class="btn btn-primary text-white" target="_blank">
              <p class="mb-0">
                Voir le site
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('admin')}}/plugins//jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin')}}/js/adminlte.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@yield('script')
<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
    @endif
</script>
</body>
</html>
