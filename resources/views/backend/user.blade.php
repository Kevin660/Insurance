@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 my-3">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="card-body">
                                <h5 class="card-title">個人資料</h5>
                                <div class="d-flex flex-column justify-content-center h-100">
                                    <form method="POST" action="{{ route('user') }}" class="d-flex flex-column justify-content-center" id="submit-form-1">
                                        @csrf
                                        <input name="role" type="hidden" value="2">
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label>信箱  
                                                    @if($user->email_verified_at)
                                                        <span class="badge badge-primary">已驗證</span>
                                                    @else
                                                        <a href="/email/verify" class="badge badge-danger">驗證信箱</a>
                                                    @endif
                                                </label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}"  
                                                    @if($user->email_verified_at) disabled @else name="email" required @endif>
                                                <small class="form-text text-muted">信箱驗證後將不可變更</small>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col">
                                                <label for="chinese_name">姓名</label>
                                                <input name="chinese_name" type="text"
                                                    class="form-control @error('chinese_name') is-invalid @enderror"
                                                    id="chinese_name"
                                                    value="{{ $user->chinese_name }}"
                                                    required>
                                                @error('chinese_name')
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
                                                        class="form-control @error('birthday') is-invalid @enderror" id="birthday" value="{{ $user->birthday }}" required>
                                                    @error('birthday')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-3">
                                                    <label for="gender">性別</label>
                                                <select name=" gender" class=" form-control" id="gender" required>
                                                        <option value="1" @if($user->gender == 1) selected @endif>男</option>
                                                        <option value="2" @if($user->gender == 2) selected @endif>女</option>
                                                        </select>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label for="number_home">聯絡電話(市話)</label>
                                                    <input name="number_home" type="text"
                                                        class="form-control @error('number_home') is-invalid @enderror"
                                                        id="number_home"
                                                        value="{{ $user->number_home }}">
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
                                                        id="number_cellphone"
                                                        value="{{ $user->number_cellphone }}"
                                                        required>
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
                                                    class="form-control @error('address') is-invalid @enderror" id="address"
                                                    value="{{ $user->address }}"
                                                    required>
                                                @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                    </form>


                                </div>
                            
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item text-center p-0">
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item link-btn-grid link-btn-secondary w-50" onclick="location.href='/home'">返回</li>
                        <li class="list-group-item link-btn-grid w-50" onclick="$('#submit-form-1').submit();">儲存</li>
                    </ul>      
                    </li>
                </ul>

            </div>
        </div>
    </div>
</div>
@endsection
