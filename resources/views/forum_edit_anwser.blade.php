
@extends('layouts.front')
@section('title') {{ env('APP_NAME') }}－編輯回答 @endsection
@section('head')
<link href="/css/forum.css" rel="stylesheet">
@endsection
@section('content')
<div class="container">
        <div class="mt-3 my-3 p-3 bg-white rounded shadow d-flex justify-content-center">
            <form id="post" method="post" action="/answers/{{ $answer->id }}" class="text-center">
                @csrf
                

                <div class="my-3 text-left">
                    <label class="h4" for="content">編輯回答</label>
                    <textarea class="form-control" id="content" name="content" rows="7" form="post">{{ $answer->content }}</textarea>
                    @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                

                <input type="submit" value="修改" class="btn btn-success mt-3 px-5" />
            </form>
        </div>
    </div>
    @endsection


   