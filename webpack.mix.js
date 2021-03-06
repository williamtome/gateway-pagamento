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

mix.styles('node_modules/bootstrap/dist/css/bootstrap.min.css', 'public/css/bootstrap.min.css')
    .scripts('node_modules/jquery/dist/jquery.min.js', 'public/js/jquery.min.js')
    .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', 'public/js/bootstrap.min.js')
    .scripts('node_modules/cleave.js/dist/cleave.min.js', 'public/js/cleave.min.js')
    .scripts('node_modules/cleave.js/dist/addons/cleave-phone.br.js', 'public/js/cleave-phone.br.js')
    .scripts('node_modules/axios/dist/axios.min.js', 'public/js/axios.min.js');
