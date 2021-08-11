<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="adminAssets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="adminAssets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="adminAssets/modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="adminAssets/css/style.css">
  <link rel="stylesheet" href="adminAssets/css/components.css">
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
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <!-- <div class="login-brand">
              <img src="adminAssets/img/logo.png" alt="logo" width="100" class="">
            </div> -->

            <div class="card card-primary">
              <div class="card-header"><h4>Regitrasi</h4></div>

              <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                @csrf
                 <div class="form-group">
                    <label for="name">Nama</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" tabindex="1" required autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" tabindex="1" required autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password" tabindex="2" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="password-confirm" class="control-label">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" tabindex="2" required autocomplete="new-password">                   
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>           
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="adminAssets/modules/jquery.min.js"></script>
  <script src="adminAssets/modules/popper.js"></script>
  <script src="adminAssets/modules/tooltip.js"></script>
  <script src="adminAssets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="adminAssets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="adminAssets/modules/moment.min.js"></script>
  <script src="adminAssets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="adminAssets/js/scripts.js"></script>
  <script src="adminAssets/js/custom.js"></script>
</body>
</html>