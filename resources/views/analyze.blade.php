<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>風險分析</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS only -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- JS, Popper.js, and jQuery -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/analyze.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100&display=swap" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/analyze.css" rel="stylesheet">
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
                            <li class="nav-item"> <a class="nav-link" href="#">風險分析</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="#">找業務員</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="#">車禍處理專區</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="/forum">討論區</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="/login">登入</a> </li>
                        </ul>
                    </div>

                </nav>
            </div>
        </div>

    </header>


    <!-- 專家系統 -->
    
    @isset($questions)
    <div id="analyze" class="container-fluid ">
        <div class="row h-100">
            <div class="col-2 m-auto text-center">
                <a href="#" class="ex-prev">
                    <i class="fas fa-angle-double-left angle"></i>
                    <p> 上一步 </p>
                </a>
            </div>
                @foreach($questions as $question)
                <div id="ex-question-{{ $question->id }}" class="col-8 ex-question @if($question->multiple) ex-question-multiple @endif @if($question->type == 'root') actived @elseif($question->type == 'end') ex-question-end @endif">
                    <div class="h-25 pt-5 d-flex flex-column justify-content-end align-items-center text-center">
                        <div>
                            <p class="h2"> {{ $question->name }}</p>
                        </div>
                        <div>
                        @if($question->multiple) 
                            <small>請選擇一至多個</small>
                        @else
                            <small>請選擇一個</small>
                        @endif
                        </div>
                    </div>
                    <div class="h-50 d-flex align-items-start align-content-start flex-wrap mt-5 justify-content-center ex-options">
                        @foreach($question->options as $option)
                            <button id="ex-option-{{ $option->id }}" class="btn btn-outline-success ex-option" data-next="@if($option->nextQuestion){{ $option->nextQuestion->id }}@endif">{{ $option->name }}</button>
                        @endforeach
                    </div>
                </div>
                @endforeach
            <div class="col-2 m-auto text-center" style="display: none;">
                <button class="form-control btn btn-success f-btn" type="submit">查看結果</button>
            </div>
            <div class="col-2 m-auto text-center">
                <a href="#" class="ex-next">
                    <i class="fas fa-angle-double-right angle"></i>
                    <p>下一步</p>
                </a>
            </div>
        </div>
    </div>
    @endisset

    <!-- 分析結果 -->
    @isset($results)
    <div id="result" class="container-fluid">
        <div class="row h-100">
            <div class="col-md-6 text-center m-auto">
                <p class="h1 my-5"> 您需要的保險產品如下...</p>
                @foreach($results as $result)
                <div class="results pb-4 m-4">
                    <div class="bg-success">{{ $result->item->name }}</div>
                    <div>{{ $result->item->description }}</div>
                </div>
                @endforeach
                <button type="button" class="btn btn-secondary btn-lg mt-3" onclick="location.href='/analyze'">重新分析</button>
                <button type="button" class="btn btn-success btn-lg mt-3" onclick="location.href='/sales/index/1'">立即諮詢</button>
            </div>
        </div>
    </div>
    @endisset
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