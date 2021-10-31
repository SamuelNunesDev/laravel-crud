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
    //site
mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.min.css',
    'resources/views/site/css/style.css',
], 'public/site/css/style.css')

    .scripts([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
        'resources/views/site/js/script.js',
        'resources/js/fontawesome.min.js'
    ], 'public/site/js/script.js')
    //layouts
    .styles([
        'node_modules/bootstrap/dist/css/bootstrap.min.css',
        'resources/views/layouts/css/style.css'
    ], 'public/layouts/css/style.css')
    
    .scripts([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
        'resources/js/fontawesome.min.js'
    ], 'public/layouts/js/script.js')
    //cruds
    .styles([
        'resources/views/cruds/css/datatables.min.css',
        'resources/views/cruds/css/buttons.bootstrap4.min.css',
        'resources/views/cruds/css/dataTables.bootstrap4.min.css'
    ], 'public/cruds/css/style.css')

    .scripts([
        'resources/views/cruds/js/datatables.min.js',
        'resources/views/cruds/js/jquery.dataTables.min.js',
        'resources/views/cruds/js/dataTables.bootstrap4.min.js',
        'resources/views/cruds/js/dataTables.buttons.min.js',
        'resources/views/cruds/js/jszip.min.js',
        'resources/views/cruds/js/pdfmake.min.js',
        'resources/views/cruds/js/vfs_fonts.js',
        'resources/views/cruds/js/buttons.html5.min.js',
        'resources/views/cruds/js/buttons.print.min.js',
        'resources/views/cruds/js/buttons.colVis.min.js',
    ], 'public/cruds/js/script.js')
    
    .version();
