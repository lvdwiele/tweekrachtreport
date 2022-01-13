<!doctype html>
<html lang="en">
<head>
    <title>Tweekracht | @yield('title')</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" href="{{ asset('/images/favicon.png') }}">

    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    @livewireStyles
</head>
<body>

<div id="app">
    @include ('partials.sidebar')
    {{--    <layout-side-bar></layout-side-bar>--}}

    <div id="content">
        @include('partials.nav')

        <div class="container-fluid p-4">

            @include('partials.alerts')

            @yield('content')
        </div>
    </div>
</div>

@livewireScripts
<script src="{{ mix('/js/manifest.js') }}"></script>
<script src="{{ mix('/js/vendor.js') }}"></script>
<script src="{{ mix('/js/app.js') }}"></script>

@stack('scripts')

</body>
</html>
