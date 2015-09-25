var elixir = require('laravel-elixir');

var bowerDir  = 'resources/assets/vendor/';

var adminLess  = [
    bowerDir + 'admin-lte/build/less',
    bowerDir + 'bootstrap-datepicker/less',
    bowerDir + 'font-awesome/less',
];

var adminCss = [
    'bootstrap/dist/css/bootstrap.min.css',
    'nestable-fork/dist/jquery.nestable.min.css',
    'admin.css',
    'mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css',
    'datatables-bootstrap3/BS3/assets/css/datatables.css',
    'morris.js/morris.css',
    'admin-lte/dist/css/skins/skin-blue.min.css'
];

var adminJs = [
    'jquery/dist/jquery.min.js',
    'nestable-fork/dist/jquery.nestable.min.js',
    'bootstrap/dist/js/bootstrap.min.js',
    'bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
    'mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js',
    'datatables/media/js/jquery.dataTables.js',
    'datatables-bootstrap3/BS3/assets/js/datatables.js',
    'morris.js/morris.js',
    'admin-lte/dist/js/app.min.js'
];

var applicationLess  = [
    bowerDir + 'font-awesome/less'
];

var applicationCss = [
    'bootstrap/dist/css/bootstrap.min.css',
    'jquery-floating-social-share/dist/css/jquery.floating-social-share.min.css',
    'application.css',
];

var applicationJs = [
    'jquery/dist/jquery.min.js',
    'jquery-floating-social-share/dist/js/jquery.floating-social-share.min.js',
    'bootstrap/dist/js/bootstrap.min.js',
];

elixir(function(mix) {
    mix
        .less('admin.less', bowerDir + 'admin.css', { paths: adminLess })
        .styles(adminCss, 'public/css/admin.css', bowerDir)
        .scripts(adminJs, 'public/js/admin.js', bowerDir)
        .copy('resources/assets/js/admin.js', 'public/js/admin-custom.js')
        .copy('resources/assets/vendor/raphael/raphael-min.js', 'public/js/raphael.js')
        .copy(bowerDir + 'tinymce', 'public/packages/tinymce')
        .copy(bowerDir + 'tinymce-localautosave/localautosave', 'public/packages/tinymce/plugins/localautosave')
        .copy(bowerDir + 'font-awesome/fonts', 'public/build/fonts')
        .copy(bowerDir + 'bootstrap/fonts', 'public/build/fonts')
        .copy(bowerDir + 'mjolnic-bootstrap-colorpicker/dist/img/*', 'public/build/img')
        .less('application.less', bowerDir + 'application.css', { paths: applicationLess })
        .styles(applicationCss, 'public/css/application.css', bowerDir)
        .scripts(applicationJs, 'public/js/application.js', bowerDir)
        .copy('resources/assets/js/application.js', 'public/js/application-custom.js')
        .version(['css/admin.css', 'css/application.css', 'js/admin.js', 'js/application.js']);
});
