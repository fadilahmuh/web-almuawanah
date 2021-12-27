@extends('pages.appuser')

@section('maincontent')
<section class="menu-wrap single-page-header d-flex">
    <div class="container half-banner-content">
      <div class="row align-items-center justify-content-center">
        <div
          class="col text-center align-middle align-self-center ftco-animate"
        >
          <h1>Kontak</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="both-margin">
    <div class="container">
      <div class="row no-gutters justify-content-center">
        @if(!$kontak->isEmpty())
        <div class="col-md-5 d-flex align-items-stretch p-0 card-kontak">
          <div class="info-wrap w-100 p-lg-5 p-4">
            <h3 class="mb-4 mt-md-4">Kontak Kami</h3>


            @foreach ($kontak as $k)
              
            @if ($k->judul == 'Whatsapp')
            <div class="dbox w-100 d-flex align-items-center align-middle @if($loop->last) mb-md-4 @endif">
              <div class="icon d-flex align-items-center justify-content-center">
              <span class="fab fa-whatsapp"></span>
              </div>
              <div class="text ps-3">
                <p>
                  <span>Whatsapp @if (!empty($k->desc1)) ({{$k->desc1}})@endif: </span> <a target="_blank" href="https://wa.me/{{ Str::replaceFirst('0', '62', $k->content)}}">{{$k->content}}</a>
                </p>
              </div>
            </div>
            @elseif ($k->judul == 'Telepon')
            <div class="dbox w-100 d-flex align-items-center align-middle @if($loop->last) mb-md-4 @endif">
              <div class="icon d-flex align-items-center justify-content-center">
              <span class="fas fa-phone"></span>
              </div>
              <div class="text ps-3">
                <p>
                  <span>Telepon @if (!empty($k->desc1)) ({{$k->desc1}})@endif: </span> <a href="tel://{{$k->content}}">{{$k->content}}</a>
                </p>
              </div>
            </div>
            @elseif ($k->judul == 'Email')
            <div class="dbox w-100 d-flex align-items-center align-middle @if($loop->last) mb-md-4 @endif">
              <div class="icon d-flex align-items-center justify-content-center">
              <span class="far fa-envelope"></span>
              </div>
              <div class="text ps-3">
                <p>
                  <span>Email @if (!empty($k->desc1)) ({{$k->desc1}})@endif: </span> <a href="mailto:{{$k->content}}">{{$k->content}}</a>
                </p>
              </div>
            </div>
            @elseif ($k->judul == 'Alamat')
            <div class="dbox w-100 d-flex align-items-center align-middle @if($loop->last) mb-md-4 @endif">
              <div class="icon d-flex align-items-center justify-content-center">
              <span class="fas fa-map-marker-alt"></span>
              </div>
              <div class="text ps-3">
                <p>
                  <span>Alamat @if (!empty($k->desc1)) ({{$k->desc1}})@endif: </span>{{$k->content}}
                </p>
              </div>
            </div>
            @endif

          @endforeach
          
          </div>
        </div>
        @endif
        <div class="col-md-7 bg-white p-0 card-kontak">
          <iframe 
            class="map-kontak"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.294215786248!2d107.51695321360415!3d-6.855295166858096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e30c82b8ecbb%3A0x2c62fe5f652e1dd!2sPondok%20Pesantren%20Al-Muawanah!5e0!3m2!1sen!2sid!4v1626763539026!5m2!1sen!2sid"
            allowfullscreen=""
            loading="lazy"
          ></iframe>
        </div>
      </div>
    </div>
  </section>
@endsection