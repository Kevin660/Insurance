<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>發文</title>

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
    <script src="https://kit.fontawesome.com/bb7611bdad.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100&display=swap" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/forum.css" rel="stylesheet">
    <link rel="stylesheet" href="/storage/icofont/icofont.min.css">
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



    <div class="container">

        <div class="mt-3 my-3 p-3 bg-white rounded shadow d-flex justify-content-center">


            <form id="post" method="POST" action="{{ route('register') }}" class="text-center">
                @csrf
                <div class="my-3 text-left">
                    <label class="h4" for="title">標題</label>
                    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror"
                        id="title">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="my-3 text-left">
                    <label class="h4" for="content">內文</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content"
                        rows="7"></textarea>
                    @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="my-3 text-left">
                    <label class="h4">標籤</label>
                    <br>

                    <ul class="ckb-tag">
                        <?php

                        $catelog=array
                        (
                        array("醫療險","a"),
                        array("健康險","b"),
                        array("意外險","c"),
                        array("壽險","d"),
                        array("車險","e"),
                        array("企業保險","f"),
                        array("火險","g"),
                        array("水險","h"),
                        array("車禍","i"),
                        array("理賠","j"),
                        array("投保","k"),
                        array("失能","l")
                        );

                    foreach($catelog as $value) {                             
                    echo '
                    <li>
                        <input type="checkbox" name="e" id="'.$value[1].'">
                        <label for="'.$value[1].'">'.$value[0].'</label>
                    </li>
                        ';                      
                    }
                    ?>

                    </ul>


                    @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <button type="submit" class="btn btn-success mt-3 px-5">發文</button>
            </form>
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