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
             <div class="card-body">
               <div class="blog-thumb">
                 <img src="{{asset('uploads/posts/'.Str::replace(' ', '%20', $data->thumbnail))}}" alt="">
                </div>
                <h1 class="mb-4 text-center">{{$data->judul}}</h1>
                <p class="text-center text-muted">{{Carbon::setLocale('fr')->now()->format('l j F Y H:i:s');}}</p>
                <div style="word-wrap: break-word;">
                  {!! $data->content !!}         
                </div>
              </div>
            </div>
          </div>        
      </div>
    </div>
  </section> 
@endsection