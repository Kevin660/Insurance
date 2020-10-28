<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>討論區</title>

    <!-- CSS only -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- JS, Popper.js, and jQuery -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
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

        <div id="search-bar" class="container-fluid py-3">
            <div class="container sticky-top">
                <form method="POST" action="#">
                    <div class="form-row">
                        <div class="col-md-2 col-3">
                            <select class="custom-select form-control">
                                <option selected>所有標籤</option>
                                <?php
                        $catelog=array('醫療險','健康險','意外險','壽險','車險','企業保險','火險','水險','車禍','理賠','投保','失能');
                        foreach($catelog as $value) {                             
                        echo "<option value='$value'>". $value ."</option>";                         
                        }
                        ?>
                            </select>
                        </div>
                        <div class="col-md-6 col-9">
                            <input type="text" class="form-control" id="" placeholder="search...">
                        </div>
                        <div class="col-md-2 col-6 mt-2 mt-md-0">
                            <button class="form-control btn btn-success f-btn">我要發文</button>
                        </div>
                        <div class="col-md-2 col-6 mt-2 mt-md-0">
                            <button class="form-control btn btn-outline-success f-btn">我的貼文</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </header>



    <div class="container">
        <div id="forum" class="my-3 pb-3 pl-3 pr-3 bg-white rounded shadow">
            <div class="d-flex flex-column p-3">
                <div>
                    <img class="rounded-circle m-1" src="https://picsum.photos/40">
                    <span class="mr-auto"><a href="#">uploader</a></span>
                    <!-- <button type="button" class="btn btn-outline-success btn-sm float-right">追蹤貼文</button> -->
                </div>
                <h3>花蓮宅配伴手禮推薦買啥？花蓮縣餅有適合送長輩的嗎？</h3>
                <p>關於花蓮宅配伴手禮推薦版上有人有想法嗎？現在我還不太敢去人多的地方趴趴走，但還是要挑伴手禮給長輩，甜的鹹的其實都可以，口味獨特的也能推薦，麻煩大家分享給我知道了！</p>
                <div class="d-flex justify-content-between">
                    <div class="mr-auto">
                        <a href="#" class="badge badge-secondary">意外險</a>
                        <a href="#" class="badge badge-secondary">車禍</a>
                    </div>
                    <small class="p-1">評價<span class="p-1">0</span> </small>
                    <small class="p-1">回答<span class="p-1">0</span> </small>
                    <small class="p-1">今天 00:00</small>
                </div>
            </div>
            <div class="d-flex flex-column p-3">
                <div>
                    <img class="rounded-circle m-1" src="https://picsum.photos/40">
                    <span class="mr-auto"><a href="#">uploader</a></span>
                    <!-- <button type="button" class="btn btn-outline-success btn-sm float-right">追蹤貼文</button> -->
                </div>
                <h3>花蓮宅配伴手禮推薦買啥？花蓮縣餅有適合送長輩的嗎？</h3>
                <p>關於花蓮宅配伴手禮推薦版上有人有想法嗎？現在我還不太敢去人多的地方趴趴走，但還是要挑伴手禮給長輩，甜的鹹的其實都可以，口味獨特的也能推薦，麻煩大家分享給我知道了！</p>
                <div class="d-flex justify-content-between">
                    <div class="mr-auto">
                        <a href="#" class="badge badge-secondary">意外險</a>
                        <a href="#" class="badge badge-secondary">車禍</a>
                    </div>
                    <small class="p-1">評價<span class="p-1">0</span> </small>
                    <small class="p-1">回答<span class="p-1">0</span> </small>
                    <small class="p-1">今天 00:00</small>
                </div>
            </div>
            <div class="d-flex flex-column p-3">
                <div>
                    <img class="rounded-circle m-1" src="https://picsum.photos/40">
                    <span class="mr-auto"><a href="#">uploader</a></span>
                    <!-- <button type="button" class="btn btn-outline-success btn-sm float-right">追蹤貼文</button> -->
                </div>
                <h3>花蓮宅配伴手禮推薦買啥？花蓮縣餅有適合送長輩的嗎？</h3>
                <p>關於花蓮宅配伴手禮推薦版上有人有想法嗎？現在我還不太敢去人多的地方趴趴走，但還是要挑伴手禮給長輩，甜的鹹的其實都可以，口味獨特的也能推薦，麻煩大家分享給我知道了！</p>
                <div class="d-flex justify-content-between">
                    <div class="mr-auto">
                        <a href="#" class="badge badge-secondary">意外險</a>
                        <a href="#" class="badge badge-secondary">車禍</a>
                    </div>
                    <small class="p-1">評價<span class="p-1">0</span> </small>
                    <small class="p-1">回答<span class="p-1">0</span> </small>
                    <small class="p-1">今天 00:00</small>
                </div>
            </div>

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