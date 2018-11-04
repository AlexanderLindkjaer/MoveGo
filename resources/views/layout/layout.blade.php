<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SimplyJob') }}</title>

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">


    <!-- FAV -->
    <link rel="icon" href="/img/brand/icon-round.png" sizes="32x32"/>
    <link rel="icon" href="/img/brand/icon-round.png" sizes="192x192"/>
    <link rel="apple-touch-icon-precomposed" href="/img/brand/icon_round.png"/>

    @yield('head')
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-light static-top bg-blue">
    <div class="container">
        <a class="navbar-brand text-white" href="{{ route('home') }}">MoveGo</a>
        <a class="btn bg-orange text-white" href="{{ route('create-event') }}">Opret aktivitet</a>
    </div>
</nav>

<div id="app">
    @yield('content')
</div>

    {{--@include('layout.footer')--}}





<!-- Bootstrap core JavaScript -->
<script src="{{ mix('/js/app.js') }}"></script>
{{--<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>--}}

</body>

</html>
