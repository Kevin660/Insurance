@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-12 my-3">
            <h2 class="card-title">我的媒合紀錄</h2>
        </div>
        @foreach($expertRecords as $record)
        <div class="col-md-6 my-3">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div>
                            <div class="card-text my-3 row" style="height: 300px">
                                <div class="col-6 text-center">
                                    <a href="/sales/{{ $record->sale->id }}">
                                        <img src="/storage/img/user/{{ $record->sale->img }}" style="max-height: 200px"/>
                                    </a>
                                    <div class="mt-2 mb-2">
                                        <div style='display:table; margin:auto; width: 120px; height: 30px;'>
                                            <span class="bg-dark text-light" style="display: table-cell; vertical-align: middle; font-size: 16px; border-right: 6px dashed #fff;">評分</span>
                                            <span class="bg-success text-light" style="display: table-cell; vertical-align: middle; font-size: 24px;">{{ $record->sale->score }}</span>
                                        </div>
                                    </div>
                                    <div class="container-fluid">
                                        <div class="row justify-content-center">
                                        @foreach($record->sale->certifications as $certification)
                                            <div>
                                                <img src="/storage/img/badge/badge{{ $certification->certificationType->type }}.png" alt="" title="{{ $certification->certificationType->name }}">
                                            </div>
                                        @endforeach
                                        </div>  
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mt-1 mb-1">
                                        <div class="text-light bg-dark px-3 py-1" style="display: table-cell;">公司</div>
                                        <div style="text-indent: 2em;">{{ $record->sale->company }}</div>
                                    </div>
                                    <div class="mt-1 mb-1">
                                        <div class="text-light bg-dark px-3 py-1" style="display: table-cell;">姓名</div>
                                        <div style="text-indent: 2em;">{{ $record->sale->chinese_name }}</div>
                                    </div>
                                    <div class="mt-1 mb-1">
                                        <div class="text-light bg-dark px-3 py-1" style="display: table-cell;">服務年資</div>
                                        <div style="text-indent: 2em; ">{{ $record->sale->serve_experience }}年</div>
                                    </div>
                                    <div class="mt-1 mb-1">
                                        <div class="text-light bg-dark px-3 py-1" style="display: table-cell;">最新日期</div>
                                        <div style="text-indent: 2em;">{{ $record->created_at }}</div>
                                    </div>
                                    <div class="mt-1 mb-1">
                                        <div class="text-light bg-dark px-3 py-1" style="display: table-cell;">諮詢次數</div>
                                        <div style="text-indent: 2em; ">{{ $record->count }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item link-btn-full text-center mt-auto" onclick="location.href='/sales/{{ $record->sale->id }}'">個人資料</li>
                </ul>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
