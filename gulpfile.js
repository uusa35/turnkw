var elixir = require('laravel-elixir');

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

elixir(function (mix) {
    /*
     * sass
     * */
    mix.sass('app.scss');
    /*
     * styles
     * */
    mix.styles([

        '../../../bower_components/flatly-sb-admin/css/bootstrap.min.css',
        '../../../bower_components/flatly-sb-admin/css/sb-admin.css',
        '../../../bower_components/datatables-bootstrap3/BS3/assets/css/datatables.css',
        '../../../bower_components/dropzone/dist/min/dropzone.min.css',
        '../../../bower_components/metisMenu/dist/metisMenu.min.css',
        'custom.css'
    ], 'public/css/all.css');
    mix.styles([
        '../../../bower_components/bootstrap-rtl/dist/css/bootstrap-rtl.min.css',
        '../../../bower_components/bootstrap-rtl/dist/css/bootstrap-flipped.css'
    ], 'public/css/app-rtl.css');
    /*
     * scripts
     * */
    mix.scripts([
        '../../bower_components/jquery/dist/jquery.min.js',
        '../../bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js',
        '../../bower_components/datatables-bootstrap3/BS3/assets/js/datatables.js',
        '../../bower_components/metisMenu/dist/metisMenu.min.js',
        '../../bower_components/dropzone/dist/min/dropzone.min.js',
        '../../bower_components/flatly-sb-admin/js/sb-admin.js',
        '../../bower_components/flatly-sb-admin/js/sb-admin-module.js',
        //'../../bower_components/flatly-sb-admin/js/sb-flot-module.js',
        //'../../bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js',
        '../../bower_components/tinymce/themes/modern/theme.min.js',
        '../../bower_components/raphael/raphael-min.js',
        'js/custom.js'
    ], 'public/js/app.js', 'resources/assets/', './');
    mix.scripts([
        '../../bower_components/tinymce/tinymce.min.js',
        '../../bower_components/tinymce/tinymce.jquery.min.js',
        '../../bower_components/tinymce/plugins/template/plugin.min.js'
    ],'public/js/tinymce.js', 'resources/assets/', './');
    /*
     * copy
     * */
    mix.copy(['./bower_components/datatables-bootstrap3/BS3/assets/images/'], 'public/images');
    mix.copy(['./bower_components/font-awesome/fonts/'], 'public/fonts');
    mix.copy(['./bower_components/bootstrap-sass/assets/fonts/*'], 'public/fonts');
    mix.copy(['./bower_components/tinymce/plugins'], 'public/js/plugins');
    mix.copy(['./bower_components/tinymce/themes'], 'public/js/themes');
    /*
     * version
     * */
    mix.version([
        'public/css/all.css',
        'public/css/app.css',
        'public/css/app-rtl.css',
        'public/js/app.js'
    ]);
});
