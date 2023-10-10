<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    {{--resources/assets/images/logo/logo-with-title.svg.--}}
    <!-- Scripts -->
    @vite([ 'resources/assets/js/app.js'])
</head>
<body>

<div class="container" id="app">
    <div class="row mt-5">
        <div class="col-md-12">

            <example-component>
            </example-component>
        </div>
    </div>
</div>

</body>
</html>
