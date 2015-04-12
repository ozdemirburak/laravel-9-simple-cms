var elixir = require('laravel-elixir');

var bowerDir  = './resources/assets/vendor/';

var adminLess  = [
    bowerDir + 'admin-lte/build/less',
    bowerDir + 'bootstrap-datepicker/less',
    bowerDir + 'font-awesome/less',
];

var adminCss = [
    'bootstrap/dist/css/bootstrap.min.css',
    'admin.css',
    'select2/select2.css',
    'select2-bootstrap-css/select2-bootstrap.css',
    'mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css',
    'datatables-bootstrap3/BS3/assets/css/datatables.css',
    'admin-lte/dist/css/skins/skin-blue.min.css'
];

var adminJs = [
    'jquery/dist/jquery.min.js',
    'bootstrap/dist/js/bootstrap.min.js',
    'bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
    'mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js',
    'datatables/media/js/jquery.dataTables.js',
    'datatables-bootstrap3/BS3/assets/js/datatables.js',
    'select2/select2.min.js',
    'admin-lte/dist/js/app.min.js'
];

elixir(function(mix) {
    mix.less('admin.less', bowerDir, { paths: adminLess })
        .styles(adminCss, 'public/css/admin.css', bowerDir)
        .scripts(adminJs, 'public/js/admin.js', bowerDir)
        .version(['css/admin.css', 'js/admin.js'])
        .copy('resources/assets/js/admin.js', 'public/js/admin-custom.js')
        .copy('resources/assets/js/application.js', 'public/js/application-custom.js')
        .copy(bowerDir + 'tinymce', 'public/packages/tinymce')
        .copy(bowerDir + 'font-awesome/fonts', 'public/build/fonts')
        .copy(bowerDir + 'bootstrap/fonts', 'public/build/fonts')
        .copy(bowerDir + 'mjolnic-bootstrap-colorpicker/dist/img', 'public/build/img')
        .copy(bowerDir + 'datatables/media/images/*.png', 'public/build/images')
        .copy(bowerDir + 'mjolnic-bootstrap-colorpicker/dist/img/bootstrap-colorpicker/*.png', 'public/build/img')
        .copy(bowerDir + 'select2/*.png', 'public/css')
    ;
});