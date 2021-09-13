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
        <form class="needs-validation">
        <div id="slick-form">
          <div class="form-page">
            <fieldset class="slick-fs form-page-1">
              <h2 class="fs-title">Data Calon Santri/Siswa</h2>
              <div class="form-group mb-3">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" required>
                <div class="invalid-feedback">
                  Nama tidak boleh kosong.
                </div>
              </div>
              <div class="form-group mb-3">
                <label>Jenis Kelamin</label>
                <select class="form-select" required>
                  <option selected disabled value="">-Pilih Satu-</option>
                  <option>Laki-laki</option>
                  <option>Perempuan</option>
                </select>
                <div class="invalid-feedback">
                  Pilih salah-satu pilihan.
                </div>
              </div>
              <div class="form-group mb-3">
                <label>Tempat Lahir</label>
                <input type="text" class="form-control" required>
                <div class="invalid-feedback">
                  Tidak boleh kosong.
                </div>
              </div>
              <div class="form-group mb-4">
                <label>Tanggal Lahir</label>
                <input type="date" class="form-control" required>
                <div class="invalid-feedback">
                  Tidak boleh kosong.
                </div>
              </div>
              <div class="mb-3 mb-2 text-center">                
                <button id="btnnext" type="button" class="cst-slick-next">Next</button>
                <button type="button" class="check cst-slick-next">check</button>
              </div>
            </fieldset>
          </div>
          <div class="form-page">
            <fieldset class="slick-fs">
              <h2 class="fs-title">Data Orang Tua</h2>
              <div class="mb-3">
                <label>Your Name</label>
                <input type="text" class="form-control" required="">
                <div class="invalid-feedback">
                  What's your name?
                </div>
              </div>
              <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" required="">
                <div class="invalid-feedback">
                  Oh no! Email is invalid.
                </div>
              </div>
              <div class="mb-3">
                <label>Subject</label>
                <input type="email" class="form-control">
                <div class="valid-feedback">
                  Good job!
                </div>
              </div>
              <div class="mb-3 mb-4">
                <label>Message</label>
                <textarea class="form-control" required=""></textarea>
                <div class="invalid-feedback">
                  What do you wanna say?
                </div>
              </div>
              <div class="mb-3 mb-2 text-center">                
                <button type="button" class="cst-slick-prev">Back</button>
                <button type="submit" class="btn cst-slick-next">Submit</button>
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
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
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
    // adaptiveHeight: true,
  });

  function nextpage() { 
    $('#slick-form').slick('slickNext');    
    pf = $(this).parent().parent().parent();
    np = pf.index('.form-page')+1;
    $("#progressbar li").eq(np).addClass("active");
  };

  $('#btnnext').click(function(event) {
    nextpage()
  });

  $('.cst-slick-prev').click(function(event) {
    $('#slick-form').slick('slickPrev');    
    pf = $(this).parent().parent().parent();
    np = pf.index('.form-page');
    $("#progressbar li").eq(np).removeClass("active");
  });

  var fs1 = $('.form-page-1');

  $('.check').click(function(event) {
  console.log(fs1);
  fs1.addClass('was-validated');
  fs1.validate();
  });

  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
  
</script>
@endsection