const mix = require('laravel-mix');

const assetsDir = 'resources/';
const distDir = 'public/dist/';

mix.options({ terser: { extractComments: false }});

mix.sass(assetsDir + 'scss/admin.scss', distDir + 'css/admin.css')
  .sass(assetsDir + 'scss/app.scss', distDir + 'css/app.css')
  .js(assetsDir + 'js/admin.js', distDir + 'js/admin.js')
  .js(assetsDir + 'js/app.js', distDir + 'js/app.js');

if (mix.inProduction()) {
  mix.version();
}
