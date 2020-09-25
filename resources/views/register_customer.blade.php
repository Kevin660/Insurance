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

    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class=" col rounded border p-3 m-3">
                <div class="d-flex flex-column justify-content-center h-100">
                    <h5 class="mx-auto">註冊</h5>
                    <div class="d-flex flex-column justify-content-center h-100">


                        <form method="POST" action="{{ route('register') }}" class="d-flex flex-column justify-content-center">
                            @csrf
                            <div class="form-row">
                                    <div class="form-group col">
                                        <label for="chinese_name">中文名稱</label>
                                        <input name="chinese_name" type="text"
                                            class="form-control @error('chinese_name') is-invalid @enderror"
                                            id="chinese_name">
                                        @error('chinese_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <label for="email">Email</label>
                                        <input name="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" id="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-9">
                                        <label for="birthday">生日</label>
                                        <input name="birthday" type="date"
                                            class="form-control @error('birthday') is-invalid @enderror" id="birthday">
                                        @error('birthday')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="gender"">性別</label>
                                    <select name=" gender" class=" form-control" id="gender">
                                            <option value="male">男</option>
                                            <option value="female">女</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="number_home">聯絡電話(市話)</label>
                                        <input name="number_home" type="text"
                                            class="form-control @error('number_home') is-invalid @enderror"
                                            id="number_home">
                                        @error('number_home')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <label for="number_cellphone">聯絡電話(手機)</label>
                                        <input name="number_cellphone" type="text"
                                            class="form-control @error('number_cellphone') is-invalid @enderror"
                                            id="number_cellphone">
                                        @error('number_cellphone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address">地址</label>
                                    <input name="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" id="address">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password" class="mt-2">密碼</label>
                                    <input name="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" id="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <label for="password_confirm" class="mt-2">確認密碼</label>
                                    <input name="password_confirm" type="password"
                                        class="form-control @error('password_confirm') is-invalid @enderror"
                                        id="password_confirm">
                                    @error('password_confirm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                            <div class="form-check mx-auto">
                                <input name="terms" type="checkbox"
                                    class="form-check-input  @error('terms') is-invalid @enderror" id="terms">
                                <label class="form-check-label" for="terms">同意 <a href="#">使用條款</a> </label>
                                @error('terms')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
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