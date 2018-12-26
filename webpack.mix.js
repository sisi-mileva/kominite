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

mix.scripts(['node_modules/slick-carousel/slick/slick.min.js'], 'public/js/libs.js')
  .scripts(['resources/assets/js/slider.js'], 'public/js/all.js')
  .styles([
    'node_modules/slick-carousel/slick/slick.css'
  ], 'public/css/libs.css')
  .sass('resources/assets/sass/app.scss', 'public/css')
  .options({
    processCssUrls: false
  })
  .sass('resources/assets/sass/admin.scss', 'public/css');
