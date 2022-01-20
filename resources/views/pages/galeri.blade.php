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
          <div class="thumb" data-lazy="{{ asset('assets/modules/slick/ajax-loader.gif') }}" style="background-image: url({{asset('uploads/galeri/'.Str::replace(' ', '%20', $f->attachment))}})">
          </div>
          </a>
        </div>
      @endforeach
      
      </div>
    </div>
  </section>

  {{-- <section class="both-margin">
    <div class="heading_container pt-4">
      <h3>Video</h3>
    </div>
    <div class="container">
      <div id="yt_res" yt-id="{{$yt->content}}" data-item="{{$setting->content}}"></div>
    </div>
  </section> --}}

  <section class="both-margin">
    <div class="heading_container pt-4">
      <h3>Video</h3>
    </div>
    <div class="container">
      @if(!is_null($yt_single->content))
       <div class="row">
      <div class="col-sm-8">
        <div id="yt_single" yt-link="{{$yt_single->content}}"></div>
      </div>
      <div class="col-sm-4">
          <div id="yt_res" yt-id="{{$yt->content}}" data-item="{{$setting->content}}"></div>
      </div>
     </div>
     @else
     <div id="yt_res" yt-id="{{$yt->content}}" data-item="{{$setting->content}}"></div>
     @endif
    </div>
   
    
  </section>

@endsection

@section('scriptlib')
<script src="{{ asset('js/lightbox.js') }}"></script>
<script src="{{ asset('js/slick.js') }}"></script>
@if(!is_null($yt_single->content))
<script src="{{ asset('js/youtubeapi2.js') }}"></script>
@else
<script src="{{ asset('js/youtubeapi.js') }}"></script>
@endif
<script src="{{ asset('js/lity.js') }}"></script>
@endsection