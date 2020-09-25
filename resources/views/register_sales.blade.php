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
                    <h1 class="logo mr-auto"><a href="/">保險媒合平台</a></h1>
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

                            {{ $errors }}
                            <form method="POST" action="{{ route('register') }}" class="d-flex flex-column justify-content-center  ">
                                @csrf
                                <input name="role" type="hidden" value="1">
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
                                            <option value="1">男</option>
                                            <option value="2">女</option>
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
                                    <input name="password_confirmation" type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirm">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="serve_area">服務地區</label>
                                    <input name="serve_area" type="text"
                                        class="form-control @error('serve_area') is-invalid @enderror" id="serve_area">
                                    @error('serve_area')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="serve_item">服務項目</label>
                                    <input name="serve_item" type="text"
                                        class="form-control @error('serve_item') is-invalid @enderror"
                                        id="serve_item">
                                    @error('serve_item')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="serve_experience">服務資歷</label>
                                    <input name="serve_experience" type="text"
                                        class="form-control @error('serve_experience') is-invalid @enderror"
                                        id="serve_experience">
                                    @error('serve_experience')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="license">相關證照</label>
                                    <input name="license" type="text"
                                        class="form-control @error('license') is-invalid @enderror" id="license">
                                    @error('license')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="other">備註</label>
                                    <input name="other" type="text"
                                        class="form-control @error('other') is-invalid @enderror" id="other">
                                    @error('other')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="form-check mx-auto">
                                    <input name="terms" type="checkbox"
                                        class="form-check-input @error('terms') is-invalid @enderror" id="terms">
                                    <label class="form-check-label" for="terms">同意 <a href="#">使用條款</a> </label>
                                </div>
                                @error('terms')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
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