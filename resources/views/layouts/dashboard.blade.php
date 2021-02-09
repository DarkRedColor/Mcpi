<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MCPI</title>

    <!-- Fonts -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>
</head>
@include('mcpi.includes.navbar')
<body>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-5 ml-sm-auto col-lg-11 pt-3 px-1">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
