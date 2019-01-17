const mix = require('laravel-mix'), assetsDir = 'resources/', distDir = 'public/dist/';

mix.sass(assetsDir + 'scss/admin.scss', distDir + 'css/admin.css')
  .sass(assetsDir + 'scss/app.scss', distDir + 'css/app.css')
  .js(assetsDir + 'js/admin.js', distDir + 'js/admin.js')
  .js(assetsDir + 'js/app.js', distDir + 'js/app.js');

if (mix.inProduction()) {
  mix.version();
}
