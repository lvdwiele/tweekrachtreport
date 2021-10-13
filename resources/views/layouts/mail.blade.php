<!doctype html>
<html lang="en">
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container-fluid">
    <img class="mx-auto mt-3" src="{{ asset('images/regilogo.png') }}" style="max-height: 50px;" alt="Tweekracht Logo">
    <div class="row mt-3">
        <div class="col-4 offset-4">
            <div class="panel bg-white p-4 shadow-sm">
                @yield('content')
            </div>
        </div>
    </div>
</div>
</body>
</html>
