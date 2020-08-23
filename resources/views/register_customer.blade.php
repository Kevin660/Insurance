<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>註冊</title>

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
    <link href="/css/login.css" rel="stylesheet">
    <link rel="stylesheet" href="icofont/icofont.min.css">
    <!-- <script src="main.js"></script> -->
</head>

<body>

    <header id="header" class="fixed-top">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-11 d-flex align-items-center">
                    <h1 class="logo mr-auto"><a href="index.html">保險媒合平台</a></h1>
                </div>
            </div>
        </div>
    </header>

    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class=" col rounded border p-3 m-3">
                <div class="d-flex flex-column justify-content-center h-100">
                    <h5 class="mx-auto">註冊</h5>
                    <div class="d-flex flex-column justify-content-center h-100">
                        <form class="d-flex flex-column justify-content-center  ">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="password" class="mt-2">密碼</label>
                                <input type="password" class="form-control" id="password">

                                <label for="password_confirm" class="mt-2">確認密碼</label>
                                <input type="password" class="form-control" id="password_confirm">
                            </div>
                            <div class="form-check mx-auto">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">同意 <a href="#">使用條款</a> </label>
                            </div>
                            <button type="submit" class="btn btn-submit mt-3">註冊</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>




</body>

</html>