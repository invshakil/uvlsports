let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

mix.options({ processCssUrls: true });

/* Combine CSS */
mix.combine([
    'public/frontend/css/bootstrap.min.css',
    'public/frontend/css/font-awesome.min.css',
    // 'public/frontend/css/magnific-popup.css',
    'public/frontend/css/owl.carousel.css',
    'public/frontend/css/subscribe-better.css',
    'public/frontend/css/main.css',
    'public/frontend/css/presets/preset1.css',
    'public/frontend/css/responsive.css',
    'https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/red/pace-theme-flash.min.css',
    'http://mdminhazulhaque.github.io/solaimanlipi/css/solaimanlipi.css',

], 'public/css/app.css');

/* Combine JS */
mix.combine([
    /* 'public/js/app.js', */
    'public/frontend/js/jquery.js',
    'public/frontend/js/bootstrap.min.js',
    // 'public/frontend/js/jquery.magnific-popup.min.js',
    'public/frontend/js/owl.carousel.min.js',
    'public/frontend/js/moment.min.js',
    'public/frontend/js/jquery.sticky-kit.min.js',
    'public/frontend/js/jquery.easy-ticker.min.js',
    'public/frontend/js/main.js',
    'public/frontend/js/switcher.js',
    'https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',

], 'public/js/app.js');

mix
    .js('resources/assets/js/tweets/index.js', 'public/js/modules/tweets.js')
;