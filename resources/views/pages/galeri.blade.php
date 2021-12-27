@extends('pages.appuser')   

@section('csslib')
<link rel="stylesheet" href="{{ asset('css/slick.css') }}" />
<link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}" />
<link rel="stylesheet" href="{{ asset('css/lity.css') }}" />
<link rel="stylesheet" href="{{ asset('css/lightbox.css') }}" />
@endsection

@section('maincontent')
<section class="menu-wrap single-page-header d-flex bot-margin">
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

  <section class="both-margin">
    <div class="heading_container pt-4">
      <h3>Foto</h3>
    </div>

    <div class="container">
      <div class="" id="slick-gallery">

        @foreach ($foto as $f)          
        <div class="slide-item">
          <a href="{{asset('uploads/galeri/'.Str::replace(' ', '%20', $f->attachment))}}"  data-lightbox="Brosur"  data-title="{{$f->judul}}@if(!is_null($f->caption)) | {{$f->caption}} @endif">
          <div class="thumb" style="background-image: url({{asset('uploads/galeri/'.Str::replace(' ', '%20', $f->attachment))}})">
          </div>
          </a>
        </div>
      @endforeach
      
      </div>
    </div>
  </section>

  <section class="both-margin">
    <div class="heading_container pt-4">
      <h3>Video</h3>
    </div>
    <div class="container">
      <div id="yt_res" yt-id="{{$yt->content}}"></div>
    </div>
  </section>


@endsection

@section('scriptlib')
<script src="{{ asset('js/lightbox.js') }}"></script>
<script src="{{ asset('js/slick.js') }}"></script>
<script src="{{ asset('js/youtubeapi.js') }}"></script>
<script src="{{ asset('js/lity.js') }}"></script>
@endsection