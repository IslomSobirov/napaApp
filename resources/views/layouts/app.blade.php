<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('files/logo.png')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Napa Academy</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css", rel="stylesheet", integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN", crossorigin="anonymous">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container-fluid">
                @if(auth()->user())
                    @if(auth()->user()->isAdmin())
                    <a class="navbar-brand" href="{{ url('/admin') }}">
                        <img width="55px" height="42px" src="{{asset('files/logo.png')}}" alt="Logo">
                    </a>
                    @else
                        <a class="navbar-brand" href="{{ url('/home') }}">
                        <img width="55px" height="42px" src="{{asset('files/logo.png')}}" alt="Logo">
                    </a>
                    @endif
                @else
                    <a class="navbar-brand" href="{{ url('/login') }}">
                        <img width="55px" height="42px" src="{{asset('files/logo.png')}}" alt="Logo">
                    </a>
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a id="nav-item" class="nav-link" href="{{ route('login') }}">{{ __('Личный кабинет') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li id="nav-item" class="nav-item">
                                    <a id="nav-item" class="nav-link" href="{{ route('register') }}">{{ __('Зарегистрироваться') }}</a>
                                </li>
                            @endif
                        @else
                            @if(!auth()->user()->isAdmin())
                                <li class="nav-item">
                                    <a id="nav-item" class="nav-link" href="{{ route('home') }}">
                                        {{ __('Личный кабинет') }}
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a id="nav-item" class="nav-link" href="{{ route('admin') }}">
                                        {{ __('Все пользователи') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a id="nav-item" class="nav-link" href="/course">
                                        {{ __('Все курсы') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a id="nav-item" class="nav-link" href="/course/create">
                                        {{ __('Создать курс') }}
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a style="cursor:pointer;" id="nav-item" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Выйти из системы') }}
                                </a>
                            </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
