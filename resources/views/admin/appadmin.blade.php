<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <title>{{ config('app.name', 'Laravel') }}</title>    

    <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('adminAssets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminAssets/modules/fontawesome/css/all.min.css') }}">

    @yield('csslib')

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('adminAssets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('adminAssets/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('adminAssets/css/custom.css') }}">
</head>

<body @if(route('dashboard')) onload=display_ct(); @endif>
    <div id="app">
        <div class="main-wrapper">
          <div class="navbar-bg"></div>
    
          <!-- Top Navigation Bar -->
          <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
              <ul class="navbar-nav mr-3">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
              </ul>
            
            </form>
            <!-- Profile Nav Bar Kanan -->
            <ul class="navbar-nav navbar-right">          
              <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('adminAssets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a href="features-profile.html" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                  </a>
                  <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
                </div>
              </li>
            </ul>
          </nav>
    
          <!-- Side Navigation Bar -->
          <div class="main-sidebar">
            <aside id="sidebar-wrapper">
              <div class="sidebar-brand">
                <a href="index.html">Yayasan Al-Mu'awanah</a>
                <!-- <img src="../assets/img/yayasan.png" alt=""> -->
              </div>
              <div class="sidebar-brand sidebar-brand-sm">
                <a href="index.html">AM</a>
              </div>
              <ul class="sidebar-menu">
                  <!-- Dashboard -->
                  <li class="active"><a href="index.html" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
    
                  @hasrole('superadmin')
                  <!-- Admin Side Bar -->                  
                  <li class="menu-header">Data</li>
                  <li><a class="nav-link" href="userdata.html"><i class="fas fa-user"></i> <span>Akun</span></a></li>
                  @elserole('admin_yys|admin_ra|admin_tka|admin_mts|admin_ma|admin_pst')
                  
                  <!-- Home Side Bar -->
                  <li class="menu-header">Halaman Awal</li>
                  <li><a class="nav-link" href="banner.html"><i class="far fa-image"></i> <span>Banner</span></a></li>
                  <li><a class="nav-link" href="sambutan.html"><i class="fas fa-align-left"></i> <span>Sambutan</span></a></li>
                  <li><a class="nav-link" href="deskripsi-singkat.html"><i class="fas fa-book-open"></i> <span>Deskripsi Singkat</span></a></li>
                  <li><a class="nav-link" href="brosur.html"><i class="fas fa-file-invoice"></i> <span>Brosur</span></a></li>
    
                  <!-- Halaman Side Bar -->
                  <li class="menu-header">Halaman Lainnya</li>
                  <li><a class="nav-link" href="profile.html"><i class="far fa-address-card"></i> <span>Profile</span></a></li>
                  <li><a class="nav-link" href="galeri.html"><i class="fas fa-images"></i> <span>Galeri</span></a></li>
                  <li><a class="nav-link" href="blog.html"><i class="fas fa-bookmark"></i> <span>Blog</span></a></li>
                  <li><a class="nav-link" href="kontak.html"><i class="fas fa-phone"></i> <span>Kontak</span></a></li>
                  <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
                  @endhasrole
                </ul>
                <!-- IDK -->
                
            </aside>
          </div>
          
          @yield('maincontent')
          
    
          <!-- Footer -->
          <footer class="main-footer">
            <div class="footer-left">
              Copyright &copy; 2021 <div class="bullet"></div> Design By Varez Y. & <a href="https://fadilahmuh.github.io/">Fannie M. Fadilah S.</a>
            </div>
            <div class="footer-right">
              2.3.0
            </div>
          </footer>
        </div>
      </div>

   <!-- General JS Scripts -->
  <script src="{{ asset('adminAssets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('adminAssets/modules/popper.js') }}"></script>
  <script src="{{ asset('adminAssets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('adminAssets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('adminAssets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('adminAssets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('adminAssets/js/stisla.js') }}"></script> 

  @yield('scriptlib')

  @yield('scriptline')

  <script src="{{ asset('adminAssets/js/scripts.js') }}"></script>
  <script src="{{ asset('adminAssets/js/custom.js') }}"></script>

  @yield('scriptpage')
</body>
</html>
