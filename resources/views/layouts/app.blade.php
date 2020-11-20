<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script>
        if(performance.navigation.type == 2){
            location.reload(true);
        }
    </script>
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* .link-btn:hover{
            background-color: #28a745;
            color: #fff;
            cursor: pointer;
        } */
        .link-btn-group, .link-btn-group button, .link-btn-group div{
            padding: 0px;
        }
        .link-btn:disabled:hover{
            cursor: not-allowed;
        }
        .link-btn, .link-btn:disabled:hover {
            font-family: "Montserrat", sans-serif;
            font-weight: 500;
            font-size: 16px;
            letter-spacing: 1px;
            display: inline-block;
            padding: 8px 32px;
            border-radius: 50px;
            margin: 10px;
            color: #fff;
            background: #28a745;
            border-top: 0px;
            border-bottom: 0px;
        }
        .link-btn-full, .link-btn, .link-btn-grid{
            transition: 0.5s;
        }
        .link-btn, .link-btn-grid{
            border-top: 0px;
            border-bottom: 0px;
        }
        .link-btn:enabled:hover {
            background: #fff;
            color: #28a745;
            cursor: pointer;
        }
        .link-btn-full:hover, .link-btn-grid:hover{
            background: #28a745;
            color: #fff;
            cursor: pointer;
        }

        .link-btn-secondary:hover{
            background: gray;
            color: #fff;
        }
        
        .card, .card .list-group{
            height: 100%;
        }
        .card .list-group-item{
            border-top-width: 1px;
            border-right-width: 0px;
            border-bottom-width: 0px;
            border-left-width: 0px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"></li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->chinese_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/">
                                        首頁
                                    </a>
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        管理介面
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        登出
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
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
