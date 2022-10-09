const mix = require("laravel-mix");
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

mix.sass("resources/scss/main.scss", "application/css-min/main.min.css");

/* JS */
mix.js("resources/js/main.js", "public/application/js-min/main.min.js");
mix.js("resources/js/default.js", "public/application/js-min/default.min.js");
mix.js("resources/js/admin.js", "public/application/js-min/admin.min.js");
mix.js("resources/js/article.js", "public/application/js-min/article.min.js");
mix.js("resources/js/auth.js", "public/application/js-min/auth.min.js");
mix.js("resources/js/basket.js", "public/application/js-min/basket.min.js");
mix.js("resources/js/blog.js", "public/application/js-min/blog.min.js");
mix.js("resources/js/liked.js", "public/application/js-min/liked.min.js");
mix.js("resources/js/home.js", "public/application/js-min/home.min.js");
mix.js("resources/js/orders.js", "public/application/js-min/orders.min.js");
mix.js("resources/js/product.js", "public/application/js-min/product.min.js");
mix.js("resources/js/store.js", "public/application/js-min/store.min.js");
mix.js("resources/js/user-profile.js", "public/application/js-min/user-profile.min.js");

/* Libs */

mix.combine([
	"resources/css/libs/bootstrap-grid.min.css",
	"resources/css/libs/swiper-bundle.min.css",
	"resources/css/libs/all.min.css",
	"resources/css/libs/regular.min.css",
	"resources/css/libs/select2.min.css",
	"resources/css/libs/toastify.min.css",
	//'resources/css/libs/trix.css',
], "public/application/libs/libs.min.css");


mix.combine([
	"resources/js/libs/bootstrap.min.js",
	"resources/js/libs/jquery-3.6.0.min.js",
	"resources/js/libs/swiper-bundle.min.js",
	"resources/js/libs/toastify.min.js",
	"resources/js/libs/select2.min.js",
	"resources/js/libs/trix.min.js",
], "public/application/libs/libs.min.js");

