@extends('pages.appuser')    

@section('maincontent')
<section class="menu-wrap single-page-header d-flex">
  <div class="container half-banner-content">
    <div class="row align-items-center justify-content-center">
      <div class="col text-center align-middle align-self-center ftco-animate">
        <h1>Tag: {{$tag}}</h1>
      </div>
    </div>
  </div>
</section>


@isset($posts)
<section class="both-margin">
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-12 mb-5 mb-lg-0">
          <div class="blog_left_sidebar">

            @foreach ($posts as $post)
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
          {{$posts->links()}}
        </div>
        <div class="col-lg-4">
          <div class="col-12 p-0">
            <div class="sidebar-box mb-3 p-3">
              <form action="{{ route('posts_search') }}" class="search-form">
                <div class="form-group">
                  <span class="fa fa-search"></span>                  
                    <input type="text" name="s" class="form-control" placeholder="Cari Postingan">
                </div>
              </form>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h3 class="section-title mt-0">Tags</h3>
            <div class="col-lg-9 col-12 p-0">
              <div class="card-body tagcloud">
                @foreach ($tags as $t)
                <a href="{{ route('posts_tag', [$t->nama]) }}" class="tag-cloud-link">{{$t->nama}}</a>                  
                @endforeach
              </div>
            </div>
            <h3 class="section-title mt-0">Paling Banyak Dilihat</h3>

            @foreach ($most as $key => $m)
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url({{asset('uploads/posts/'.Str::replace(' ', '%20', $m->thumbnail))}});"></a>
              <div class="text">
                <h3 class="heading"><a href="{{ route('blog_post', [$m->slug]) }}">{{$m->judul}}</a></h3>
                <div class="meta">
                  <div><span class="icon-calendar"></span>{{ Carbon::parse($m->created_at)->isoFormat('LL') }}</div>
                </div>
              </div>
            </div>            
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endisset


@endsection