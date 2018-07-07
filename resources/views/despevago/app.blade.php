<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Despevago - @yield('title')</title>
    <!-- Font Awesome -->
    <link type="text/css" href={{ asset('css/font-awesome.min.css') }} rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link type="text/css" href={{ asset('css/bootstrap.min.css') }} rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link type="text/css" href={{ asset('css/mdb.min.css') }} rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link type="text/css" href={{ asset('css/style.css') }} rel="stylesheet">
</head>

<body>
    <!-- header -->
    @yield('content')
    <!-- footer -->
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src={{ asset('js/jquery-3.3.1.min.js') }}></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src={{ asset('js/popper.min.js') }}></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src={{ asset('js/bootstrap.min.js') }}></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src={{ asset('js/mdb.min.js') }}></script>

    @yield('script')

</body>