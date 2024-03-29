const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/main.js', 'public/js')
    .js('resources/js/analyze.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .copy('resources/sass/style.css', 'public/css')
    .copy('resources/sass/login.css', 'public/css')
    .copy('resources/sass/forum.css', 'public/css')
    .copy('resources/sass/analyze.css', 'public/css');

