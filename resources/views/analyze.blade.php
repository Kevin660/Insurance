@extends('layouts.front')
@section('title') {{ env('APP_NAME') }}－風險分析 @endsection
@section('head')
<script src="{{ asset('js/analyze.js') }}"></script>
<link href="/css/style.css" rel="stylesheet">
<link href="/css/analyze.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/bb7611bdad.js" crossorigin="anonymous"></script>
@endsection
@section('content')
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="msg" tabindex="-1"  aria-hidden="true" data-dismiss="modal">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div id="msg-text" class="alert alert-success">正在風險分析</div>
        </div>
    </div>
    <!-- 專家系統 -->
    
    @isset($questions)
    <div id="analyze" class="container-fluid ">
        <div class="row h-100">
            <div class="col-2 m-auto text-center">
                <a href="#" class="ex-prev">
                    <i class="fas fa-angle-double-left angle"></i>
                    <p> 上一步 </p>
                </a>
            </div>
                @foreach($questions as $question)
                <div id="ex-question-{{ $question->id }}" class="col-8 ex-question @if($question->multiple) ex-question-multiple @endif @if($question->type == 'root') actived @elseif($question->type == 'end') ex-question-end @endif">
                    <div class="h-25 pt-5 d-flex flex-column justify-content-end align-items-center text-center">
                        <div>
                            <p class="h2"> {{ $question->name }}</p>
                        </div>
                        <div>
                        @if($question->multiple) 
                            <small>請選擇一至多個</small>
                        @else
                            <small>請選擇一個</small>
                        @endif
                        </div>
                    </div>
                    <div class="h-50 d-flex align-items-start align-content-start flex-wrap mt-5 justify-content-center ex-options">
                        @foreach($question->options as $option)
                            <button id="ex-option-{{ $option->id }}" class="btn btn-outline-success ex-option" data-next="@if($option->nextQuestion){{ $option->nextQuestion->id }}@endif">{{ $option->name }}</button>
                        @endforeach
                    </div>
                </div>
                @endforeach
            <div class="col-2 m-auto text-center">
                <a href="#" class="ex-next">
                    <i class="fas fa-angle-double-right angle"></i>
                    <p>下一步</p>
                </a>
            </div>
        </div>
    </div>
    @endisset

    <!-- 分析結果 -->
    @isset($results)
    <div id="result" class="container-fluid">
        <div class="row h-100">
            <div class="col-md-6 text-center m-auto">
                <p class="h1 my-5"> 您需要的保險產品如下...</p>
                @foreach($results as $result)
                <div class="results pb-4 m-4">
                    <div class="bg-success">{{ $result->item->name }}</div>
                    <div>{{ $result->item->description }}</div>
                </div>
                @endforeach
                <button type="button" class="btn btn-secondary btn-lg mt-3" onclick="location.href='/analyze'">重新分析</button>
                <button type="button" class="btn btn-success btn-lg mt-3" onclick="location.href='/sales/index/1'">立即諮詢</button>
            </div>
        </div>
    </div>
    @endisset
@endsection