@extends('layouts.front')
@section('title') {{ env('APP_NAME') }}－登入 @endsection
@section('head')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection
@section('content')
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
@endsection


