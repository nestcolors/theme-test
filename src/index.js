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
coursesList();
aboutUsPage();
faqPage();
aboutCoursePage();
spaces();

console.log('i`m index js file: ', window.location.pathname);
//if (window.location.pathname === '/courses-list.html') {
//} else if (window.location.pathname === '/home-page.html') {
//
//} else if (window.location.pathname === '/about-us-page.html') {
//}else if (window.location.pathname === '/faq.html') {
//
//}else if (window.location.pathname === '/about-course-page.html') {
//
//  // aboutUsPage();
//}else if (window.location.pathname === '/spaces.html') {
//
//} else {
//  console.info('no js, everything is ok!');
//}
