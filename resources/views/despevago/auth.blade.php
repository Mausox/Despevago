<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Despevago - @yield('title')</title>
    <link rel="shortcut icon" href="{{{ asset('favicon_dgo.ico') }}}">
        <!-- Base css-->
    <link type="text/css" href={{ asset('css/bootstrap.min.css') }} rel="stylesheet">
    <link type="text/css" href={{ asset('css/mdb.min.css') }} rel="stylesheet">
    <link type="text/css" href={{ asset('css/style.css') }} rel="stylesheet">
</head>

<body>
    <div class="container">
        <a href="{{ url('/') }}">
            <img src={{ asset('img/logo/logo_header.png') }} class="img-fluid mx-auto d-block mt-3 mb-3" width="200px" alt="Despevago">
        </a>
    </div>
    @yield('content')

    <!-- SCRIPTS -->
    <script type="text/javascript" src={{ asset('js/jquery-3.3.1.min.js') }}></script>
    <script type="text/javascript" src={{ asset('js/popper.min.js') }}></script>
    <script type="text/javascript" src={{ asset('js/bootstrap.min.js') }}></script>
    <script type="text/javascript" src={{ asset('js/mdb.min.js') }}></script>

    @yield('script')

</body>

</html>
