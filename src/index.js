import coursesList from './scripts/courses-list.js';
import homePage from './scripts/home-page.js';
import aboutUsPage from './scripts/about-us-page.js';
import aboutCoursePage from './scripts/about-course-page.js';
import spaces from './scripts/spaces.js';
import general from './scripts/general.js';
import faqPage from './scripts/faq-page.js';
require('./styles/style.sass');

general();
// homePage();
// coursesList();
// aboutUsPage();
// faqPage();
// spaces();

// console.log('i`m js file: ', !!window.location.pathname.match(/creative/));
if (!!window.location.pathname.match(/product/) && !window.location.pathname.match(/product-category/)) {
  console.log('i`m product file: ', !!window.location.pathname.match(/product/));
  aboutCoursePage();
} else if (!!window.location.pathname.match(/product-category/)) {
  console.log('i`m coursesList file: ', !!window.location.pathname.match(/coursesList/));
  coursesList();
} else {
  console.log('i`m homepage file: ', !!window.location.pathname.match(/creative/));
  homePage();
}
