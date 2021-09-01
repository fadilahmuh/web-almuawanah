<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Font Google Popins --}}
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet" />
    
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    @yield('csslib')
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>@yield('title') - Yayasan Pondok Pesantren Al-Mu'awanah</title>
</head>
<body>
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
          <a href="{{ route('home') }}" class="logo me-auto"><img src="{{ asset('images/yayasan.png') }}" alt="" class="img-fluid" /></a>
          <!-- <h1 class="logo me-auto"><a href="index.html">Arsha</a></h1> -->
  
          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link" href="{{ route('userprofile') }}">Profil</a></li>            
              <li class="dropdown">
                <a href="">Pendidikan <i class="fas fa-chevron-down"></i></a>
                <ul>
                  <li><a href="#">Raudatul Athfal</a></li>
                  <li><a href="#">TPA / TKA</a></li>
                  <li><a href="#">Madrasah Tsanawiyah</a></li>
                  <li><a href="#">Madrasah Aliyah</a></li>
                  <li><a href="#">Pondok Pesantren</a></li>
                </ul>
              </li>
              <li><a class="nav-link " href="{{ route('usergaleri') }}">Galeri</a></li>
              <li><a class="nav-link " href="{{ route('userblog') }}">Blog</a></li>
              <li><a class="nav-link " href="{{ route('userkontak') }}">Kontak</a></li>
              <li><a class="nav-link " href="{{ route('wakaf') }}">Wakaf</a></li>
              <li><a class="getstarted" href="{{ route('pendaftaran') }}">Pendaftaran</a></li>
            </ul>
            <i class="fas fa-bars mobile-nav-toggle"></i>
          </nav>
          <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->
  
    <section class="menu-wrap single-page-header d-flex error-section">
      <div class="container half-banner-content">
        <div class="row align-items-center justify-content-center">
          <div class="col text-center align-middle align-self-center ftco-animate">
            <h1 style="font-size: calc(9rem + 1.5vw);">@yield('code')</h1>
            <h3>@yield('message')</h3>
            <p class="pt-4">              
              <a href="{{ route('home') }}" class="btn-gold">Kembali ke Home</a>
            </p>
          </div>
        </div>
      </div>
    </section>


    <footer id="footer" class="">
    <div class="container footer-bottom clearfix">
        <div class="copyright">&copy; Copyright 2021, Informatika Itenas '18</div>
    </div>
    </footer>
    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#2EB873" />
    </svg>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
    {{-- <script src="{{ asset('js/popper.min.js') }}"></script> --}}
    <script src="{{ asset('assets/modules/popper.min.js') }}"></script>
    {{-- <script src="{{ asset('js/bootstrap.js') }}"></script> --}}
    <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    {{-- <script src="{{ asset('js/jquery.marquee.min.js') }}"></script> --}}
    <script src="{{ asset('js/scrollax.min.js') }}"></script>
    
    @yield('scriptlib')

    @yield('scriptpage')    
    
    <script src="{{ asset('js/new-main.js') }}"></script>
</body>
</html>