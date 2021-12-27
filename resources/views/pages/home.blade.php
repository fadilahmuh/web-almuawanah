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
           
      @if(!$banners->isEmpty())
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
      @else
      <div class="slider-item js-fullheight" style="background-image: url('images/bg_1.jpg')">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-10 text-center ftco-animate">
              <div class="text w-100">
                <h2>Yayasan Pondok Pesantren</h2>
                <h1 class="mb-4">Al-Mu'awanah</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif

    </div>
  </div>
</section>

<?php $isi = strip_tags($sambutan->content); ?>
@if(!is_null($isi))
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
@endif

<?php $desk = strip_tags($deskripsi->content); ?>
@if(!is_null($desk))
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
@endif


@if(!$brosur->isEmpty())
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
                  <div class="img-fill" style="background-image: url('{{asset('uploads/component/'.Str::replace(' ', '%20', $br->attachment))}}')">
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
@endif

@isset($posts)
<section class="both-margin">
  <div class="section">
    <div class="container">
      <div class="heading_container"  data-aos="fade-right">
        <h3>Postingan</h3>          
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-12 mb-5 mb-lg-0">
          <div class="blog_left_sidebar">

            @foreach ($posts as $key => $post)
            <article class="blog_item" data-aos="fade-up">
              <div class="blog_item_img">
                  <img class="card-img rounded-0" src="{{asset('uploads/posts/'.Str::replace(' ', '%20', $post->thumbnail))}}" alt="">
                  <div class="blog_item_date">
                      <h3>{{ Carbon::parse($post->created_at)->isoFormat('D') }}</h3>
                      <p>{{Str::limit(Carbon::parse($post->created_at)->monthName, 3,'')}}</p>
                  </div>
              </div>

              <div class="blog_details">
                  <a class="d-inline-block" href="{{ route('blog_post', [$post->slug]) }}">
                      <h2>{{$post->judul}}</h2>
                  </a>              
                  <ul class="blog-info-link">
                      <li>@isset($post->tag)<i class="fas fa-tags"></i> @endisset  @foreach($post->tag as $t)<a href="{{ route('posts_tag', [$t]) }}" class="badge rounded-pill bg-light text-dark">{{ $t }}</a>@endforeach</li>
                  </ul>
              </div>
            </article>
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endisset

@endsection

@section("scriptlib")
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/lightbox.js') }}"></script>
@endsection