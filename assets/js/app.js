import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import $ from 'jquery';
import 'animation.gsap';

import $ScrollMagic from 'ScrollMagic';
import 'owl.carousel2/dist/assets/owl.carousel.css';
import 'owl.carousel2/dist/assets/owl.theme.default.css';
import 'owl.carousel2/src/scss/_animate.scss';
import custom from './custom.js';
import registration from './registration_custom.js';

window.jQuery = $;
window.$ = $;
window.ScrollMagic = $ScrollMagic;

custom();

require('gsap');
require('owl.carousel2');
require('./../plugins/fontawesome-free-5.0.1/css/fontawesome-all.css');
require('../css/main_styles.css');
require('../css/responsive.css');
require('jquery-validation');

registration();