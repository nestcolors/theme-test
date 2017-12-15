import $ from "jquery";
import Typed from 'typed.js';

const homePage = () => {

  document.getElementsByClassName('cr-panel__item-title')[0].classList.add('mod-active');
  document.getElementsByClassName('cr-panel__item-content')[0].classList.add('mod-open');
  var main_menu = $("#js-main-menu");

  main_menu.find('.cr-panel__item-title').click(function(event) {
    event.stopPropagation();
    $(".mod-open").removeClass('mod-open');
    $(".mod-active").removeClass('mod-active');
    $(this).siblings(".cr-panel__item-content").toggleClass('mod-open');
    $(this).toggleClass('mod-active');
  });

  main_menu.find('.cr-hover-menu').click(function(event) {
    event.stopPropagation();
    $(this).parent().find(".mod-open").removeClass('mod-open');
    $(this).parent().find(".mod-active").removeClass('mod-active');
    $(this).find(".cr-hover-menu__content").toggleClass('mod-open');
    $(this).find(".cr-hover-menu__title").toggleClass('mod-active');
  });

  main_menu.find('.cr-accordeon__title').click(function(event) {
    event.stopPropagation();
    $(this).toggleClass('mod-active');
    $(this).siblings(".cr-accordeon__content").toggleClass('mod-open');
  });

  var body = $('body');
  var header = $('#js-header');
  var header_fixed_part = header.find('.cr-header__fixed-part');
  var motto_height = header.find('.cr-header__motto').outerHeight();

  var menuWrapperHeightHandler = 100;
  if (window.innerWidth > 1650) {
    menuWrapperHeightHandler = 400;
  }

  if ($(window).scrollTop() > menuWrapperHeightHandler) {
    $('.cr-main-menu-wrapper').fadeOut(0);
  }

  $(window).scroll(function (event) {
      var scroll = $(window).scrollTop();
      if (scroll > menuWrapperHeightHandler) {
        $('.cr-main-menu-wrapper').fadeOut();
      } else {
        $('.cr-main-menu-wrapper').fadeIn();
      }
      if (window.innerWidth > 400) {
          if (scroll > 200) {
            $('.slick-dots, .social-container, #school-title').fadeOut();
          } else {
            $('.slick-dots, .social-container, #school-title').fadeIn();
          }
      } else {
          if (scroll > 30) {
            $('.slick-dots, .social-container, #school-title').fadeOut();
          } else {
            $('.slick-dots, .social-container, #school-title').fadeIn();
          }
      }

      // events hello
      if (scroll > window.innerHeight - (window.innerHeight / 2) ) {
        $('.events-animations').addClass('cr-animation-from-below');
      }
      scroll < 100 && $('.events-animations').removeClass('cr-animation-from-below');

      // tagline hello
      if (scroll > window.innerHeight + 200 ) {
        $('.tagline-animations').addClass('cr-animation-from-left');
      }
      scroll < 100 && $('.tagline-animations').removeClass('cr-animation-from-left');

      // deHouse hello
      if (scroll > window.innerHeight + 800) {

        $('.dehouse-hello').addClass('cr-dehouse-appear');
      }
      scroll < 100 && $('.dehouse-hello').removeClass('cr-dehouse-appear');

  });

  $( '.cr-main-menu-wrapper')
    .mouseenter(() => {
      $( '#school-title' ).fadeOut( 300 );
    })
    .mouseleave(() => {
      $( '.mod-active' ).removeClass('mod-active');
      $( '.mod-open' ).removeClass('mod-open');
      document.getElementsByClassName('cr-panel__item-title')[0].classList.add('mod-active');
      document.getElementsByClassName('cr-panel__item-content')[0].classList.add('mod-open');
      $( '#school-title' ).fadeIn( 300 );
    });

  $('.cr-hero-slider').slick({
    dots: true,
    arrows: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 4000,
    fade: true,
    pauseOnHover:false,
  });

  $('.cr-mobile-hero-slider').slick({
    dots: true,
    arrows: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    fade: true,
  });

  $('.cr-hero-slider .slick-slide.slick-current video')[0].play();
  $('.cr-hero-slider').on('afterChange', function(event, slick, currentSlide){
    $('.cr-hero-slider .slick-slide.slick-current video')[0].play();
  });

  var options = {
    strings: ["Design", "Business", "Junior"],
    typeSpeed: 150,
    loop: true,
    backDelay: 4000,
    autoInsertCss: true
  }

  var optionsTypedSmall = {
    strings: ["дизайну", "бізнесу", "джуніор"],
    typeSpeed: 50,
    loop: true,
    backDelay: 6000,
    autoInsertCss: true
  }

  new Typed("#js-dynamic-title", options);
  new Typed("#js-dynamic-title-small", optionsTypedSmall);

}


export default homePage;
