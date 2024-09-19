

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

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="background-image: url('{{ asset("images/img_1.jpg") }}'); background-repeat: no-repeat; background-position: center; background-size: cover;">
    
    @include('layouts.navbar')
    <div class="container-fluid">
    @include('partials.flash')
    @include('partials.errors')
    <div class="row">
        <div class="col min-vh-100 p-4 d-flex align-items-center">
            @yield('content')
        </div>
    </div>
</div>
    
</body>
</html>
