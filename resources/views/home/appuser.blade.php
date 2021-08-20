<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Font Google Popins --}}
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet" />
    
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('userAssets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminAssets/modules/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminAssets/modules/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('userAssets/css/aos.css') }}">
    @yield('csslib')
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('userAssets/css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('userAssets/css/components.css') }}"> --}}

    <title>Yayasan Pondok Pesantren Al-Mua'wanah</title>
</head>
<body>
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
          <a href="{{ route('home') }}" class="logo me-auto"><img src="{{ asset('userAssets/images/yayasan.png') }}" alt="" class="img-fluid" /></a>
          <!-- <h1 class="logo me-auto"><a href="index.html">Arsha</a></h1> -->
          <!-- Uncomment below if you prefer to use an image logo -->
  
          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link" href="{{ route('userprofile') }}">Profil</a></li>            
              <li class="dropdown">
                <a href="">Pendidikan <i class="fas fa-chevron-down"></i></a>
                <ul>
                  <li><a href="#">TKA / TPA</a></li>
                  <li><a href="#">MTs</a></li>
                  <li><a href="#">MA</a></li>
                </ul>
              </li>
              {{-- <li><a class="nav-link" href="{{ route('pogram-pendidikan') }}">Program Pendidikan</a></li> --}}
              <!-- <li><a class="nav-link scrollto" href="">Pimpinan</a></li> -->
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
  
    @yield('maincontent')


    <footer id="footer" class="up-margin">
    <div class="container pt-4 d-md-flex">
        <div class="row align-items-center">
        <div class="col-md-4">
            <h3>
            Pondok Pesantren <br />
            Al-Mu'awanah
            </h3>
            <p>Jl. Sukamaju No.RT 001/01, Cilame, Kec. Ngamprah, Kabupaten Bandung Barat, Jawa Barat 40552</p>
        </div>
        <div class="col-md-4 text-center">
            <iframe
            class="map"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.294215786248!2d107.51695321360415!3d-6.855295166858096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e30c82b8ecbb%3A0x2c62fe5f652e1dd!2sPondok%20Pesantren%20Al-Muawanah!5e0!3m2!1sen!2sid!4v1626763539026!5m2!1sen!2sid"
            allowfullscreen=""
            loading="lazy"
            ></iframe>
        </div>
        <div class="col-md-4 cari kanan">
            <form action="" method="post"><input type="text" name="search" /><input type="submit" value="Search" /></form>
            <h3>Kontak Kami</h3>
            <div class="social-links">
            <a href=""><i class="fab fa-whatsapp"></i></a>
            <a href=""><i class="fas fa-phone"></i></a>
            <a href=""><i class="fas fa-envelope"></i></a>
            </div>
        </div>
        </div>
    </div>

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

    <script src="{{ asset('userAssets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('userAssets/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('userAssets/js/popper.min.js') }}"></script>
    <script src="{{ asset('userAssets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('userAssets/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('userAssets/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('userAssets/js/aos.js') }}"></script>
    {{-- <script src="{{ asset('userAssets/js/jquery.marquee.min.js') }}"></script> --}}
    <script src="{{ asset('userAssets/js/scrollax.min.js') }}"></script>
    
    @yield('scriptlib')
    
    
    <script src="{{ asset('userAssets/js/new-main.js') }}"></script>
</body>
</html>