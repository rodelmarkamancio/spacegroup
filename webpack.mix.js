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

// front end
mix.combine([
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js',
    'node_modules/fullpage.js/dist/jquery.fullpage.min.js',
    // 'node_modules/angular/angular.min.js',
    // 'node_modules/angular-resource/angular-resource.min.js',
    // 'node_modules/angular-sanitize/angular-sanitize.min.js',
    // 'node_modules/angular-ui-router/release/angular-ui-router.min.js',

    // functionality
    'resources/assets/js/components/snap.svg-min.js',
    'resources/assets/js/components/classie.js',
    'resources/assets/js/functions/home.js',
    'resources/assets/js/functions/menu.js',
], 'public/js/app.js');

// admin
mix.combine([
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js',

    'resources/assets/js/vendor/tether/tether.min.js',
    'resources/assets/js/vendor/chart.js/Chart.min.js',
    'resources/assets/js/vendor/datatables/jquery.dataTables.min.js',
    'resources/assets/js/vendor/datatables/dataTables.bootstrap4.min.js',
    'resources/assets/js/functions/sb-admin.js',
], 'public/js/admin.js');

mix.sass('resources/assets/sass/app.scss', 'public/css');
mix.sass('resources/assets/sass/admin.scss', 'public/css');
