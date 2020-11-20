@extends('layouts.front')
@section('title') {{ env('APP_NAME') }}－註冊 @endsection
@section('head')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-center align-items-center">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class=" col rounded border p-3 m-3">
                    <div class="d-flex flex-column justify-content-center h-100">
                        <h5 class="mx-auto">註冊</h5>
                        <div class="d-flex flex-column justify-content-center h-100">

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
                                        <label for="gender">性別</label>
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
@endsection