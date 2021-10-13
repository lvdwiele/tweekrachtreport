<!doctype html>
<html lang="en">
<head>
    <title>Tweekracht | @yield('title')</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
</head>
<body>

<div id="app">
    <div class="container mt-3 min-vh-100">
        @yield('content')
    </div>
</div>

<script src="{{ asset('js/manifest.js') }}"></script>
<script src="{{ asset('js/vendor.js') }}"></script>
</body>
</html>
