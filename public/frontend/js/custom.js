// meanmenu
$('#mobile-menu').meanmenu({
    meanMenuContainer: '.mobile-menu',
    meanScreenWidth: "992"
  });
  
  $('.sidemenu').on('click', function () {
    $('.side-info').addClass('info-open');
    $('.offcanvas-overlay').addClass('overlay-open');
    $('body').addClass('body-open');
  
    
  })
  
  $('.side-info-close,.offcanvas-overlay').on('click', function () {
    $('.side-info').removeClass('info-open');
    $('.offcanvas-overlay').removeClass('overlay-open');
    $('body').removeClass('body-open');
  })
  
  //sidbar
  $(".open").click(function(){
    $(".mega-sidebar").addClass("open-sidebar");
    });
  
    $(".close").click(function(){
    $(".mega-sidebar").removeClass("open-sidebar");
    });
  
  
  // go to top add class //
  $(window).on('scroll', function(){
    var scrolled = $(window).scrollTop();
    if (scrolled > 600) $('.go-top').addClass('active');
    if (scrolled < 600) $('.go-top').removeClass('active');
  });
  $('.go-top').on('click', function() {
    $("html, body").animate({ scrollTop: "0" },  500);
  });
  
  
    //  Sticky Menu
  
    $(window).scroll(function () {
      var window_top = $(window).scrollTop() + 1;
      if (window_top > 50) {
        $('.sticky_header').addClass('menu_fixed');
      } else {
        $('.sticky_header').removeClass('menu_fixed');
      }
      });
  
  // Nice Select //
  $(document).ready(function() {
    $('select.customselect').niceSelect();      
  
  });  

  // Slider Banner //
  var swiper = new Swiper(".bannerSlider", {
    loop: true,
    slidesPerView: "1",
    speed: 2000,
    roundLengths: true,
    direction: 'horizontal',
    fadeEffect: {
      crossFade: true
    },
    autoplay: {
    delay: 6000,
    disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },

  });

