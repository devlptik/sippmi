<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title') }}</title>
    <link href="{{asset('css/style.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendors/pace-progress/css/pace.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"/>
    @yield('styles')
</head>

<body class="c-app flex-row align-items-center  pace-done">
<div class="container">
    @yield("content")
</div>
@yield('scripts')
</body>

</html>
