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
    
</head>

<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success header-transparent">
        <a class="navbar-brand" href="#">保險媒合平台</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end " id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="#">風險分析 <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="#">找業務員</a>
                <a class="nav-item nav-link" href="#">車禍處理專區</a>
                <a class="nav-item nav-link" href="#">討論區</a>
                <a class="nav-item nav-link" href="#">登入</a>
            </div>
        </div>
    </nav>
    </header>
 
    <section id="intro">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <!-- <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            
        
        </ol> -->

        <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url(/img/6.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2>We are professional</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <a href="#featured-services" class="btn-get-started">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(/img/car.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2>We are professional</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <a href="#featured-services" class="btn-get-started">Get Started</a>
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
  </section>
    <div class="container">
        <div class="row">
            <div class="col-6 p-3">
                <img class="img-fluid rounded " src="/storage/img/c1.jpg" alt="">
            </div>
            <div class="col-6 p-3">
                <p>是指一篇常用於排版設計領域的拉丁文文章，主要的目的為測試文章或文字在不同字型、版型下看起來的效果。中文的類似用法則稱為亂數假文、隨機假文。</p>
            </div>
        </div>
        <div class="row">
            <div class="col-6 p-3">
                <p>是指一篇常用於排版設計領域的拉丁文文章，主要的目的為測試文章或文字在不同字型、版型下看起來的效果。中文的類似用法則稱為亂數假文、隨機假文。</p>
            </div>
            <div class="col-6 p-3">
                <img class="img-fluid rounded " src="/storage/img/car.jpg" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-6 p-3">
                <img class="img-fluid rounded " src="/storage/img/car.jpg" alt="">
            </div>
            <div class="col-6 p-3">
                <p>是指一篇常用於排版設計領域的拉丁文文章，主要的目的為測試文章或文字在不同字型、版型下看起來的效果。中文的類似用法則稱為亂數假文、隨機假文。</p>
            </div>
        </div>

    </div>

    <footer class="bg-success">

        <div class="row  d-flex justify-content-center">

            <div class="col d-flex justify-content-center">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active pt-0" href="#">關於我們</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">常見問題</a>
                    </li>
                </ul>
            </div>

            <div class="col d-flex flex-column justify-content-center">
                <p>聯絡我們</p>
                <div class="p-3 d-flex  justify-content-center">
                    0800-000-000 <br>
                    support@mail.com
                </div>
            </div>

            <div class="col d-flex justify-content-center align-items-center">
                臉書插件
            </div>

        </div>

        <div class="row d-flex justify-content-center">
            <span>MIS department©2020</span>
        </div>

    </footer>
</body>

</html>