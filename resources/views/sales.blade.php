<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>首頁</title>

    <!-- CSS only -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <!-- JS, Popper.js, and jQuery -->
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100&display=swap" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/storage/icofont/icofont.min.css">
    <script src="/js/main.js"></script>
</head>

<body>

    <header id="header" class="">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-11 d-flex align-items-center">

                    <h1 class="logo mr-auto"><a href="/">保險媒合平台</a></h1>


                    <nav class="nav-menu d-none d-lg-block">
                        <ul>
                            <li class="active"><a href="index.html">風險分析</a></li>
                            <li><a href="#about">找業務員</a></li>
                            <li><a href="#services">車禍處理專區</a></li>
                            <li><a href="#portfolio">討論區</a></li>
                            <li><a href="#team">登入</a></li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </header>

<div class="container">
<div class="row">
        
       <!-- 一張名片 -->
        @foreach($sales as $sale)
            <div class="col-12 col-md-4 p2 mt-2">
                <div class="box-content">
                    <div>
                        <img src="/storage/img/user/{{ $sale->img }}" alt="" class="img-fluid d-block m-auto w-50">
                    </div>
                    <div class="mt-1 mb-1">
                        <h3>{{ $sale->chinese_name }}－{{ $sale->company }}</h3>
                    <div>
                </div>
            </div>
            <div class="container-fluid">
            <div class="row justify-content-center">
            @foreach($sale->certifications as $certification)
                <div>
                    <img src="/storage/img/badge/badge{{ $certification->certificationType->type }}.png" alt="" title="{{ $certification->certificationType->name }}">
                </div>
            @endforeach
            </div>  
            </div>
                <div class="text-success mt-1 mb-1">服務地區：{{ $sale->serve_area }}</div>
                    <div class="mt-2 mb-2">
                        <span class="text-muted">服務年資：{{ $sale->serve_experience }}年</span>
                    </div>
                    <div class="mt-2 mb-2">
                        <span class="text-muted">平台評分:{{ $sale->score }}</span>
                    </div>
                    <div class="mt-2 mb-2">
                        <span class="text-muted">{{ $sale->introduction }}</span>
                    </div>
                    <div class="mt-3">
                        <button type="button" class="btn btn-success btn-lg btn-block">立即諮詢</button>
                    </div>
                </div>
            </div>
        @endforeach
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