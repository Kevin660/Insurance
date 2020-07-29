<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>首頁</title>

    <!-- CSS only -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- JS, Popper.js, and jQuery -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="icofont/icofont.min.css">
</head>

<body>

    <header id="header" class="fixed-top header-transparent">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-11 d-flex align-items-center">

                    <h1 class="logo mr-auto"><a href="index.html">保險媒合平台</a></h1>


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

    <section id="intro">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="intro-container">
                <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

                    <ol class="carousel-indicators"></ol>

                    <div class="carousel-inner" role="listbox">

                        <div class="carousel-item active" style="background-image: url(/img/6.jpg)">
                            <div class="carousel-container">
                                <div class="container">
                                    <h2>We are professional</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat.</p>
                                    <a href="#featured-services" class="btn-get-started">Get 01</a>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item" style="background-image: url(/img/car.jpg)">
                            <div class="carousel-container">
                                <div class="container">
                                    <h2>We are professional</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat.</p>
                                    <a href="#featured-services" class="btn-get-started">Get 02</a>
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
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-5 p-3 d-flex flex-column justify-content-center align-items-center">
                <img class="img-fluid rounded " src="img/c1.jpg" alt="">
            </div>
            <div class="col-12 col-md-5 p-3 d-flex flex-column justify-content-center align-items-center">

                <h2>找業務員</h2>
                <p class="px-5">的目的為測試文章或文字在不同字型、版型下看起來的效果。中文的類似用法則稱為亂數假文、隨機假文。</p>
                <div>
                    <a href="#" class="cta-btn">前往>>></a>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-5 p-3 d-flex flex-column justify-content-center align-items-center order-md-2">
                <img class="img-fluid rounded " src="img/c1.jpg" alt="">
            </div>
            <div class="col-12 col-md-5 p-3 d-flex flex-column justify-content-center align-items-center order-md-1">

                <h2>車禍處理專區</h2>
                <p class="px-5">的目的為測試文章或文字在不同字型、版型下看起來的效果。中文的類似用法則稱為亂數假文、隨機假文。</p>
                <div>
                    <a href="#" class="cta-btn">前往>>></a>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-5 p-3 d-flex flex-column justify-content-center align-items-center">
                <img class="img-fluid rounded " src="img/c1.jpg" alt="">
            </div>
            <div class="col-12 col-md-5 p-3 d-flex flex-column justify-content-center align-items-center">

                <h2>討論區</h2>
                <p class="px-5">的目的為測試文章或文字在不同字型、版型下看起來的效果。中文的類似用法則稱為亂數假文、隨機假文。</p>
                <div>
                    <a href="#" class="cta-btn">前往>>></a>
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

    <script src="main.js"></script>

</body>

</html>