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
    'public/js/app.js',
    'public/assets/gentelella/build/js/custom.min.js',
    'public/assets/gentelella/vendors/fastclick/lib/fastclick.js',
    'public/assets/gentelella/vendors/nprogress/nprogress.js'
], 'public/js/app_all.js');

mix.styles([
    'public/css/app.css',
    'public/assets/gentelella/build/css/custom.css'
], 'public/css/app_all.css');

mix.browserSync('zeayal.dev');