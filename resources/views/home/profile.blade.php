@extends('home.appuser')

@section('maincontent')
<section class="menu-wrap single-page-header d-flex">
    <div class="container half-banner-content">
      <div class="row align-items-center justify-content-center">
        <div class="col text-center align-middle align-self-center ftco-animate">
          <h1>Profil</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-no-pb">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row tabulation mt-4 ftco-animate">
            <div class="col-md-4">
              <ul class="nav nav-pills nav-fill d-md-flex d-block flex-column">
                <li class="nav-item text-start">
                  <a class="nav-link active py-4" data-toggle="tab" href="#tentang"><i class="fas fa-book-reader"></i></span> Tentang Kami</a>
                </li>
                <li class="nav-item text-start">
                  <a class="nav-link py-4" data-toggle="tab" href="#visi"><i class="fas fa-eye"></i> Visi</a>
                </li>
                <li class="nav-item text-start">
                  <a class="nav-link py-4" data-toggle="tab" href="#misi"><i class="fas fa-check-circle"></i> Misi</a>
                </li>
              </ul>
            </div>
            <div class="col-md-8 pl-md-4">
              <div class="tab-content">
                <div class="tab-pane container p-0 active" id="tentang">
                  <h3 class="text-center"><a href="#">Tentang Kami</a></h3>
                  <p>
                    <img src="{{ asset('userAssets/images/logo.png') }}">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod, numquam quam. Nobis tenetur accusamus officiis sed aperiam iste quo ipsa corporis. Eius adipisci velit hic voluptatibus, enim amet voluptates deserunt.
                    <br>
                    The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the
                    Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.
                  </p>
                </div>
                <div class="tab-pane container p-0 fade" id="visi">
                  <h3 class="text-center"><a href="#">Visi</a></h3>
                  <p>
                    Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live
                    in Bookmarksgrove right at the coast of the Semantics, a large language ocean.
                  </p>
                  <p>
                    The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the
                    Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.
                  </p>                    
                </div>
                <div class="tab-pane container p-0 fade" id="misi">
                  <h3 class="text-center"><a href="#">Misi</a></h3>
                  <p>
                    Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live
                    in Bookmarksgrove right at the coast of the Semantics, a large language ocean.
                  </p>
                  <p>
                    The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the
                    Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.
                  </p>                    
                </div>
              </div>
            </div>
          </div>
        </div>          
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="heading_container pt-4">
      <h3>Profil Pendidikan</h3>
    </div>
    <div id="portfolio" class="our-portfolio section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="owl-carousel owl-portfolio">
              <div class="item">
                <div class="thumb">
                  <a href="images/portfolio-01.jpg" data-lightbox="Brosur">
                    <img src="images/portfolio-01.jpg" alt="" />
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
                    <img src="images/portfolio-02.jpg" alt="" />
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
                    <img src="images/portfolio-03.jpg" alt="" />
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
                    <img src="images/portfolio-04.jpg" alt="" />
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
@endsection