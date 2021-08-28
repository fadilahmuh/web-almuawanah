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
    <div class="container-lg">
      <div class="row justify-content-center">
         <div class="col-lg-9 col-12">
           <div class="card blog">
             <div class="card-body py-5">
               <div class="blog-thumb">
                 <img src="{{asset('uploads/posts/'.Str::replace(' ', '%20', $data->thumbnail))}}" alt="">
                </div>
                <h1 class="mb-2 text-center">{{$data->judul}}</h1>
                <p class="mb-4 text-center text-muted">{{Carbon::parse($data->created_at)->isoFormat('LL')}}</p>
                <div style="word-wrap: break-word;">
                  {!! $data->content !!}         
                </div>
              </div>
            </div>
          </div>  
          </div>
            <div class="divider div-transparent div-dot"></div>
          </div> 
          <div class="container-lg">
            <div class="row justify-content-center">
            <h2 class="section-title offset-lg-3">Cari</h2>
            <div class="col-lg-9 col-12 p-0">
              <div class="sidebar-box mb-3 p-3">
                <form action="{{ route('posts_search') }}" class="search-form">
                  <div class="form-group">
                    <span class="fa fa-search"></span>                  
                      <input type="text" name="s" class="form-control" placeholder="Cari Postingan">
                  </div>
                </form>
              </div>
            </div>
            <h2 class="section-title offset-lg-3">Tags</h2>
            <div class="col-lg-9 col-12 p-0">
              <div class="card-body tagcloud">
                @foreach ($tags as $t)
                <a href="{{ route('posts_tag', [$t->nama]) }}" class="tag-cloud-link">{{$t->nama}}</a>                  
                @endforeach
              </div>
            </div>
            <h2 class="section-title offset-lg-3">Paling Banyak Dilihat</h2>

            @foreach ($posts as $key => $post)
            <div class="col-lg-3 col-md-6  col-sm-6 col-12 mb-4"  data-aos="zoom-in" data-aos-delay="{{++$key * 200}}">
              <div class="post-entry-1 h-100">
                <a href="{{ route('blog_post', [$post->slug]) }}">
                  <div class="card-blog-thumb" style="background-image: url({{asset('uploads/posts/'.Str::replace(' ', '%20', $post->thumbnail))}})"></div>            
                </a>
                <div class="post-entry-1-contents">            
                  <h2><a href="{{ route('blog_post', [$post->slug]) }}">{{$post->judul}}</a></h2>
                  <span class="meta d-inline-block"><i class="far fa-calendar"></i> {{ Carbon::parse($post->created_at)->isoFormat('LL') }}</span><br>
                  <span class="meta d-inline-block mb-3">@isset($post->tag)<i class="fas fa-tags"></i> @endisset  @foreach($post->tag as $t)<a href="{{ route('posts_tag', [$t]) }}" class="badge rounded-pill bg-light text-dark">{{ $t }}</a>@endforeach</span><br>
                  {{-- <p> 
                    {{  Str::limit(strip_tags(html_entity_decode($post->content, ENT_QUOTES, 'UTF-8')), 50, ' (...)') }} 
                  </p> --}}
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