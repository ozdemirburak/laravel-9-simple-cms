var elixir = require('laravel-elixir'),
    bowerDir  = 'resources/assets/vendor/',
    adminCss = [
        'bootstrap/dist/css/bootstrap.min.css',
        'nestable-fork/dist/jquery.nestable.min.css',
        'mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css',
        'datatables/media/css/dataTables.bootstrap.min.css',
        'morris.js/morris.css',
        'admin.css'
    ],
    adminJs = [
        'jquery/dist/jquery.min.js',
        'nestable-fork/dist/jquery.nestable.min.js',
        'bootstrap/dist/js/bootstrap.min.js',
        'bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
        'mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js',
        'datatables/media/js/jquery.dataTables.min.js',
        'datatables/media/js/dataTables.bootstrap.min.js',
        'datatables-buttons/js/dataTables.buttons.js',
        'datatables-buttons/js/buttons.bootstrap.js',
        'morris.js/morris.js',
        'admin-lte/dist/js/app.min.js',
        '../js/admin.js',
    ],
    applicationCss = [
        'jquery-floating-social-share/dist/jquery.floating-social-share.min.css',
        'application.css'
    ],
    applicationJs = [
        'jquery/dist/jquery.min.js',
        'jquery-floating-social-share/dist/jquery.floating-social-share.min.js',
        'bootstrap/dist/js/bootstrap.min.js',
        'webfontloader/webfontloader.js',
        '../js/application.js',
    ];

elixir(function(mix) {
    mix
        .less('admin.less', bowerDir + 'admin.css')
        .styles(adminCss, 'public/css/admin.css', bowerDir)
        .scripts(adminJs, 'public/js/admin.js', bowerDir)
        .sass('admin-buttons.scss', 'public/css/admin-buttons.css')
        .copy('resources/assets/datatables/buttons.server-side.js', 'public/js/buttons.server-side.js')
        .copy(bowerDir + 'raphael/raphael.min.js', 'public/js/raphael.js')
        .copy(bowerDir + 'tinymce', 'public/packages/tinymce')
        .copy(bowerDir + 'tinymce-localautosave/localautosave', 'public/packages/tinymce/plugins/localautosave')
        .copy(bowerDir + 'font-awesome/fonts', 'public/build/fonts')
        .copy(bowerDir + 'bootstrap/fonts', 'public/build/fonts')
        .copy(bowerDir + 'mjolnic-bootstrap-colorpicker/dist/img/*', 'public/build/img')
        .less('application.less', bowerDir + 'application.css')
        .styles(applicationCss, 'public/css/application.css', bowerDir)
        .scripts(applicationJs, 'public/js/application.js', bowerDir)
        .version(['css/admin.css', 'css/application.css', 'js/admin.js', 'js/application.js']);
});
