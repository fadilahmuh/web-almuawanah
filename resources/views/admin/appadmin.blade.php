<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <title>Admin {{session('divisi')}} Al-Mu'awanah</title>    

    <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

    @yield('csslib')
    
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>

<body @if(url()->current()==route('dashboard')) onload=display_ct(); @endif>
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
                <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a href="{{ route('editUser') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
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
                <a href="{{ route('dashboard')}}">{{session('divisi')}} Al-Mu'awanah</a>
                <!-- <img src="../assets/img/yayasan.png" alt=""> -->
              </div>
              <div class="sidebar-brand sidebar-brand-sm">
                <a href="{{ route('dashboard')}}">AM</a>
              </div>
              <ul class="sidebar-menu">
                  <!-- Dashboard -->
                  <li @if(url()->current()==route('dashboard')) class="active" @endif><a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
    
                  @hasrole('superadmin')
                  <!-- Admin Side Bar -->                  
                  <li class="menu-header">Data</li>
                  <li @if(url()->current()==route('userdata')) class="active" @endif><a class="nav-link" href="{{ route('userdata') }}"><i class="fas fa-user"></i> <span>Akun</span></a></li>
                  @elserole('admin_yys|admin_ra|admin_tka|admin_mts|admin_ma|admin_pst')
                  <!-- Home Side Bar -->
                  <li class="menu-header">Halaman Awal</li>
                  <li @if(url()->current()==route('banner')) class="active" @endif><a class="nav-link" href="{{ route('banner') }}"><i class="far fa-image"></i> <span>Banner</span></a></li>
                  <li @if(url()->current()==route('sambutan')) class="active" @endif><a class="nav-link" href="{{ route('sambutan') }}"><i class="fas fa-align-left"></i> <span>Sambutan</span></a></li>
                  <li @if(url()->current()==route('deskripsi-singkat')) class="active" @endif><a class="nav-link" href="{{ route('deskripsi-singkat') }}"><i class="fas fa-book-open"></i> <span>Deskripsi Singkat</span></a></li>
                  <li @if(url()->current()==route('brosur')) class="active" @endif><a class="nav-link" href="{{ route('brosur') }}"><i class="fas fa-file-invoice"></i> <span>Brosur</span></a></li>
    
                  <!-- Halaman Side Bar -->
                  <li class="menu-header">Halaman Lainnya</li>
                  <li @if(url()->current()==route('profile')) class="active" @endif><a class="nav-link" href="{{ route('profile') }}"><i class="far fa-address-card"></i> <span>Profile</span></a></li>
                  <li @if(url()->current()==route('galeri')) class="active" @endif><a class="nav-link" href="{{ route('galeri') }}"><i class="fas fa-images"></i> <span>Galeri</span></a></li>
                  <li @if(Str::contains(url()->current(), route('blog')) ) class="active" @endif><a class="nav-link" href="{{ route('blog') }}"><i class="fas fa-bookmark"></i> <span>Blog</span></a></li>
                  <li @if(url()->current()==route('kontak')) class="active" @endif><a class="nav-link" href="{{ route('kontak') }}"><i class="fas fa-phone"></i> <span>Kontak</span></a></li>
                  {{-- <li @if(url()->current()==route('credits')) class="active" @endif><a class="nav-link" href="{{ route('credits') }}"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li> --}}

                  <li class="menu-header">Lain-lain</li>
                  <li @if(url()->current()==route('filemanager')) class="active" @endif><a class="nav-link" href="{{ route('filemanager') }}"><i class="fas fa-folder-open"></i> <span>File</span></a></li>
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
      
  @yield('modalscontent')

   <!-- General JS Scripts -->
  <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
  {{-- <script src="{{ asset('assets/modules/popper.js') }}"></script> --}}
  <script src="{{ asset('assets/modules/popper.min.js') }}"></script>
  <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script> 

  @yield('scriptlib')

  
  <script src="{{ asset('assets/js/scripts.js') }}"></script>

  @yield('scriptpage')
  
  @yield('scriptline')
</body>
</html>
