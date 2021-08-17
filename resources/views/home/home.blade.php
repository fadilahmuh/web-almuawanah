@extends('home.appuser')

@section('maincontent')
<section class="menu-wrap flex-md-column-reverse d-md-flex">
    <div class="hero-wrap js-fullheight">
      <div class="home-slider js-fullheight owl-carousel">
        
        @foreach ($banners as $banner )          
        <div class="slider-item js-fullheight" style="background-image: url({{asset('uploads/component/'. $banner->attachment)}})">
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

  
@endsection