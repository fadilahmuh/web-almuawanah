@extends('pages.appuser')    

@section('maincontent')
<section class="menu-wrap single-page-header d-flex bot-margin">
    <div class="container half-banner-content">
      <div class="row align-items-center justify-content-center">
        <div class="col text-center align-middle align-self-center ftco-animate">
          <h1>Postingan</h1>
        </div>
      </div>
    </div>
  </section>
  
  <section class="both-margin">
    <div class="container">
      <div class="row">
         <div class="col-lg-8">
           <div class="blog-thumb">
             <img src="{{asset('uploads/posts/'.Str::replace(' ', '%20', $data->thumbnail))}}" alt="">
           </div>
           <h3 class="mb-4">{{$data->judul}}</h3>
           <div style="word-wrap: break-word;">
             {!! $data->content !!}         
           </div>
         </div>
         <div class="col-lg-4">
          <div class="sidebar-box mt-4">
            <form action="#" class="search-form">
              <div class="form-group">
                <span class="fa fa-search"></span>
                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
              </div>
            </form>
          </div>
          <div class="sidebar-box most-view">
            <h3>Paling Banyak Dilihat</h3>

            @foreach ($posts as $p)
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url({{asset('uploads/posts/'.Str::replace(' ', '%20', $p->thumbnail))}});"></a>
              <div class="text">
                <h3 class="heading"><a href="{{ route('blog_post', [$p->slug]) }}">{{$p->judul}}</a></h3>
                <div class="meta">
                  <div><span class="icon-calendar"></span>{{ __($p->created_at->isoFormat('D MMM, Y')) }}</div>
                  {{-- <div><a href="#"><span class="icon-chat"></span> 19</a></div> --}}
                </div>
              </div>
            </div>              
            @endforeach

          </div>
         </div>
      </div>
    </div>
  </section> 
@endsection