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

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row no-gutters justify-content-center">
        <div class="col-md-5 d-flex align-items-stretch p-0 card-kontak">
          <div class="info-wrap w-100 p-lg-5 p-4">
            <h3 class="mb-4 mt-md-4">Kontak Kami</h3>
            <div class="dbox w-100 d-flex align-items-start">
              <div
                class="icon d-flex align-items-center justify-content-center"
              >
                <span class="fas fa-map-marker-alt"></span>
              </div>
              <div class="text ps-3">
                <p>
                  <span>Address:</span> 198 West 21th Street, Suite 721 New
                  York NY 10016
                </p>
              </div>
            </div>
            <div class="dbox w-100 d-flex align-items-center">
              <div
                class="icon d-flex align-items-center justify-content-center"
              >
                <span class="fa fa-phone"></span>
              </div>
              <div class="text ps-3">
                <p>
                  <span>Phone:</span>
                  <a href="tel://1234567920">+ 1235 2355 98</a>
                </p>
              </div>
            </div>
            <div class="dbox w-100 d-flex align-items-center">
              <div
                class="icon d-flex align-items-center justify-content-center"
              >
                <span class="fa fa-paper-plane"></span>
              </div>
              <div class="text ps-3">
                <p>
                  <span>Email:</span>
                  <a href="mailto:info@yoursite.com">info@yoursite.com</a>
                </p>
              </div>
            </div>
            <div class="dbox w-100 d-flex align-items-center">
              <div
                class="icon d-flex align-items-center justify-content-center"
              >
                <span class="fa fa-globe"></span>
              </div>
              <div class="text ps-3">
                <p><span>Website</span> <a href="#">yoursite.com</a></p>
              </div>
            </div>
          </div>
        </div>
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