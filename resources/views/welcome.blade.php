<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>首頁</title>

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
    <link rel="stylesheet" href="/storage/icofont/icofont.min.css">
    <script>
        $('document').ready(function(){
            $('.btn-get-started').click(function(){
            $('html, body').animate({
                scrollTop: $($(this).attr('href')).offset().top
            }, 300, 'linear');
            });
        });
    </script>
</head>

<body>

    <header class="fixed-top">
    <div id="header" class="container-fluid header-transparent">
            <div class="col-lg-11 mx-auto">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <h1 class="logo mr-auto"><a href="/">保險媒合平台</a></h1>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse text-right" id="navbarNav">
                        <ul class="navbar-nav nav-menu ml-auto">
                            <li class="nav-item"> <a class="nav-link" href="#">風險分析</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="sales/1">找業務員</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="sales/2">車禍處理專區</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="/forum">討論區</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="/login">登入</a> </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <section id="intro">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="intro-container">
                <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

                    <ol class="carousel-indicators"></ol>

                    <div class="carousel-inner" role="listbox">

                        <div class="carousel-item active" style="background-image: url(https://images.unsplash.com/photo-1482235225574-c37692835cf3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1051&q=80)">
                            <div class="carousel-container">
                                <div class="container">
                                    <h2>尋找最適合你的保險</h2>
                                    <p>更貼心的服務、更多的選擇、更專業的諮詢，讓您找到最符合需求的保險</p>
                                    <a href="#t1" class="btn-get-started">馬上體驗</a>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item" style="background-image: url(https://images.unsplash.com/photo-1548783300-70b41bc84f56?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80g)">
                            <div class="carousel-container">
                                <div class="container">
                                    <h2>找業務員</h2>
                                    <p>提供業務員相關資料，如：所屬公司、評價、證照、年資、服務地區，給您更貼心完善的服務。</p>
                                    <a href="#t1" class="btn-get-started">馬上體驗</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="carousel-item" style="background-image: url(https://images.unsplash.com/photo-1597328290883-50c5787b7c7e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80)">
                            <div class="carousel-container">
                                <div class="container">
                                    <h2>車禍處理專區</h2>
                                    <p>提供您具有保險經紀人證照的業務員，及更專業的車禍相關諮詢服務。</p>
                                    <a href="#t2" class="btn-get-started">馬上體驗</a>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item" style="background-image: url(https://images.unsplash.com/photo-1483213097419-365e22f0f258?ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80)">
                            <div class="carousel-container">
                                <div class="container">
                                    <h2>討論區</h2>
                                    <p>將由專業的業務員解答您各類保險問題。</p>
                                    <a href="#t3" class="btn-get-started">馬上體驗</a>
                                </div>
                            </div>
                        </div>
                        
                        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>

                        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>

                    </div>
                </div>
            </div>
    </section>

    <div class="container-fluid">
        <div class="row d-flex justify-content-center" id="t1">
            <div class="col-12 col-md-5 p-3 d-flex flex-column justify-content-center align-items-center">
                <img class="img-fluid rounded " src="https://images.unsplash.com/photo-1548783300-70b41bc84f56?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80g" alt="">
            </div>
            <div class="col-12 col-md-5 p-3 d-flex flex-column justify-content-center align-items-center">

                <h2>找業務員</h2>
                <p class="px-5">提供業務員相關資料，如：所屬公司、評價、證照、年資、服務地區，給您更貼心完善的服務。</p>
                <div>
                    <a href="/sales/1" class="cta-btn">前往>>></a>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center" id="t2">
            <div class="col-12 col-md-5 p-3 d-flex flex-column justify-content-center align-items-center order-md-2">
                <img class="img-fluid rounded " src="https://images.unsplash.com/photo-1597328290883-50c5787b7c7e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80" alt="">
            </div>
            <div class="col-12 col-md-5 p-3 d-flex flex-column justify-content-center align-items-center order-md-1">

                <h2>車禍處理專區</h2>
                <p class="px-5">提供您具有保險經紀人證照的業務員，及更專業的車禍相關諮詢服務。</p>
                <div>
                    <a href="/sales/2" class="cta-btn">前往>>></a>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center" id="t3">
            <div class="col-12 col-md-5 p-3 d-flex flex-column justify-content-center align-items-center">
                <img class="img-fluid rounded " src="https://images.unsplash.com/photo-1483213097419-365e22f0f258?ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="">
            </div>
            <div class="col-12 col-md-5 p-3 d-flex flex-column justify-content-center align-items-center">

                <h2>討論區</h2>
                <p class="px-5">將由專業的業務員解答您各類保險問題。</p>
                <div>
                    <a href="/forum" class="cta-btn">前往>>></a>
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