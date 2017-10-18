import $ from "jquery";
const spaces = () => {
  console.log('spaces');

  $('.space-selector-item').click(function(e) {
    e.preventDefault()
    const nextSpace = e.target.getAttribute('data-space-name');
    const currentSlider = $('.visible-slider');
    const currentLink = $('.active-link');

    // handling active state for spaces link
    currentLink.removeClass('active-link');
    $(`.${nextSpace}`).addClass('active-link');

    // handling active state for spaces gallery
    currentSlider.removeClass('visible-slider');
    $(`#${nextSpace}`).addClass('visible-slider');

    $('.active-text').removeClass('active-text');
    $(`#${nextSpace}-text`).addClass('active-text');

    $('.active-map').removeClass('active-map');
    $(`#${nextSpace}-map`).addClass('active-map');

    initSlick(nextSpace);
    $(currentSlider[0]).slick('unslick');
  })

  $(document).ready(function(){
    initSlick($('.cr-spaces-slider')[0].id);
  });

  const initSlick = (val) => {
    $(`#${val}`).slick({
      arrows: true,
      infinite: false,
      dots: true,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            arrows: false,
          }
        }
      ]
    });
  }
}

export default spaces;


$(document).ready(function(){
  $('.cr-album-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: true,
    responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true
          }
        }
      ]
  });
});

