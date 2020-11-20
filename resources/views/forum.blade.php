@extends('layouts.front')
@section('title') {{ env('APP_NAME') }}－討論區 @endsection
@section('head')
<link href="/css/forum.css" rel="stylesheet">
@endsection
@section('content')
        <div id="search-bar" class="container-fluid py-3">
            <div class="container sticky-top">
                <form action="{{ url()->current() }}" method="get">
                    <div class="form-row">
                        
                        <div class="col-lg-12 col-12">
                            <h2>討論區@if(strpos(url()->current(), 'indexSelf') !== false)－我的貼文@endif</h2>
                        </div>
                        <div class="col-lg-2 col-3">
                            <select class="custom-select form-control" name="type_id" id="type_id">
                                <option value="" @if('' == request()->get('type_id')) selected @endif>所有分類</option>
                                @foreach($types as $type)
                                <option value="{{ $type->id }}" @if($type->id == request()->get('type_id')) selected @endif>{{ $type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2 col-3">
                            <select class="custom-select form-control" id="order" name="order">
                                <option value="1" @if(1 == request()->get('order')) selected @endif>最新發問</option>
                                <option value="2" @if(2 == request()->get('order')) selected @endif>最舊發問</option>
                                <option value="3" @if(3 == request()->get('order')) selected @endif>最近更新</option>
                                <option value="4" @if(4 == request()->get('order')) selected @endif>最多觀看</option>
                            </select>
                        </div>
                        <div class="col-lg-6 col-6 input-group">
                            <input type="text" class="form-control" id="search_title" name="search_title"
                                value="{{ request()->get('search_title') }}" placeholder="搜尋問題 ...">
                            <div class="input-group-append">
                                <button id="search-button" type="submit" class="btn form-control">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                </form>
                <div class="col-lg-1 col-6 mt-2 mt-lg-0">
                    <a class="form-control btn btn-success f-btn" href="/questions/create">我要發文</a>
                </div>
                <div class="col-lg-1 col-6 mt-2 mt-lg-0">
                    <a class="form-control btn btn-outline-success f-btn" @if(strpos(url()->current(), 'indexSelf') !== false) href="/questions/index" @else href="/questions/indexSelf" @endif">@if(strpos(url()->current(), 'indexSelf') !== false)所有貼文@else我的貼文@endif</a>
                </div>

            </div>
            </form>
        </div>
        </div>

    </header>



    <div class="container">
        <div id="forum" class="my-3 pb-3 pl-3 pr-3 bg-white rounded shadow">
            @forelse($questions as $question)
            <div class="d-flex flex-column p-3" style="transform: rotate(0);">
                <a href="/questions/{{$question->id}}" class="stretched-link"></a>
                <div>
                    <img class="rounded-circle m-1" src="/storage/img/user/{{ $question->user->img }}" style="height:40px;width:40px">
                    <span class="mr-auto">{{ $question-> user -> chinese_name}}</span>

                </div>
                <div class="d-flex">
                    <h3>{{ $question-> title}}</h3>
                    <p class="ml-2">
                        @if($question->answer == null)
                        <i class="badge badge-danger">未解決</i>
                        @else
                        <i class="badge badge-success">已解決</i>
                        @endif
                    </p>
                </div>


                <p>{{ $question-> content}}</p>
                <div class="d-flex justify-content-between">
                    <div class="mr-auto">
                        @foreach($question->questionTypes as $question_type)
                        <a href="#" class="badge badge-secondary">{{ $question_type-> type -> name}}</a>
                        @endforeach
                    </div>
                    <small class="p-1">評價<span class="p-1">{{ $question-> votes() -> sum('count')}}</span> </small>
                    <small class="p-1">回答<span class="p-1">{{ $question-> answers() -> count()}}</span> </small>
                    <small class="p-1">觀看數<span class="p-1">{{ $question->viewCount}}</span> </small>
                    <small class="p-1">{{ $question-> created_at}}</small>
                </div>
            </div>
            @empty
            <div class="d-flex flex-column p-3 text-center" style="transform: rotate(0);">
                尚無資料
            </div>
            @endforelse
        </div>

    </div>
@endsection