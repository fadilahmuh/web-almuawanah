@extends('pages.appuser')

@section('csslib')
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
@endsection

@section('maincontent')
<section class="menu-wrap single-page-header d-flex bot-margin">
    <div class="container half-banner-content">
      <div class="row align-items-center justify-content-center">
        <div
          class="col text-center align-middle align-self-center ftco-animate"
        >
          <h1>Wakaf & Donasi</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="both-margin">
    <div class="container">
      <div class="row no-gutters justify-content-center">
        <div class="col-md-7 bg-white p-0 card-kontak">
          <div id="owl-donasi" class="owl-carousel">
            <div class="donasi-item" style="background-image: url(images/bg_1.jpg);">
              <div class="overlay d-flex align-items-center justify-content-center">
                <h3>Kekalkan Kebaikan Anda</h3>
                <p>#semuabisawakaf</p>
              </div>
            </div>
            <div class="donasi-item" style="background-image: url(images/bg_2.jpg);">
              <div class="overlay d-flex align-items-center justify-content-center">
                <h3>"Kamu sekali-kali tidak sampai kepada kebajikan (yang sempurna), sebelum kamu menafkahkan sehahagian harta yang kamu cintai. Dan apa saja yang kamu nafkahkan maka sesungguhnya Allah mengetahuinya".</h3>
                <p>-QS. Ali Imran ayat 92-</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5 d-flex align-items-stretch p-0 card-kontak">
          <div class="info-wrap w-100 p-lg-5 p-4">
            <h3 class="mb-4 mt-md-4 text-center">Mari Berwakaf</h3>
            <form id="form-wakaf" action="" class="donasi">
              <div class="d-flex align-items-start donasi-fl">
                <div class="d-flex align-items-center justify-content-center icon">
                  <span class="far fa-user"></span>
                </div>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nama Anda">
              </div>
              <div class="d-flex align-items-start donasi-fl">
                <div class="d-flex align-items-center justify-content-center icon">
                  <span class="fas fa-phone"></span>
                </div>
                <input type="phone" class="form-control" name="phone" id="phone" placeholder="Nomor HP">
              </div>
              <div class="d-flex align-items-start donasi-fl">
                <div class="d-flex align-items-center justify-content-center icon">
                  <span class="far fa-envelope"></span>
                </div>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
              </div>
              <div class="d-flex align-items-start donasi-fl">
                <div class="d-flex align-items-center justify-content-center icon">
                  <span class="fas fa-money-bill"></span>
                </div>
                <input type="number" class="form-control" name="nominal" id="nominal" placeholder="Nominal">
              </div>
              <div class="col-12 text-end">                  
                <input type="submit" value="Submit" data-url="{{ route('wakaf_bayar') }}" class="bayar btn mt-4 dns-submit">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section("scriptlib")
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{env('MIDTRANS_CLIENT_KEY')}}"></script>
@endsection

@section('scriptpage')
  <script src="{{ asset('assets/js/views/donasi.js') }}"></script>
@endsection