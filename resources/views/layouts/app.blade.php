<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/a4dbcba341.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <header>
            <nav class="py-2 bg-white" id='navbar'>
                <div class="container d-flex justify-content-between align-items-baseline">
                    <a class="logo" href="{{ url('/') }}">
                        Chimmi
                    </a>

                    <div>
                        <ul class="d-flex nav ">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="{{ Request::is('login') ? 'nav-link px-2 active' : 'nav-link px-2'}}" href="{{ route('login') }}">{{ __('Sign in') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{ Request::is('register') ? 'nav-link px-2 active' : 'nav-link px-2'}}" href="{{ route('register') }}">{{ __('Sign up') }}</a>
                            </li>
                            @endguest

                            @auth
                            <li class="nav-item">
                                <a href="{{ url('/') }}" class="{{ Request::is('/') ? 'nav-link px-2 active' : 'nav-link px-2'}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/editor') }}" class="{{ Request::is('editor') ? 'nav-link px-2 active' : 'nav-link px-2'}}"><i class="far fa-edit"></i> New Article</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/setting') }}" class="{{ Request::is('setting') ? 'nav-link px-2 active' : 'nav-link px-2'}}"><i class="fas fa-cog"></i> Setting</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-2" href="/profile/{{ Auth::user()->username }}" role="button">
                                    {{ Auth::user()->username }}
                                </a>
                            </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main class="bg-white">
            @yield('content')
        </main>

        <footer>footer</footer>
    </div>
</body>

</html>