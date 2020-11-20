<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入</title>

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
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="icofont/icofont.min.css">
    <!-- <script src="main.js"></script> -->
</head>

<body>

    <header id="header" class="fixed-top header-transparent">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-11 d-flex align-items-center">
                    <h1 class="logo mr-auto"><a href="/">保險媒合平台</a></h1>
                </div>
            </div>
        </div>
    </header>

    <div class="d-flex justify-content-center align-items-center h-100">
        <div id="big" class="row d-flex justify-content-center align-items-center h-100">

            <div class=" window col rounded border p-3 m-3">
                <div class="d-flex flex-column justify-content-center h-100">
                    <h5 class="mx-auto">註冊</h5>
                    <div class="d-flex flex-column justify-content-center h-100">
                            <button onclick="window.location.href = '/register_customer'" class="btn m-1 flex-grow btn-outline-insurance">
                                我是保戶
                            </button>
                            <button onclick="window.location.href = '/register_sales'" class="btn m-1 flex-grow btn-outline-insurance">
                                我是業務員
                            </button>
                    </div>

                </div>
            </div>

            <div class="window col rounded border p-3">
                <div class="d-flex flex-column justify-content-center h-100">

                    <h5 class="mx-auto">登入</h5>
                    <form method="POST" action="" class="d-flex flex-column justify-content-center  ">
                        @csrf
                        <label for="email">電子信箱</label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            id="email">
                        <label for="password" class="mt-2">密碼</label>
                        <input name="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" id="password">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <button type="submit" class="btn btn-submit mt-3">登入</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




</body>

</html>