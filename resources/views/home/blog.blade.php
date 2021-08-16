@extends('home.appuser')    

@section('maincontent')
<section class="menu-wrap single-page-header d-flex">
    <div class="container half-banner-content">
      <div class="row align-items-center justify-content-center">
        <div class="col text-center align-middle align-self-center ftco-animate">
          <h1>Blog</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row">
         <div class="col-lg-8">
           <h3>Judul Post</h3>
           <div class="blog-thumb">
             <img src="{{ asset('userAssets/images/bg-bangunan.jpg') }}" alt="">
           </div>
           <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores commodi rerum sed harum excepturi temporibus earum asperiores magnam dolore nihil ipsum, consectetur delectus eaque dolorum accusantium voluptates veniam at autem?</p>
           <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius doloribus asperiores inventore voluptatem illo incidunt nam, ullam autem ipsum. Quisquam fuga itaque, dolore autem excepturi dolores iusto dolor ut necessitatibus? Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem nihil ab unde iste cumque debitis at soluta adipisci ea, nobis alias explicabo tempora reprehenderit eaque consequatur consectetur vero sint beatae.</p>             
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
          <div class="sidebar-box ftco-animate">
            <h3>Postingan Lain</h3>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(images/bg_1.jpg);"></a>
              <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span>Mar. 24, 2020</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
              <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span>Mar. 24, 2020</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
              <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span>Mar. 24, 2020</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
          </div>
         </div>
      </div>
    </div>
  </section> 
@endsection