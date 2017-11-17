import $ from "jquery";

const coursesList = () => {
  console.log('coursesList', window.location.pathname);

  let uaTitle, engTitle;
  if (!!window.location.pathname.match(/dizajn/)) {
    uaTitle = 'Дизайн';
    engTitle = 'Design';
    $('.dizajn-selector a').addClass('active');
  } else if (!!window.location.pathname.match(/biznes/)) {
    uaTitle = 'Бізнес';
    engTitle = 'Business';
    $('.biznes-selector a').addClass('active');
  } else if (!!window.location.pathname.match(/junior/)) {
    uaTitle = 'Джуніор';
    engTitle = 'Junior';
    $('.junior-selector a').addClass('active');
  }

  $('#eng-course-title').html(engTitle);
  $('#eng-course-ua-title').html(uaTitle);

  var $filters = $('.filter [data-filter]'),
    $boxes = $('.boxes [data-category]'),
    $containers = $('.color-container');

  $filters.on('click', function(e) {
    e.preventDefault();
    var $this = $(this);

    $filters.removeClass('active');
    $this.addClass('active');

    var $filterColor = $this.attr('data-filter');

    if ($filterColor == 'all') {
      $boxes.removeClass('is-animated')
        .fadeOut().finish().promise().done(function() {
          $boxes.each(function(i) {
            $(this).addClass('is-animated').delay((i++) * 200).fadeIn();
          });
        });
    } else {
      $containers.removeClass('is-animated').fadeOut()
      $boxes.removeClass('is-animated')
        .fadeOut().finish().promise().done(function() {
          $('[data-category = "' + $filterColor + '-container"]').fadeIn();
          $boxes.filter('[data-category = "' + $filterColor + '"]').each(function(i) {
            $(this).addClass('is-animated').delay((i++) * 200).fadeIn();
          });
        });
    }
  });
  $('.cr-type-select').on('click', function(){
    // $('.show-on-click').slideToggle();
    $('.show-on-click').toggleClass('show-level-list');
  })

}

export default coursesList;
