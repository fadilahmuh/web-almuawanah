/**
 * Template Name: Arsha - v4.3.0
 * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
 * Author: BootstrapMade.com
 * License: https://bootstrapmade.com/license/
 */
(function () {
  "use strict";

  // $(window).stellar({
  // 	responsive: true,
  // 	parallaxBackgrounds: true,
  // 	parallaxElements: true,
  // 	horizontalScrolling: false,
  // 	hideDistantElements: false,
  // 	scrollProperty: 'scroll'
  //   });

  const onscroll = (el, listener) => {
    el.addEventListener("scroll", listener);
  };

  $(window).scroll(function () {
    if ($(window).scrollTop() >= 50) {
      $("#header").addClass("header-scrolled");
    } else {
      $("#header").removeClass("header-scrolled");
    }
  });

  var fullHeight = function () {
    $(".js-fullheight").css("height", $(window).height());
    $(window).resize(function () {
      $(".js-fullheight").css("height", $(window).height());
    });
  };
  fullHeight();

  // loader
  var loader = function () {
    setTimeout(function () {
      if ($("#ftco-loader").length > 0) {
        $("#ftco-loader").removeClass("show");
      }
    }, 1);
  };
  loader();

  var marq = function () {
    $(".marquee").marquee({
      // duration: 10000,
      speed : 50,
      gap: 50,
      delayBeforeStart: 0,
      direction: "left",      
      duplicated: true,
      pauseOnHover : true,
    });
  }
  marq();

  var carousel = function () {
    $(".home-slider").owlCarousel({
      loop: true,
      autoplay: true,
      margin: 0,
      animateOut: "fadeOut",
      animateIn: "fadeIn",
      nav: true,
      dots: true,
      autoplayHoverPause: false,
      items: 1,
      navText: [
        "<span class='ion-ios-arrow-back'></span>",
        "<span class='ion-ios-arrow-forward'></span>",
      ],
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 1,
        },
        1000: {
          items: 1,
        },
      },
    });

    $(".owl-banner").owlCarousel({
      items: 1,
      loop: true,
      dots: true,
      nav: false,
      autoplay: true,
      margin: 0,
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 1,
        },
        1000: {
          items: 1,
        },
        1600: {
          items: 1,
        },
      },
    });

    $(".owl-services").owlCarousel({
      items: 4,
      loop: true,
      dots: true,
      nav: false,
      autoplay: true,
      margin: 5,
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 2,
        },
        1000: {
          items: 3,
        },
        1600: {
          items: 4,
        },
      },
    });

    $(".owl-portfolio").owlCarousel({
      items: 4,
      loop: false,
      dots: true,
      nav: true,
      navText: [
        '<i class="fas fa-chevron-left owl-cust-btn"></i>',
        '<i class="fas fa-chevron-right owl-cust-btn"></i>',
      ],
      autoplay: false,
      margin: 30,
      responsive: {
        0: {
          items: 1,
        },
        700: {
          items: 2,
        },
        1000: {
          items: 3,
        },
        1600: {
          items: 4,
        },
      },
    });

    $(".owl-gallery").owlCarousel({
      items: 4,
      rows: 2,
      loop: false,
      dots: true,
      nav: true,
      navText: [
        '<i class="fas fa-chevron-left owl-cust-btn"></i>',
        '<i class="fas fa-chevron-right owl-cust-btn"></i>',
      ],
      autoplay: false,
      margin: 30,
      responsive: {
        0: {
          items: 1,
        },
        700: {
          items: 2,
        },
        1000: {
          items: 3,
        },
        1600: {
          items: 4,
        },
      },
    });

    $(".carousel-testimony").owlCarousel({
      center: true,
      loop: true,
      items: 1,
      margin: 30,
      stagePadding: 0,
      nav: false,
      navText: [
        '<span class="ion-ios-arrow-back">',
        '<span class="ion-ios-arrow-forward">',
      ],
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 2,
        },
        1000: {
          items: 3,
        },
      },
    });

    $("#owl-donasi").owlCarousel({
      center: true,
      loop: true,
      items: 1,
      nav: false,
      dots: false,
      margin: 0,
      animateOut: "fadeOut",
      animateIn: "fadeIn",
      autoplay: true,
      mouseDrag: false,
      touchDrag: false
    });
    // console.log('donasi init');
  };
  carousel();

  var slick = function () {
    $("#slick-gallery").slick({
      rows: 2,
      dots: true,
      prevArrow: '<i class="fas fa-chevron-left sa-left"></i>',
      nextArrow: '<i class="fas fa-chevron-right sa-right"></i>',
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 2,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 2,
          },
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });

  };
  slick();

  lightbox.option({
    fitImagesInViewport: true,
    disableScrolling: true,
  });

  // NAVBAR TOGGLE MOBILE VIEW
  $(".mobile-nav-toggle").on("click", function () {
    $("#navbar").toggleClass("navbar-mobile");
    $(this).toggleClass("fa-bars");
    $(this).toggleClass("fa-times");
  });

  $(".navbar .dropdown > a").on("click", function (e) {
    if ($("#navbar").hasClass("navbar-mobile")) {
      e.preventDefault();
      $(this).next().toggleClass("dropdown-active");
    }
  });

  // on("click",".navbar .dropdown > a",
  //   function (e) {
  //     if (select("#navbar").classList.contains("navbar-mobile")) {
  //       e.preventDefault();
  //       this.nextElementSibling.classList.toggle("dropdown-active");
  //     }
  //   },
  //   true
  // );

  // 	let selectHeader = select('#header')
  //   	if (selectHeader) {
  //     const headerScrolled = () => {
  //       if (window.scrollY > 100) {
  //         selectHeader.classList.add('header-scrolled')
  //       } else {
  //         selectHeader.classList.remove('header-scrolled')
  //       }
  //     }
  //     window.addEventListener('load', headerScrolled)
  //     onscroll(document, headerScrolled)
  //   }

  // $('nav .dropdown').hover(function(){
  // 	var $this = $(this);
  // 	// 	 timer;
  // 	// clearTimeout(timer);
  // 	$this.addClass('show');
  // 	$this.find('> a').attr('aria-expanded', true);
  // 	// $this.find('.dropdown-menu').addClass('animated-fast fadeInUp show');
  // 	$this.find('.dropdown-menu').addClass('show');
  // }, function(){
  // 	var $this = $(this);
  // 		// timer;
  // 	// timer = setTimeout(function(){
  // 		$this.removeClass('show');
  // 		$this.find('> a').attr('aria-expanded', false);
  // 		// $this.find('.dropdown-menu').removeClass('animated-fast fadeInUp show');
  // 		$this.find('.dropdown-menu').removeClass('show');
  // 	// }, 100);
  // });
})();
