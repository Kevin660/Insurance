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

    <header id="header" class="sticky-top">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-11 d-flex align-items-center">
                    <h1 class="logo mr-auto"><a href="index.html">保險媒合平台</a></h1>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid">


        <div class="d-flex justify-content-center align-items-center">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class=" col rounded border p-3 m-3">
                    <div class="d-flex flex-column justify-content-center h-100">
                        <h5 class="mx-auto">註冊</h5>
                        <div class="d-flex flex-column justify-content-center h-100">


                            <form class="d-flex flex-column justify-content-center  ">

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="chinese_name">中文名稱</label>
                                        <input type="text" class="form-control" id="chinese_name">
                                    </div>
                                    <div class="form-group col">
                                        <label for="english_name">英文名稱</label>
                                        <input type="text" class="form-control" id="english_name">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-9">
                                        <label for="birthday">生日</label>
                                        <input type="date" class="form-control" id="birthday">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="gender"">性別</label>
                                    <select class=" form-control" id="gender">
                                            <option>男</option>
                                            <option>女</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="number_home">聯絡電話(市話)</label>
                                        <input type="text" class="form-control" id="number_home">
                                    </div>
                                    <div class="form-group col">
                                        <label for="number_cellphone">聯絡電話(手機)</label>
                                        <input type="text" class="form-control" id="number_cellphone">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="address">地址</label>
                                    <input type="text" class="form-control" id="address">
                                </div>
                                <div class="form-group">
                                    <label for="serve_area">服務地區</label>
                                    <input type="text" class="form-control" id="serve_area">
                                </div>
                                <div class="form-group">
                                    <label for="service_item">服務項目</label>
                                    <input type="text" class="form-control" id="service_item">
                                </div>
                                <div class="form-group">
                                    <label for="service_experience">服務資歷</label>
                                    <input type="text" class="form-control" id="service_experience">
                                </div>
                                <div class="form-group">
                                    <label for="license">相關證照</label>
                                    <input type="text" class="form-control" id="license">
                                </div>
                                <div class="form-group">
                                    <label for="other">備註</label>
                                    <input type="text" class="form-control" id="other">
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
    </div>



</body>

</html>