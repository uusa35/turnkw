<html>
<head>
    <meta charset="UTF-8">
    <title>
        @yield('title')
    </title>
    @section('styles')
        @include('styles.stylesheets')
    @show
</head>
<body>

<div id="wrapper">
    @yield('body')
</div>
@section('scripts')
    @include('scripts.allscripts')
@show
</body>
</html>