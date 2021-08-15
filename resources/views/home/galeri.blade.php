@extends('home.appuser')   

@section('csslib')
<link rel="stylesheet" href="{{ asset('userAssets/css/slick.css') }}" />
<link rel="stylesheet" href="{{ asset('userAssets/css/slick-theme.css') }}" />
<link rel="stylesheet" href="{{ asset('userAssets/css/lity.css') }}" />

@endsection

@section('maincontent')
<section class="menu-wrap single-page-header d-flex">
    <div class="container half-banner-content">
      <div class="row align-items-center justify-content-center">
        <div
          class="col text-center align-middle align-self-center ftco-animate"
        >
          <h1>Galeri</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-no-pb">
    <div class="heading_container pt-4">
      <h3>Foto</h3>
    </div>
    <div class="container">
      <div class="" id="slick-gallery">
        <div class="slide-item">
          <div class="thumb">
            <a
              href="https://via.placeholder.com/1600x900"
              data-lightbox="Brosur"
            >
              <img src="https://via.placeholder.com/1600x900" alt="" />
            </a>
          </div>
        </div>
        <div class="slide-item">
          <div class="thumb">
            <a
              href="https://via.placeholder.com/1600x900"
              data-lightbox="Brosur"
            >
              <img src="https://via.placeholder.com/1600x900" alt="" />
            </a>
          </div>
        </div>
        <div class="slide-item">
          <div class="thumb">
            <a
              href="https://via.placeholder.com/1600x900"
              data-lightbox="Brosur"
            >
              <img src="https://via.placeholder.com/1600x900" alt="" />
            </a>
          </div>
        </div>
        <div class="slide-item">
          <div class="thumb">
            <a
              href="https://via.placeholder.com/1600x900"
              data-lightbox="Brosur"
            >
              <img src="https://via.placeholder.com/1600x900" alt="" />
            </a>
          </div>
        </div>
        <div class="slide-item">
          <div class="thumb">
            <a
              href="https://via.placeholder.com/1600x900"
              data-lightbox="Brosur"
            >
              <img src="https://via.placeholder.com/1600x900" alt="" />
            </a>
          </div>
        </div>
        <div class="slide-item">
          <div class="thumb">
            <a
              href="https://via.placeholder.com/1600x900"
              data-lightbox="Brosur"
            >
              <img src="https://via.placeholder.com/1600x900" alt="" />
            </a>
          </div>
        </div>
        <div class="slide-item">
          <div class="thumb">
            <a
              href="https://via.placeholder.com/1600x900"
              data-lightbox="Brosur"
            >
              <img src="https://via.placeholder.com/1600x900" alt="" />
            </a>
          </div>
        </div>
        <div class="slide-item">
          <div class="thumb">
            <a
              href="https://via.placeholder.com/1600x900"
              data-lightbox="Brosur"
            >
              <img src="https://via.placeholder.com/1600x900" alt="" />
            </a>
          </div>
        </div>
        <div class="slide-item">
          <div class="thumb">
            <a
              href="https://via.placeholder.com/1600x900"
              data-lightbox="Brosur"
            >
              <img src="https://via.placeholder.com/1600x900" alt="" />
            </a>
          </div>
        </div>
        <div class="slide-item">
          <div class="thumb">
            <a
              href="https://via.placeholder.com/1600x900"
              data-lightbox="Brosur"
            >
              <img src="https://via.placeholder.com/1600x900" alt="" />
            </a>
          </div>
        </div>
        <div class="slide-item">
          <div class="thumb">
            <a
              href="https://via.placeholder.com/1600x900"
              data-lightbox="Brosur"
            >
              <img src="https://via.placeholder.com/1600x900" alt="" />
            </a>
          </div>
        </div>
        <div class="slide-item">
          <div class="thumb">
            <a
              href="https://via.placeholder.com/1600x900"
              data-lightbox="Brosur"
            >
              <img src="https://via.placeholder.com/1600x900" alt="" />
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="heading_container pt-4">
      <h3>Video</h3>
    </div>
    <div class="container">
      <div id="yt_res" yt-id="UCGQEQkPD1bXyaws9l9ooaww"></div>
    </div>
  </section>
@endsection

@section('scriptlib')
<script src="{{ asset('userAssets/js/youtubeapi.js') }}"></script>
<script src="{{ asset('userAssets/js/lity.js') }}"></script>
@endsection