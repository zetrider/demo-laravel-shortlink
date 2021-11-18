const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
    mix.version();
}

