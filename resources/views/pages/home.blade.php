@extends('pages.appuser')

@section('csslib')
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">
@endsection

@section('maincontent')

<section class="menu-wrap flex-md-column-reverse d-md-flex bot-margin">
  <div class="hero-wrap js-fullheight">
    <div class="home-slider js-fullheight owl-carousel">
        
      @foreach ($banners as $banner )          
      <div class="slider-item js-fullheight" style="background-image: url({{asset('uploads/component/'.Str::replace(' ', '%20', $banner->attachment))}})">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-10 text-center ftco-animate">
              <div class="text w-100">
                <h2>{{$banner->judul}}</h2>
                <h1 class="mb-4">{{$banner->content}}</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</section>

@isset($sambutan->content)
<section class="both-margin">
  <div class="container" data-aos="fade-up">
    <div class="heading_container">
      <h3>Sambutan</h3>
      <!-- <p>It is a long established fact that a reader</p>				 -->
    </div>

    <div class="row sambutan d-flex align-items-center">
      <div class="col-md-6 align-items-center text-center" data-aos="fade-right" data-aos-delay="100">
        <div class="img_container p-l-3 p-r-3 mb-2">
          <img class="img-fluid" src="{{asset('uploads/component/'.Str::replace(' ', '%20', $sambutan->attachment))}}" alt="" style="max-width: 70%"/>
        </div>
        <h3 class="text-center">{{$sambutan->desc1}}</h3>
        <p>{{$sambutan->desc2}}</p>
      </div>

      <div class="col-md-6 align-items-center align-middle" data-aos="fade-left" data-aos-delay="100">
        <div class="kata-sambutan">
          <h2>{{$sambutan->judul}}</h2>
          <p>{!! $sambutan->content !!}</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endisset

@isset($deskripsi)
<div class="heading_container end-margin" data-aos="fade-up">
  <h3>Pondok Pesantren Al-Mua'wanah</h3>
  <!-- <p>It is a long established fact that a reader</p>				 -->
</div>

<section class="cta tentang start-margin" data-aos="fade-right" style=" background: linear-gradient(rgba(21, 209, 112, 0.8), rgba(21, 209, 112, 0.9)),
url('{{asset('uploads/component/'.Str::replace(' ', '%20', $deskripsi->attachment))}}') fixed center center;">
  <div class="container" data-aos="zoom-in" data-aos-delay="100">
    <div class="row">
      <div class="col-lg-9 text-center text-lg-start">
        {!! $deskripsi->content !!}
      </div>
      <div class="col-lg-3 cta-btn-container text-center">
        <a class="cta-btn align-middle" href="{{ route('userprofile') }}">Tentang Kami</a>
      </div>
    </div>
  </div>
</section>
@endisset

@isset($brosur)
<section class="both-margin" >
  <div class="heading_container pt-4"  data-aos="fade-up">
    <h3>Brosur</h3>
  </div>
  <div id="portfolio" class="our-portfolio section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-portfolio">
            
            @foreach ($brosur as $br)              
            <div class="item" data-aos="zoom-in">
              <div class="thumb">
                <a href="{{asset('uploads/component/'.Str::replace(' ', '%20', $br->attachment))}}" data-lightbox="Brosur">
                  <div class="img-fill" style="background-image: url({{asset('uploads/component/'.Str::replace(' ', '%20', $br->attachment))}})">
                    <div class="overlay"></div>
                  </div>
                </a>
                <div class="hover-effect">
                  <div class="inner-content">
                    <h4>{{$br->judul}}</h4>
                    <span>{{$br->content}}</span>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>
</section>  
@endisset

@isset($posts)
<section class="both-margin">
  <div class="container">
    <div class="heading_container"  data-aos="fade-right">
      <h3>Postingan</h3>          
    </div>
    <div class="row">

      @foreach ($posts as $post)
      {{-- {{$post->content}} 
      <br>
      {!!$post->content!!} 
      <br>
      {{html_entity_decode($post->content, ENT_NOQUOTES, 'UTF-8') }} 
      <br>
      {{strip_tags(html_entity_decode($post->content, ENT_NOQUOTES, 'UTF-8')) }} 
      <br>
      {{ Str::limit(strip_tags(html_entity_decode($post->content, ENT_NOQUOTES, 'UTF-8')), 50, ' (...)') }}  --}}
      <div class="col-lg-4 col-md-6 mb-4"  data-aos="zoom-in">
        <div class="post-entry-1 h-100">
          <a href="single.html">
            <div class="card-blog-thumb" style="background-image: url({{asset('uploads/posts/'.Str::replace(' ', '%20', $post->thumbnail))}})"></div>            
          </a>
          <div class="post-entry-1-contents">            
            <h2><a href="single.html">{{$post->judul}}</a></h2>
            <span class="meta d-inline-block">{{ __($post->created_at->isoFormat('D MMM, Y')) }}</span><br>
            <span class="meta d-inline-block mb-3">@foreach($post->tag as $t)<a href="" >{{ $t }}</a> @endforeach</span>
            <p> 
              {{  Str::limit(strip_tags(html_entity_decode($post->content, ENT_QUOTES, 'UTF-8')), 50, ' (...)') }} 
            </p>
          </div>
        </div>
      </div>       
      @endforeach

    </div>      
  </div>
</section>
@endisset

@endsection

@section("scriptlib")
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/lightbox.js') }}"></script>
@endsection