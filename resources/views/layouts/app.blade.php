<!DOCTYPE html class="h-100">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
</head>
<body class="h-100">
    <div id="app" class="h-100">

        <b-navbar toggleable="lg" type="light" variant="light">
            <b-container>
                <b-navbar-brand href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </b-navbar-brand>
                
                <b-navbar-toggle target="nav_text_collapse"></b-navbar-toggle>

                <b-collapse is-nav id="nav_text_collapse">
                    <b-navbar-nav class="ml-auto">
                        @guest
                            <b-nav-item href="{{ route('login') }}">{{ __('Login') }}</b-nav-item>
                            @if (Route::has('register'))
                                <b-nav-item href="{{ route('register') }}">{{ __('Register') }}</b-nav-item>
                            @endif
                        @else
                            <b-nav-item-dropdown text="{{ Auth::user()->name }}" right>
                                <b-dropdown-item href="{{ url('/profile') }}">
                                    {{ __('Account') }}
                                </b-dropdown-item>
                                <b-dropdown-item href="JavaScript:;" @click="logout">
                                    {{ __('Logout') }}
                                </b-dropdown-item>
                            </b-nav-item-dropdown>
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                            </form>
                        @endguest
                    </b-navbar-nav>
                </b-collapse>
            </b-container>
        </b-navbar>

        <main class="py-0" class="h-100">
            @yield('content')
        </main>
    </div>
</body>
</html>
