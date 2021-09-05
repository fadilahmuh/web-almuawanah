@extends('pages.appuser')

@section('csslib')
<link rel="stylesheet" href="{{ asset('css/slick.css') }}" />
<link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}" />
@endsection

@section('maincontent')
<section class="menu-wrap single-page-header d-flex">
    <div class="container half-banner-content">
      <div class="row align-items-center justify-content-center">
        <div class="col text-center align-middle align-self-center ftco-animate">
          <h1>Pendaftaran</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="both-margin">
    <div class="heading_container" data-aos="fade-right">
      <h3>Formulir Pendaftaran</h3>          
    </div>
    <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-8 col-12">
        <ul class="d-flex justify-content-center" id="progressbar" data-aos="fade-up">
          <li class="active">Data Calon Siswa</li>
          <li>Data Orang Tua</li>
        </ul>
        <form>
        <div id="slick-form">
          <div class="form-page">
            <fieldset class="slick-fs">
              <h2 class="fs-title">Data Calon Santri/Siswa</h2>
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" required="">
                <div class="invalid-feedback">
                  What's your name?
                </div>
              </div>
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-select" id="validationCustom04" required>
                  <option selected disabled>-Pilih Satu-</option>
                  <option>Laki-laki</option>
                  <option>Perempuan</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid state.
                </div>
              </div>
              <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" class="form-control">
                <div class="valid-feedback">
                  Good job!
                </div>
              </div>
              <div class="form-group mb-4">
                <label>Tanggal Lahir</label>
                <input type="date" class="form-control">
                <div class="invalid-feedback">
                  What do you wanna say?
                </div>
              </div>
              <div class="form-group mb-2 text-center">                
                <button type="button" class="cst-slick-next">Next</button>
              </div>
            </fieldset>
          </div>
          <div class="form-page">
            <fieldset class="slick-fs">
              <h2 class="fs-title">Data Orang Tua</h2>
              <div class="form-group">
                <label>Your Name</label>
                <input type="text" class="form-control" required="">
                <div class="invalid-feedback">
                  What's your name?
                </div>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" required="">
                <div class="invalid-feedback">
                  Oh no! Email is invalid.
                </div>
              </div>
              <div class="form-group">
                <label>Subject</label>
                <input type="email" class="form-control">
                <div class="valid-feedback">
                  Good job!
                </div>
              </div>
              <div class="form-group mb-4">
                <label>Message</label>
                <textarea class="form-control" required=""></textarea>
                <div class="invalid-feedback">
                  What do you wanna say?
                </div>
              </div>
              <div class="form-group mb-2 text-center">                
                <button type="button" class="cst-slick-prev">Back</button>
                <button type="button" class="cst-slick-next">Submit</button>
              </div>
            </fieldset>
          </div>          
        </div>
      </form>
      </div>
    </div>
    </div>
</section>

@endsection

@section('scriptlib')
<script src="{{ asset('js/slick.js') }}"></script>
@endsection

@section('scriptpage')
<script src="{{ asset('js/pendaftaran.js') }}"></script>
<script>
  $("#slick-form").slick({
    arrows: false,
    infinite: false,
    speed: 500,
    // fade: true,
    cssEase: 'ease-in-out',
    slidesToShow: 1,  
    touchMove: false,
    swipe: false,
    adaptiveHeight: true,
  });

  $('.cst-slick-next').click(function(event) {
    $('#slick-form').slick('slickNext');    
    pf = $(this).parent().parent().parent();
    np = pf.index('.form-page')+1;
    $("#progressbar li").eq(np).addClass("active");
  });

  $('.cst-slick-prev').click(function(event) {
    $('#slick-form').slick('slickPrev');    
    pf = $(this).parent().parent().parent();
    np = pf.index('.form-page');
    $("#progressbar li").eq(np).removeClass("active");
  });
</script>
@endsection