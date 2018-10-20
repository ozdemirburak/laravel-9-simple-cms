const mix = require('laravel-mix'), assetsDir = 'resources/', distDir = 'public/dist/';

mix.sass(assetsDir + 'scss/admin.scss', distDir + 'css/admin.css')
  .sass(assetsDir + 'scss/application.scss', distDir + 'css/application.css')
  .js(assetsDir + 'js/admin.js', distDir + 'js/admin.js')
  .js(assetsDir + 'js/application.js', distDir + 'js/application.js');

if (mix.inProduction()) {
  mix.version();
}
