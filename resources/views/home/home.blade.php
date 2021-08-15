@extends('home.appuser')

@section('maincontent')
<section class="menu-wrap flex-md-column-reverse d-md-flex">
    <div class="hero-wrap js-fullheight">
      <div class="home-slider js-fullheight owl-carousel">
        <div class="slider-item js-fullheight" style="background-image: images/bg_1.jpg">
          <div class="overlay"></div>
          <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
              <div class="col-md-10 text-center ftco-animate">
                <div class="text w-100">
                  <h2>Lorem Ipsum</h2>
                  <h1 class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
                  <p><a href="#" class="btn-gold">Baca Selengkapnya</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="slider-item js-fullheight" style="background-image: images/bg_1.jpg">
          <div class="overlay"></div>
          <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
              <div class="col-md-8 text-center ftco-animate">
                <div class="text w-100">
                  <h2>Ipsum Lorem</h2>
                  <h1 class="mb-4">sit amet Lorem adipisicing elit ipsum dolo consectetur.</h1>
                  <p><a href="#" class="btn-gold">Baca Selengkapnya</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="heading_container">
        <h3>Sambutan</h3>
        <!-- <p>It is a long established fact that a reader</p>				 -->
      </div>

      <div class="row sambutan d-flex align-items-center">
        <div class="col-md-6 align-items-center text-center aos-init aos-animate" data-aos="fade-right" data-aos-delay="100">
          <div class="img_container p-l-3 p-r-3">
            <img class="img-fluid" src="{{ asset('userAssets/images/avatar.jpg') }}" alt="" />
          </div>
          <h3>Nama & gelar</h3>
          <p>Sebagai Pimpinan/guru besar</p>
        </div>

        <div class="col-md-6 align-items-center align-middle aos-init aos-animate" data-aos="fade-right" data-aos-delay="100">
          <div class="kata-sambutan">
            <h2>بِسْمِ اللهِ الرَّحْمٰنِ الرَّحِيْمِ</h2>
            <p>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias eum in molestiae inventore, suscipit accusantium itaque tempore voluptatem
              natus optio asperiores dignissimos amet, reiciendis aspernatur earum. Facilis doloremque temporibus quod?
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="heading_container">
    <h3>Pondok Pesantren Al-Mua'wanah</h3>
    <!-- <p>It is a long established fact that a reader</p>				 -->
  </div>

  <section class="cta tentang">
    <div class="container aos-init aos-animate" data-aos="zoom-in">
      <div class="row">
        <div class="col-lg-9 text-center text-lg-start">
          <p>
            <span>PonPes Al-Mua'wanah</span> merupakan Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero quae laboriosam, quisquam, dolor
            temporibus iure dolores facilis dicta magnam sequi eum facere ad.
          </p>
        </div>
        <div class="col-lg-3 cta-btn-container text-center">
          <a class="cta-btn align-middle" href="#">Tentang Kami</a>
        </div>
      </div>
    </div>
  </section>
  
  <section class="ftco-section">
    <div class="heading_container pt-4">
      <h3>Brosur</h3>
    </div>
    <div id="portfolio" class="our-portfolio section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="owl-carousel owl-portfolio">
              <div class="item">
                <div class="thumb">
                  <a href="images/portfolio-01.jpg" data-lightbox="Brosur">
                    <img src="{{ asset('userAssets/images/portfolio-01.jpg') }}" alt="" />
                  </a>
                  <div class="hover-effect">
                    <div class="inner-content">
                      <h4>First Project</h4>
                      <span>Plot Listing</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="thumb">
                  <a href="images/portfolio-02.jpg" data-lightbox="Brosur">
                    <img src="{{ asset('userAssets/images/portfolio-02.jpg') }}" alt="" />
                  </a>
                  <div class="hover-effect">
                    <div class="inner-content">
                      <h4>Project Two</h4>
                      <span>SEO &amp; Marketing</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="thumb">
                  <a href="images/portfolio-03.jpg" data-lightbox="Brosur">
                    <img src="{{ asset('userAssets/images/portfolio-03.jpg') }}" alt="" />
                  </a>
                  <div class="hover-effect">
                    <div class="inner-content">
                      <h4>Third Project</h4>
                      <span>Space Dynamic SEO</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="thumb">
                  <a href="images/portfolio-04.jpg" data-lightbox="Brosur">
                    <img src="{{ asset('userAssets/images/portfolio-04.jpg') }}" alt="" />
                  </a>
                  <div class="hover-effect">
                    <div class="inner-content">
                      <h4>Project Four</h4>
                      <span>Website Marketing</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-no-pt">
    <div class="container">
      <div class="heading_container">
        <h3>Postingan</h3>          
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="post-entry-1 h-100">
            <a href="single.html">
              <img src="{{ asset('userAssets/images/bg_1.jpg') }}" alt="Image"
               class="img-fluid">
            </a>
            <div class="post-entry-1-contents">
              
              <h2><a href="single.html">Lorem ipsum dolor sit amet</a></h2>
              <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="post-entry-1 h-100">
            <a href="single.html">
              <img src="{{ asset('userAssets/images/bg_1.jpg') }}" alt="Image"
               class="img-fluid">
            </a>
            <div class="post-entry-1-contents">
              
              <h2><a href="single.html">Lorem ipsum dolor sit amet</a></h2>
              <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="post-entry-1 h-100">
            <a href="single.html">
              <img src="{{ asset('userAssets/images/bg_1.jpg') }}" alt="Image"
               class="img-fluid">
            </a>
            <div class="post-entry-1-contents">
              
              <h2><a href="single.html">Lorem ipsum dolor sit amet</a></h2>
              <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
            </div>
          </div>
        </div>
      </div>      
    </div>
  </section>
    
@endsection