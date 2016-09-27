const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

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
    // combine css files
    mix.styles([
        './vendor/twbs/bootstrap/dist/css/bootstrap.css'
    ], 'public/css/all.css');

    // combine js files
    mix.scripts([
        './vendor/components/jquery/jquery.js',
        'scripts.js'
    ], 'public/js/all.js');

    // add version to combined files (for cache busting)
    mix.version(['css/all.css', 'js/all.js']);
});
