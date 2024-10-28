<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Otrixcommerce Laravel') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('assets') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Extra details for Live View on GitHub Pages -->
        <!-- Icons -->
        <link href="{{ asset('assets') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('assets') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('assets') }}/css/otrixweb.css?v=1.0.0" rel="stylesheet">

        <!-- css -->
        <!-- <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/slick-theme.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/slick.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/animate.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/jquery.mCustomScrollbar.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/common.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/menu.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/proctuct.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/home.css"> -->

    </head>
    <body class="{{ $class ?? '' }}">

            @yield('content')

        <script src="{{ asset('assets') }}/vendor/jquery/dist/jquery.min.js"></script>
        <!-- <script src="{{ asset('assets') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->

        @stack('js')

        <!-- Argon JS -->
        <script src="{{ asset('assets') }}/js/otrixweb.js?v=1.0.0"></script>
        <!-- <script type="text/javascript" src="{{ asset('frontend') }}/js/jquery.js"></script> -->

    </body>
</html>
