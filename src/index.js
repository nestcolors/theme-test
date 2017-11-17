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
      clearTimeout(loadingTimeOut);
      loadData();
    } else {
      console.log('not done!');
    }
}, 100);

const loadingTimeOut = setTimeout(() => {
  console.warn('force loading data!');
  loadData();
}, 7000);

const loadData = () => {
  clearInterval(interval);
  console.log('done!');
  $('.website-container').fadeIn();
  $('.loading-curtain').fadeOut(500);
  loadAllSources();
}

$('a:not(.outher-link)').click( () => {
  $('.website-container').fadeOut();
  $('.loading-curtain').fadeIn();
})

const loadAllSources = () => {
  general();
  if (!!window.location.pathname.match(/product/) && !window.location.pathname.match(/product-category/)) {
    console.log('i`m product file: ', !!window.location.pathname.match(/product/));
    aboutCoursePage();
  } else if (!!window.location.pathname.match(/product-category/)) {
    console.log('i`m coursesList file: ', !!window.location.pathname.match(/product-category/));
    coursesList();
  } else if (!!window.location.pathname.match(/pro-nas/)) {
      console.log('i`m proNas file: ', !!window.location.pathname.match(/pro-nas/));
      aboutUsPage();
  } else if (!!window.location.pathname.match(/prostori/)) {
      console.log('i`m prostori file: ', !!window.location.pathname.match(/prostori/));
      spaces();
  } else if (!!window.location.pathname.match(/\//) && !window.location.pathname.match(/events|teachers|faq/)){
    console.log('i`m homepage file: ', !!window.location.pathname.match(/creative/));
    homePage();
  }

}
