<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','保險業務媒合平台')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS only -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <!-- JS, Popper.js, and jQuery -->
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100&display=swap" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/storage/icofont/icofont.min.css">
    @yield('head')
</head>

<body>

    <header id="header" class="">
        <div class="container-fluid">
            <div class="col-lg-11 mx-auto">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <h1 class="logo mr-auto"><a href="/">保險媒合平台</a></h1>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse text-right" id="navbarNav">
                        <ul class="navbar-nav nav-menu ml-auto">
                            <li class="nav-item"> <a class="nav-link" href="/analyze">風險分析</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="/sales/index/1">找業務員</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="/sales/index/2">車禍處理專區</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="/forum">討論區</a> </li>
                            @guest
                                <li class="nav-item nav-item-green px-2"> <a class="nav-link" href="/login">登入</a> </li>
                            @endguest
                            @auth
                                <li class="nav-item nav-item-green"> <a class="nav-link" href="/home">後台管理</a></li>
                            @endauth
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <main class="py-4" style="min-height: 65vh">
        @yield('content')
    </main>
    <footer class="border-top pt-3 mt-3">

        <div class="container">
            <div class="row">
                <div class="col-8 col-lg-3 col-md-4">
                    <h3 class="logo">保險媒合平台</h3>
                </div>
                <div class="col-4 col-lg-3 col-md-4">
                    <img src="/storage/img/qrcode.png"/>
                </div>
                <div class="col-12 col-lg-3 col-md-4 my-3 my-md-0 footer-links d-flex align-items-center">
                    <ul>
                        <li><i class="ion-ios-arrow-right"></i> <a href="/analyze">風險分析</a></li>
                        <li><i class="ion-ios-arrow-right"></i> <a href="/sales/index/1">找業務員</a></li>
                        <li><i class="ion-ios-arrow-right"></i> <a href="/sales/index/2">車禍處理專區</a></li>
                        <li><i class="ion-ios-arrow-right"></i> <a href="/forum">討論區</a></li>
                    </ul>
                </div>
                <div class="col-12 col-lg-3 col-md-4 footer-contact ">
                    <p>
                        <strong>聯絡我們</strong>
                    </p>
                    <p>
                        0800-000-000 <br>
                        {{ env('MAIL_USERNAME') }}
                    </p>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row d-flex justify-content-center copyright">
                <span>{{ env('APP_NAME') }}©2020</span>
            </div>
        </div>
    </footer>
</body>
</html>