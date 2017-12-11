import jQuery from "jquery";
import $ from "jquery";
import Rellax from "rellax";
import slick from "./slick.min.js"

const aboutUsPage = () => {
  var intro = new Rellax('.js-paralax-effect1', {
    speed: 2,
  });

  let effect2Exist = false;
  $(window).scroll(function(event) {
    if (window.scrollY > 2940 && !effect2Exist) {
      console.info(window.scrollY > 2940);
      effect2Exist = true;
      var coop = new Rellax('.js-paralax-effect2', {
        speed: 2,
      });
    }
    var scroll = $(window).scrollTop();
    // lectors hello
    if (scroll > window.innerHeight - (window.innerHeight / 2) ) {
      $('.lectors-animations').addClass('cr-animation-from-below');
    }
    scroll < 100 && $('.lectors-animations').removeClass('cr-animation-from-below');


    // deHouse hello
    if (scroll > window.innerHeight + 2900) {

      $('.dehouse-hello').addClass('cr-dehouse-appear');
    }
    scroll < 100 && $('.dehouse-hello').removeClass('cr-dehouse-appear');
  });

  $(document).ready(function(){
    $('.cr-portfolio-slider').slick({
      arrows: true,
      dots: true,
      centerMode: true,
      centerPadding: '0px',
      fade: true,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            arrows: false
          }
        }
      ]
    });
    $('.cr-prostir-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      fade: true,
      autoplay: true,
      infinite: true,
      autoplaySpeed: 4000,
    });
    $('.cr-people-slider.about-us-people').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: true,
      dots: false,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            centerMode: true,
            centerPadding: '150px',
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: false,
            dots: true
          }
        },
        {
          breakpoint: 768,
          settings: {
            centerMode: true,
            centerPadding: '150px',
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: false,
            dots: true
          }
        },
         {
          breakpoint: 692,
          settings: {
            centerMode: true,
            centerPadding: '200px',
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true
          }
        },
        {
          breakpoint: 480,
          settings: {
            centerMode: true,
            centerPadding: '10px',
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true
          }
        }
      ]

    });

    $('.cr-recommendation-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      dots: false,
    })
  });

}



export default aboutUsPage;
