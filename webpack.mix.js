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

mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.min.css',
    'resources/views/site/css/style.css'
], 'public/site/css/style.css')

    .scripts([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
        'resources/views/site/js/script.js'
    ], 'public/site/js/script.js')

    .version();
