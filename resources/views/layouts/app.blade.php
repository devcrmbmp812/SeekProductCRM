<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SeekProduct') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <link rel="icon" type="image/png" href="{{ asset('img/favicon/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon/android-chrome-192x192.png') }}" sizes="192x192">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon/favicon-96x96.png') }}" sizes="96x96">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon/favicon-16x16.png') }}" sizes="16x16">
    <link rel="manifest" href="{{ asset('img/favicon/manifest.json') }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon/favicon.ico') }}">
    <link href="{{asset('css/bootstrap.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('css/fonts/fonts.css')}}" type="text/css" rel="stylesheet">
    {{--<link rel="stylesheet" href="{{asset('css/landio.min.css') }}">--}}
    <!--phone picker-->
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="{{asset('phone_picker/js/jquery.ccpicker.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('phone_picker/css/jquery.ccpicker.css')}}">
    <!--date picker-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
</head>
<body>
    @include('layouts.navbar')
    @yield('content')
    @include('layouts.footer')
</body>
</html>