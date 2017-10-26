import $ from "jquery";
import coursesList from './scripts/courses-list.js';
import homePage from './scripts/home-page.js';
import aboutUsPage from './scripts/about-us-page.js';
import aboutCoursePage from './scripts/about-course-page.js';
import spaces from './scripts/spaces.js';
import general from './scripts/general.js';
import faqPage from './scripts/faq-page.js';
require('./styles/style.sass');


// Polling for the sake of checking if all data loaded
const interval = setInterval(function() {
    if(document.readyState === 'complete') {
        clearInterval(interval);
        console.log('done!');
        $('.website-container').fadeIn();
        $('.loading-curtain').fadeOut(500);
        loadAllSources();
    } else {
      console.log('not done!');
    }
}, 100);

$('a').click( () => {
  $('.website-container').fadeOut();
  $('.loading-curtain').fadeIn();
})

// homePage();
// coursesList();
// aboutUsPage();
// faqPage();
// spaces();

const loadAllSources = () => {
  general();
  if (!!window.location.pathname.match(/product/) && !window.location.pathname.match(/product-category/)) {
    console.log('i`m product file: ', !!window.location.pathname.match(/product/));
    aboutCoursePage();
  } else if (!!window.location.pathname.match(/product-category/)) {
    console.log('i`m coursesList file: ', !!window.location.pathname.match(/coursesList/));
    coursesList();
  } else if (!!window.location.pathname.match(/pro-nas/)) {
      console.log('i`m proNas file: ', !!window.location.pathname.match(/pro-nas/));
      aboutUsPage();
  } else if (!!window.location.pathname.match(/prostori/)) {
      console.log('i`m prostori file: ', !!window.location.pathname.match(/prostori/));
      spaces();
  } else if (!!window.location.pathname.match(/\//) && !window.location.pathname.match(/events/)){
    console.log('i`m homepage file: ', !!window.location.pathname.match(/creative/));
    homePage();
  }

}
