<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>討論區</title>

    <!-- CSS only -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- JS, Popper.js, and jQuery -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100&display=swap" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/forum.css" rel="stylesheet">
    <link rel="stylesheet" href="/storage/icofont/icofont.min.css">
    <script src="https://kit.fontawesome.com/bb7611bdad.js" crossorigin="anonymous"></script>
</head>

<body>

    <header class="sticky-top">

        <div id="header" class="container-fluid">
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

        <div id="search-bar" class="container-fluid py-3">
            <div class="container sticky-top">
                <form action="/questions/index" method="get">
                    <div class="form-row">
                        <div class="col-lg-2 col-3">
                            <select class="custom-select form-control" name="type" id="type">
                                <option value="all">所有分類</option>
                                @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type-> name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2 col-3">
                            <select class="custom-select form-control" id="order" name="order">
                                <option value="1">最新發問</option>
                                <option value="2">最舊發問</option>
                                <option value="3">最近更新</option>
                                <option value="4">最多觀看</option>
                            </select>
                        </div>
                        <div class="col-lg-6 col-6 input-group">
                            <input type="text" class="form-control" id="search_title" name="search_title"
                                placeholder="搜尋問題 ...">
                            <div class="input-group-append">
                                <button id="search-button" type="submit" class="btn form-control">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                </form>
                <div class="col-lg-1 col-6 mt-2 mt-lg-0">
                    <a class="form-control btn btn-success f-btn" href="/questions/create">我要發文</a>
                </div>
                <div class="col-lg-1 col-6 mt-2 mt-lg-0">
                    <a class="form-control btn btn-outline-success f-btn" href="/questions/indexSelf">我的貼文</a>
                </div>

            </div>
            </form>
        </div>
        </div>

    </header>



    <div class="container">
        <div id="forum" class="my-3 pb-3 pl-3 pr-3 bg-white rounded shadow">
            @foreach($questions as $question)
            <div class="d-flex flex-column p-3" style="transform: rotate(0);">
                <a href="/questions/{{$question->id}}" class="stretched-link"></a>
                <div>
                    <img class="rounded-circle m-1" src="/storage/img/user/{{ $question->user->img }}" style="height:40px;width:40px">
                    <span class="mr-auto">{{ $question-> user -> chinese_name}}</span>

                </div>
                <div class="d-flex">
                    <h3>{{ $question-> title}}</h3>
                    <p class="ml-2">
                        @if($question->answer == null)
                        <i class="badge badge-danger">未解決</i>
                        @else
                        <i class="badge badge-success">已解決</i>
                        @endif
                    </p>
                </div>


                <p>{{ $question-> content}}</p>
                <div class="d-flex justify-content-between">
                    <div class="mr-auto">
                        @foreach($question->questionTypes as $question_type)
                        <a href="#" class="badge badge-secondary">{{ $question_type-> type -> name}}</a>
                        @endforeach
                    </div>
                    <small class="p-1">評價<span class="p-1">{{ $question-> votes() -> sum('count')}}</span> </small>
                    <small class="p-1">回答<span class="p-1">{{ $question-> answers() -> count()}}</span> </small>
                    <small class="p-1">觀看數<span class="p-1">{{ $question->viewCount}}</span> </small>
                    <small class="p-1">{{ $question-> created_at}}</small>
                </div>
            </div>
            @endforeach
        </div>

    </div>


    <footer class="border-top pt-3 mt-3">

        <div class="container">
            <div class="row">

                <div class="col-12 col-lg-6 col-md-4">
                    <h3 class="logo">保險媒合平台</h3>
                </div>
                <div class="col-12 col-lg-3 col-md-4 my-3 my-md-0 footer-links d-flex align-items-center">
                    <ul>
                        <li><i class="ion-ios-arrow-right"></i> <a href="#">風險分析</a></li>
                        <li><i class="ion-ios-arrow-right"></i> <a href="#">找業務員</a></li>
                        <li><i class="ion-ios-arrow-right"></i> <a href="#">車禍處理專區</a></li>
                        <li><i class="ion-ios-arrow-right"></i> <a href="#">討論區</a></li>
                    </ul>
                </div>
                <div class="col-12 col-lg-3 col-md-4 footer-contact ">
                    <p>
                        <strong>聯絡我們</strong>
                    </p>
                    <p>
                        0800-000-000 <br>
                        support@mail.com
                    </p>
                </div>
            </div>
        </div>



        <div class="container-fluid">
            <div class="row d-flex justify-content-center copyright">
                <span>MIS department©2020</span>
            </div>
        </div>

    </footer>


</body>

</html>