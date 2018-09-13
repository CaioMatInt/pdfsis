<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('pageTitle') - {{ config('app.name') }}</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/css/AdminLTE.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/css/skins/skin-blue.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/css/main.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" rel="stylesheet">
    @yield('head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('dashboard.inc.header')

    @include('dashboard.inc.sidebar')

    @yield('content')

    @include('dashboard.inc.footer')

</div>
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/adminlte.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/main.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/functions.js') }}"></script>
@yield('scripts')
</body>
</html>
