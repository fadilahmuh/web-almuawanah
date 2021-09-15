<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Al-Mu'awanah</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-4">
            <div class="login-brand">
              {{-- <img src="assets/img/logo.png" alt="logo" width="100" class=""> --}}
            </div>
            <div class="card card-primary">
              <div class="card-header"><h4>Pilih Halaman Admin</h4></div>
              <div class="card-body">
                @hasrole('admin_yys')
                <a href="http://mts.almuawanah.test/admin">
                  <div class="card card-secondary">
                    <div class="card-header">
                      <img src="{{ asset('assets/img/logo.png') }}" alt="logo" width="50" class="mr-4">
                      <div class="card-header-action">
                        <h4 class="text-decoration-none">Yayasan</h4>
                      </div>
                    </div>                  
                  </div>
                 </a>
                @endhasrole
                @hasrole('admin_ra')
                <a href="">
                  <div class="card card-secondary">
                    <div class="card-header">
                      <img src="{{ asset('assets/img/logo.png') }}" alt="logo" width="50" class="mr-4">
                      <div class="card-header-action">
                        <h4 class="text-decoration-none">RA</h4>
                      </div>
                    </div>                  
                  </div>
                 </a>
                @endhasrole
                @hasrole('admin_tka')
                <a href="">
                  <div class="card card-secondary">
                    <div class="card-header">
                      <img src="{{ asset('assets/img/logo.png') }}" alt="logo" width="50" class="mr-4">
                      <div class="card-header-action">
                        <h4 class="text-decoration-none">TKA</h4>
                      </div>
                    </div>                  
                  </div>
                 </a>
                @endhasrole
                @hasrole('admin_mts')
                <a href="">
                  <div class="card card-secondary">
                    <div class="card-header">
                      <img src="{{ asset('assets/img/logo.png') }}" alt="logo" width="50" class="mr-4">
                      <div class="card-header-action">
                        <h4 class="text-decoration-none">MTS</h4>
                      </div>
                    </div>                  
                  </div>
                 </a>
                @endhasrole
                @hasrole('admin_ma')
                <a href="">
                  <div class="card card-secondary">
                    <div class="card-header">
                      <img src="{{ asset('assets/img/logo.png') }}" alt="logo" width="50" class="mr-4">
                      <div class="card-header-action">
                        <h4 class="text-decoration-none">MA</h4>
                      </div>
                    </div>                  
                  </div>
                 </a>
                @endhasrole
                @hasrole('admin_pst')
                <a href="">
                  <div class="card card-secondary">
                    <div class="card-header">
                      <img src="{{ asset('assets/img/logo.png') }}" alt="logo" width="50" class="mr-4">
                      <div class="card-header-action">
                        <h4 class="text-decoration-none">Pesantren</h4>
                      </div>
                    </div>                  
                  </div>
                 </a>
                @endhasrole
              </div>
            </div>            
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>