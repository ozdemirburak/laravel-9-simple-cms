var mix             =  require('laravel-mix'),
  copyWebpackPlugin = require('copy-webpack-plugin'),
  assetsDir         = 'resources/assets/',
  nodeDir           = 'node_modules/',
  publicDir         = 'public/',
  distDir           = 'public/dist/',
  adminJs = [
    nodeDir   + 'jquery/dist/jquery.min.js',
    nodeDir   + 'moment/moment.js',
    nodeDir   + 'moment/min/locales.js',
    nodeDir   + 'bootstrap/dist/js/bootstrap.min.js',
    nodeDir   + 'eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
    nodeDir   + 'select2/dist/js/select2.min.js',
    nodeDir   + 'select2/dist/js/i18n/tr.js',
    nodeDir   + 'datatables.net/js/jquery.dataTables.js',
    nodeDir   + 'datatables.net-bs/js/dataTables.bootstrap.js',
    nodeDir   + 'datatables.net-buttons/js/dataTables.buttons.js',
    nodeDir   + 'morris.js/morris.js',
    nodeDir   + 'admin-lte/dist/js/app.min.js',
    nodeDir   + 'raphael/raphael.min.js',
    nodeDir   + 'nestable-fork/dist/jquery.nestable.min.js',
    assetsDir + 'other/datatables/buttons.server-side.js',
    assetsDir + 'js/admin.js'
  ],
  applicationJs = [
    assetsDir + 'js/application.js',
    nodeDir   + 'jquery-floating-social-share/dist/jquery.floating-social-share.min.js',
  ];

// If you try to do it with the Laravel Mix's copy function then,
// you will end up with all tinymce files stored within a folder where plugins will fail
// https://stackoverflow.com/questions/30522896/how-to-shim-tinymce-in-webpack
mix.webpackConfig({
  plugins: [
    new copyWebpackPlugin([
      { from: nodeDir    + 'tinymce', to: 'packages/tinymce' },
      { from: assetsDir  + 'other/tinymce-localautosave', to: 'packages/tinymce/plugins/localautosave' },
    ])
  ]
});

mix
  .copy(nodeDir   + 'font-awesome/fonts', publicDir + 'fonts')
  .less(assetsDir + 'less/admin.less', distDir + 'css/admin.css').version()
  .less(assetsDir + 'less/application.less', distDir + 'css/application.css').version()
  .combine(adminJs, distDir + 'js/admin.js')
  .js(applicationJs, distDir +'js/application.js').version();
