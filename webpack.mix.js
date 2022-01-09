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

mix.sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/auth.scss', 'public/css')
    .sass('resources/sass/pdf.scss', 'public/css');

mix.js('resources/js/app.js', 'public/js')
    .extract([
        'jquery',
        'bootstrap',
        'bootstrap-select'
    ]);

if (mix.inProduction()) {
    mix.version();
}
