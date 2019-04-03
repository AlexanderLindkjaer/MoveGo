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

<body class="bg-sitebackground">

<!-- Navigation -->
<nav class="navbar navbar-light static-top bg-dark">
    <div class="container">
        <div><a class="navbar-brand text-white" href="/"><img src="/logo/logo_white.png" height="40px" alt=""></a></div>
        <div>
            <h6 class="mb-0 d-inline-block ml-4"><a class=" text-white mb-0 d-inline-block" href="{{ route('concept') }}">Koncept</a></h6>
            <h6 class="mb-0 d-inline-block ml-4"><a class=" text-white mb-0 d-inline-block" href="{{ route('create-event') }}">Opret aktivitet</a></h6>
            @auth
                <h6 class="mb-0 d-inline-block ml-4"><a class=" text-white mb-0 d-inline-block" href="{{ route('my-feed') }}">Mine aktiviteter</a></h6>
            @endauth
            <div class="d-inline-block ml-4 navbar-nav text-white">
                <!-- Authentication Links -->
                @guest
                    <p class="nav-item d-inline-block">
                        <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </p>
                    <p class="nav-item d-inline-block ml-4">
                        @if (Route::has('register'))
                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </p>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            @if(auth()->user()->is_admin)
                                <a class="dropdown-item" href="/admin">
                                    Admin
                                </a>
                            @endif

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </div>
        </div>

    </div>
</nav>

<div id="app">
    @yield('content')
</div>

    @include('layout.footer')





<!-- Bootstrap core JavaScript -->
<script src="{{ mix('/js/app.js') }}"></script>


</body>

</html>
