@include('styles.fonts')
<style type="text/css">
    html, body, h1, h2, h3, h4, h5, span, p, div, table, a, input, .tooltip, tr, td, ul, row {
        font-family: 'Droid Arabic Kufi', 'Ubuntu' !important;
    }
</style>
<link rel="stylesheet" href="{{ elixir("css/app.css") }}">
<link rel="stylesheet" href="{{ elixir("css/all.css") }}">
@if(App::getLocale('app.locale') == 'ar')
    <link rel="stylesheet" href="/css/app-rtl.css">
    <style type="text/css">
        #page-wrapper {
            margin: 0 250 0 0px !important;
        }
    </style>
@endif



