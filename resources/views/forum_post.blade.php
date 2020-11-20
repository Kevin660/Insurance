<!DOCTYPE html>
<html lang="en">

@extends('layouts.front')
@section('title') {{ env('APP_NAME') }}－發問 @endsection
@section('head')
<link href="/css/forum.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="mt-3 my-3 p-3 bg-white rounded shadow d-flex justify-content-center">
            <form id="post" method="post" action="/questions/store" class="text-center">
                @csrf
                <div class="my-3 text-left">
                    <label class="h4" for="title">標題</label>
                    <input name="title" value="{{ old('title') }}" type="text" class="form-control" id="title">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="my-3 text-left">
                    <label class="h4" for="content">內文</label>
                    <textarea class="form-control" id="content" name="content" rows="7" form="post"></textarea>
                    @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="my-3 text-left">
                    <label class="h4">標籤</label>
                    <br>
                    <ul class="ckb-tag">
                        @foreach($types as $type)
                        <li>
                            <input type="checkbox" name="type_id[]" id="{{ $type->id }}" value="{{ $type->id}}">
                            <label for="{{ $type->id }}">{{ $type->name }}</label>
                        </li>
                        @endforeach
                        @error('type_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </ul>
                </div>
                <input type="submit" value="發文" class="btn btn-success mt-3 px-5" />
            </form>
        </div>
    </div>
    @endsection