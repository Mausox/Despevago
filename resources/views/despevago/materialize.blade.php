<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title') - Despevago</title>
        <link rel="shortcut icon" href="{{{ asset('icon_dv.ico') }}}">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="{{ asset('materialize/css/materialize.min.css') }}"  media="screen,projection"/>
        <link type="text/css" href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('css/viewStyle.css') }}" rel="stylesheet">

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <!-- header -->
        @yield('header')
        
        <!-- body -->
        @yield('content')
        
        <!-- footer -->
        @yield('footer')
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src={{ asset('js/jquery-3.3.1.min.js') }}></script>
        <script type="text/javascript" src={{ asset('materialize/js/materialize.min.js') }}></script>
        <script>$(document).ready(function()
        {
            $('.sidenav').sidenav();
            $('.materialert').delay(5000).fadeOut(400);
        });</script>
        @yield('script')
    </body>
  </html>