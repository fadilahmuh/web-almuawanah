@extends('home.appuser')

@section('csslib')
<link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote.min.css') }}">
@endsection
@section('maincontent')

<section class="menu-wrap single-page-header d-flex bot-margin">
    <div class="container half-banner-content">
      <div class="row align-items-center justify-content-center">
        <div class="col text-center align-middle align-self-center ftco-animate" >
          <h1 data-aos="fade-up">Profil</h1>
        </div>
      </div>
    </div>
</section>

  <section class="both-margin">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row tabulation mt-4 ftco-animate">
            <div class="col-md-4"  data-aos="fade-up" data-aos-anchor-placement="top-center">
              <ul class="nav nav-pills nav-fill d-md-flex d-block flex-column">
                <li class="nav-item text-start">
                  <a class="nav-link active py-4" data-toggle="tab" href="#tentang"><i class="fas fa-book-reader"></i></span> Tentang Kami</a>
                </li>
                <li class="nav-item text-start">
                  <a class="nav-link py-4" data-toggle="tab" href="#visi"><i class="fas fa-eye"></i> Visi</a>
                </li>
                <li class="nav-item text-start">
                  <a class="nav-link py-4" data-toggle="tab" href="#misi"><i class="fas fa-check-circle"></i> Misi</a>
                </li>
              </ul>
            </div>
            <div class="col-md-8 pl-md-4" data-aos="fade-right" data-aos-anchor-placement="top-center">
              <div class="tab-content">
                <div class="tab-pane container p-0 active" id="tentang">
                  <h3 class="text-center"><a href="#">Tentang Kami</a></h3>
                  <p>
                    {!! $tentang->content!!}
                  </p>
                </div>
                <div class="tab-pane container p-0 fade" id="visi">
                  <h3 class="text-center"><a href="#">Visi</a></h3>
                  <p>
                    {!!$visi->content!!}
                  </p>                                    
                </div>
                <div class="tab-pane container p-0 fade" id="misi">
                  <h3 class="text-center"><a href="#">Misi</a></h3>
                  <p>
                    {!! $misi->content!!}
                  </p>                    
                </div>
              </div>
            </div>
          </div>
        </div>          
      </div>
    </div>
  </section>

  <section class="both-margin">
    <div class="heading_container pt-4">
      <h3>Profil Pendidikan</h3>
    </div>
    <div id="portfolio" class="our-portfolio section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="owl-carousel owl-portfolio">

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection


@section("scriptlib")
<script src="{{ asset('userAssets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('userAssets/js/lightbox.js') }}"></script>
@endsection