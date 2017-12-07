import $ from "jquery";

const general = () => {
  var body = $('body');
  var header = $('#js-header');
  var header_fixed_part = header.find('.cr-header__fixed-part');
  var motto_height = header.find('.cr-header__motto').outerHeight();

  // header moto show/hide on scroll
  $(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
    if (scroll >= motto_height) {
      header.addClass('mod-fixed');
    }
    else {
      header.removeClass('mod-fixed');
    }
  });
  console.log($('.cr-header__link')[0]);

  /*
  on hover show submenu
  */
  $('.cr-sublist-container').hover((i) => {
    $('.cr-black-curtain').fadeIn(100);
    $('.cr-sublist-container > ul').fadeIn(0);
    $('.cr-sublist-container > ul').addClass('show-cr-list-sub-menu');
  }, (i) => {
    $('.cr-sublist-container > ul').fadeOut(100);
    $('.cr-black-curtain').fadeOut(300);
  });

  $('.js-popup-container').hover((i) => {
    $('.cr-black-curtain').fadeIn(100);
    $('.js-popup-container > .cr-header-popup').fadeIn(0);
    $('.js-popup-container > .cr-header-popup').addClass('show-header-popup');
  }, (i) => {
    $('.js-popup-container > .cr-header-popup').fadeOut();
    $('.cr-black-curtain').fadeOut(100);
  });
  /*
  on hover show list
  */
  $('.cr-type-select').hover((i) => {
    $('.show-on-click').fadeIn(0);
    $('.show-on-click').addClass('show-level-list');
  }, (i) => {
    $('.show-on-click').fadeOut();
  });
  // $('.cr-type-select').on('click', function(){
  //   // $('.show-on-click').slideToggle();
  //   $('.show-on-click').toggleClass('show-level-list');
  // })

  // mobile menu
  // var close_mobile_menu = header.find(".cr-close-btn");
  // close_mobile_menu.click(function(event) {
  //   header.find('.cr-header__fixed-part').addClass('mod-mobile-menu-closed');
  // });
  // var open_mobile_menu = header.find(".cr-burger-btn");
  // open_mobile_menu.click(function(event) {
  //   header.find('.cr-header__fixed-part').removeClass('mod-mobile-menu-closed');
  // });

  var mobile_burger_btn =  header.find(".cr-burger-btn");
  mobile_burger_btn.click(function(event) {
    // header.find('.cr-header__fixed-part').toggleClass('mod-mobile-menu-closed');
    header.toggleClass('mod-mobile-opened');
  });

  // detect scrolling direction
  var lastScrollTop = 0;
  var navbar = $('#js-header');
  $(window).scroll(function(event){
     var st = $(this).scrollTop();
     if (st > lastScrollTop && window.pageYOffset > 300){
       navbar.addClass('mod-hidden');
     } else {
       navbar.removeClass('mod-hidden');
     }
     lastScrollTop = st;
  });

}

export default general;
