<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Laravel</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="{{asset('/css/app.css')}}">
    </head>
    <body>
        <div id="wrapper">
            <example-component></example-component>
            <show-list-products></show-list-products>
        </div>
        <script src="{{asset('/js/app.js')}}"></script>
    </body>
</html>