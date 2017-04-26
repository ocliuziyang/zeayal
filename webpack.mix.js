const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');

mix.scripts([
    'resources/assets/js/vendor/gentelella/*.js',
    'public/assets/gentelella/vendors/fastclick/lib/fastclick.js',
    'public/assets/gentelella/vendors/nprogress/nprogress.js',
    'resources/assets/js/vendor/pnotify.custom.min.js',
    'node_modules/bootstrap-progressbar/bootstrap-progressbar.min.js'
], 'public/js/vendor.js');

mix.styles([
    'public/assets/gentelella/build/css/custom.css',
    'resources/assets/sass/css/pnotify.custom.min.css',
    'resources/assets/sass/css/pure-min.css',
    'node_modules/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css'
], 'public/css/vendor.css');

if (mix.config.inProduction) {
    mix.version();
}

mix.browserSync('zeayal.dev');