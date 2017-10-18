import jQuery from "jquery";
import $ from "jquery";
import slick from "./slick.min.js"

const aboutUsPage = () => {

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


  // PARALAX
  // var paralaxElements = $(".js-paralax-effect");
  var paralaxElements = $(".js-paralax-container");
  // console.log("paralaxElements", paralaxElements); 
  // console.log($(paralaxElements).find(".js-paralax-effect")); 
  var scrollingDown = true;
  var topScrollposition = 0;
  // SCROLLING DIRECTIONS
  $(window).bind('scroll', function(event) {
      if (topScrollposition >= $(document).scrollTop().valueOf()) {
        // console.log("Scrolling up"); 
          scrollingDown = false;
          topScrollposition = $(document).scrollTop().valueOf();
      }
      else {
        // console.log("Scrolling down"); 
          scrollingDown = true;
          topScrollposition = $(document).scrollTop().valueOf();
      }
  });


  // // CHECK VISIBILITY OF OBJECT
  // function elementInViewport(paralaxContainer) {
  //   var paralaxElement = $(paralaxContainer).find(".js-paralax-effect");
  //   // console.log("paralaxElement", paralaxElement.outerHeight()); 
  //   var top = $(paralaxElement).offset().top;
  //   var height = $(paralaxElement).outerHeight();
  //   // console.log('top', top); 
  //   return (
  //     window.pageYOffset < top &&
  //     (top + height) > window.pageYOffset
  //   );
  // }

  // function elementInContainer(paralaxContainer) {
  //   var paralaxTopStop = $(paralaxContainer).find('.js-paralax-top-stop');
  //   var paralaxElement = $(paralaxContainer).find(".js-paralax-effect");
  //   var top = $(paralaxElement).offset().top;
  //   var height = $(paralaxElement).outerHeight();
  //   var containerHeight = $(paralaxElement).outerHeight();
  //   return (
  //     top > paralaxTopStop.offset().top &&
  //     (top + height) < containerHeight
  //   );
  // }
  // // ADDING PARALAX EFFECT TO ALL ELEMENTS
  // paralaxElements.each(function(index) {
  //   var element = $(this).find('.js-paralax-effect');
  //   // console.log("container", $(this));
  //   // console.log("element", element);  
  //   // var that = this ;
  //   var translateDefault = 0;

  //   $(window).scroll(function(event) {
  //   // console.log(contai ner);
  //   // console.log("elementInViewport", elementInViewport(paralaxElements[index]));
  //   // console.log("elementInContainer", elementInContainer(paralaxElements[index]));
  //     if(elementInViewport(paralaxElements[index]) && scrollingDown) {
  //       translateDefault += 2;
  //       element.css('transform', 'translate(0,'+translateDefault+'px)');
  //     }
  //     if(elementInViewport(paralaxElements[index]) && !scrollingDown) {
  //       translateDefault -= 2;
  //       element.css('transform', 'translate(0,'+translateDefault+'px)');
  //     }
  //   });
  // });
  $(document).ready(function(){

// The plugin code
    (function($){
      $.fn.parallax = function(options){
        var $$ = $(this);
        var offset = $$.offset();
        // console.log(offset); 
        var defaults = {
          'start': offset.top,
          'stop': offset.top + $$.height(),
          'coeff': 0.95,
          'transition' : 0,
          'maxDownTranslate': 100
        };
        var opts = $.extend(defaults, options);
        return this.each(function(){
          $(window).bind('scroll', function() {
            var windowTop = $(window).scrollTop();
            var windowBottom = $(window).scrollTop() + $(window).height();
            var elementTop = offset.top;
            var elementTBottom = offset.top + $$.height();
            var dynamictopposition = $$.offset().top;
            var dynamicElementBottom = $$.offset().top + $$.height();
            var bottomStop = elementTBottom + opts.maxDownTranslate;
            // console.log('windowTop', windowTop); 
            // console.log('windowBottom', windowBottom);
            if((windowTop < elementTop) && (windowBottom > elementTBottom) && (dynamictopposition >= elementTop) && (dynamicElementBottom <= bottomStop)) {
              console.log('elementTBottom', elementTBottom);
              console.log('dynamicElementTBottom', dynamicElementBottom);
              if (scrollingDown) {
                if(dynamicElementBottom < bottomStop) {
                  opts.transition += 2;
                }
              }
              else {
                if(dynamictopposition > elementTop) {
                  opts.transition -= 2;
                }
              }
              $$.css({
                  'transform': 'translate(0, '+ opts.transition + 'px)'
              });
            }
          });
        });
      };
    })(jQuery);

    // call the plugin
    $('.js-paralax-effect1').parallax({ 'coeff':0.2 });
    $('.js-paralax-effect2').parallax({ 'coeff':0.2 });
    // $('.js-paralax-effect3').parallax({ 'coeff':0.2 });

    });
}



export default aboutUsPage;
