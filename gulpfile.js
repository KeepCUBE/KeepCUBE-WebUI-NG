const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
  mix.sass('app.scss')
    /*.styles(['vendor/mdl.css', 'sass.css'], 'public/css/app.css')*/
/*
    .icons({
     iconsPath: "vendor/bower_dl/material-design-icons"
   })
*/
    .webpack('app.js')
    .copy([
      'vendor/bower_dl/material-design-icons/iconfont/material-icons.css'
    ], 'public/fonts/')
    .copy([
      'vendor/bower_dl/material-design-icons/iconfont/MaterialIcons-*.*'
    ], 'public/fonts/');
});