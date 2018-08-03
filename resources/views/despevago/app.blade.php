<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Despevago - @yield('title')</title>
    <link rel="shortcut icon" href="{{{ asset('icon_dv.ico') }}}">
    <!--Font-awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/solid.css" integrity="sha384-TbilV5Lbhlwdyc4RuIV/JhD8NR+BfMrvz4BL5QFa2we1hQu6wvREr3v6XSRfCTRp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/brands.css" integrity="sha384-7xAnn7Zm3QC1jFjVc1A6v/toepoG3JXboQYzbM0jrPzou9OFXm/fY6Z/XiIebl/k" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/fontawesome.css" integrity="sha384-ozJwkrqb90Oa3ZNb+yKFW2lToAWYdTiF1vt8JiH5ptTGHTGcN7qdoR1F95e0kYyG" crossorigin="anonymous">
    <!-- Base css-->
    <link type="text/css" href={{ asset('css/bootstrap.min.css') }} rel="stylesheet">
    <link type="text/css" href={{ asset('css/mdb.min.css') }} rel="stylesheet">
    <link type="text/css" href={{ asset('css/style.css') }} rel="stylesheet">
</head>

<body>
    <!-- header -->
    @yield('headers')
    
    <!-- body -->
    @yield('content')
    
    <!-- footer -->
    @yield('footer')

    <script type="text/javascript" src={{ asset('js/jquery-3.3.1.min.js') }}></script>
    <script type="text/javascript" src={{ asset('js/popper.min.js') }}></script>
    <script type="text/javascript" src={{ asset('js/bootstrap.min.js') }}></script>
    <script type="text/javascript" src={{ asset('js/mdb.min.js') }}></script>

    @yield('script')

</body>