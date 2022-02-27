const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('resources/scss/main.scss', 'app/css-min/main.min.css');

/* Libs */

mix.combine([
    'resources/css/libs/bootstrap-grid.min.css',
    'resources/css/libs/swiper-bundle.min.css',
], 'public/app/libs/libs.min.css');


mix.combine([
    'resources/js/libs/bootstrap.min.js',
    'resources/js/libs/jquery-3.6.0.min.js',
    'resources/js/libs/swiper-bundle.min.js',
], 'public/app/libs/libs.min.js');


