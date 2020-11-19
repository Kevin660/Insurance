@extends('layouts.front')
@section('title') {{ env('APP_NAME') }}－業務員 @endsection
@section('content')
<div class="container">
    <div class="row">
        
       <!-- 一張名片 -->
        @foreach($sales as $sale)
            <div class="col-12 col-md-4 p2 mt-2">
                <div class="box-content">
                    <div>
                        <img src="/storage/img/user/{{ $sale->img }}" alt="" class="img-fluid d-block m-auto w-50">
                    </div>
                    <div class="mt-1 mb-1 text-center">
                        <h3>{{ $sale->chinese_name }}－{{ $sale->company }}</h3>
                    <div>
                </div>
            </div>
            <div class="container-fluid">
            <div class="row justify-content-center">
            @foreach($sale->certifications as $certification)
                <div>
                    <img src="/storage/img/badge/badge{{ $certification->certificationType->type }}.png" alt="" title="{{ $certification->certificationType->name }}">
                </div>
            @endforeach
            </div>  
            </div>
                <div class="text-success mt-1 mb-1">服務地區：{{ $sale->serve_area }}</div>
                    <div class="mt-2 mb-2">
                        <span class="text-muted">服務年資：{{ $sale->serve_experience }}年</span>
                    </div>
                    <div class="mt-2 mb-2">
                        <span class="text-muted">平台評分:{{ $sale->score }}</span>
                    </div>
                    <div class="mt-2 mb-2">
                        <span class="text-muted">{{ $sale->introduction }}</span>
                    </div>
                    <div class="mt-3">
                        <button type="button" class="btn btn-success btn-lg btn-block" onclick="location.href='/sales/{{ $sale->id }}'">立即諮詢</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection