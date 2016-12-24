const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

var path = {
    js: {
        src: 'resources/assets/js',
        vendor: 'resources/assets/js/vendor',
        build: 'public/js'
    },
    img: {
        src: 'resources/assets/img',
        build: 'public/img'
    },
    css: {
        src: 'resources/assets/css',
        vendor: 'resources/assets/css/vendor',
        build: 'public/css'
    },
    npm: 'node_modules/'
};


elixir((mix) => {
    // Styles
    mix.sass('app.scss')
        .styles('vendor/*.css', path.css.build+'/scripts.css');

    // Scripts
    mix.webpack('app.js')
        .scripts('vendor/*.js', path.js.build+'/scripts.js');

    // Images
    mix.copy(path.img.src, path.img.build);
});