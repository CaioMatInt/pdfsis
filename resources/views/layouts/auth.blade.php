<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/css/AdminLTE.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/css/skins/skin-blue.css') }}" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div id="app">
    @yield('content')
</div>
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
