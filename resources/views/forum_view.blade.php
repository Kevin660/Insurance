@extends('layouts.front')
@section('title') {{ env('APP_NAME') }}－登入 @endsection
@section('head')
<link href="/css/forum.css" rel="stylesheet">
<script>
        function answer_question(id, t) {
            var cont = $(t).siblings(".answer_content");
            $.ajax({
                url: "/questions/" + id + "/answer",
                type: "post",
                data: {
                    content: cont.val(),
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (e) {
                    location.reload();
                },
                error: function (e) {
                    alert('error');
                    console.log(e.responseText);
                }
            });
        }
        function vote(id, type, method) {
            $.ajax({
                url: "/" + type + "/" + id + "/" + method,
                type: "post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (e) {
                    location.reload();
                }
            });
        }
        function accept_answer(q_id, a_id) {
            $.ajax({
                url: "/questions/" + q_id + "/accept/" + a_id,
                type: "post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (e) {
                    location.reload();
                }
            });
        }
        function questionDelete(id){
        if (!confirm('確定刪除?')) return false;
        $.ajax({
            'url': '/questions/' + id,
            'method': 'post',
            'data':{
                '_method': 'delete',
            },
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function(){
                alert('刪除成功');
            },
            error: function(){
                alert('發生錯誤');
            },
            complete: function(){
                location.reload();
            }
            
        });
    }
    function answerDelete(id){
        if (!confirm('確定刪除?')) return false;
        $.ajax({
            'url': '/answer/' + id,
            'method': 'post',
            'data':{
                '_method': 'delete',
            },
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function(){
                alert('刪除成功');
            },
            error: function(){
                alert('發生錯誤');
            },
            complete: function(){
                location.reload();
            }
            
        });
    }
    </script>
@endsection
@section('content')

    

    <div class="container">
        <!-- 作者 -->
        <div class="mt-3 my-3 p-3 bg-white rounded shadow">
            <div class="row">
                <div class="col-3 text-center">
                    <img class="rounded-circle" src="/storage/img/user/{{ $question->user->img }}" style="height:150px;width:150px">
                    <p class="p-2"><a href="#">{{$question->user->chinese_name}}</a></p>
                </div>
                <div class="col-9 d-flex flex-column">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <h3>{{$question->title}}</h3>
                            <p class="ml-2">
                                @if($question->answer == null)
                                <i class="badge badge-danger">未解決</i>
                                @else
                                <i class="badge badge-success">已解決</i>
                                @endif
                            </p>
                        </div>
                        <div>
                            <div>
                            @if($user == $question->user && $question->answer == null)
                                <a href="/questions/{{$question->id}}/edit" class="btn btn-sm btn-outline-secondary">編輯貼文</a>
                                <button class="btn btn-sm btn-outline-danger" onclick="questionDelete({{$question->id}})">刪除貼文</a>
                            @endif
                            </div>
                        </div>
                        
                    </div>
                    <div class="mr-auto">
                        @foreach($question->questionTypes as $question_type)
                        <a href="#" class="badge badge-secondary">{{ $question_type->type->name}}</a>
                        @endforeach

                    </div>
                    <div class="mt-1">
                        <p>{{$question->content}}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="mr-auto">
                            @php ($myVote = $user ? $question->votes->where('user_id', $user->id)->first() : null)
                            @php ($myCount = $myVote ? $myVote->count : 0)
                            <button class="btn fas fa-caret-up text-secondary btn-vote"
                                onclick="vote({{ $question->id }}, 'questions', 'voteUp')" value="up" @if($myCount==1)
                                disabled @endif></button>
                            <span class="p-1"
                                id="questions-vote-{{ $question->id }}">{{ $question->votes()->sum('count') }}</span>
                            <button class="btn fas fa-caret-down text-secondary btn-vote"
                                onclick="vote({{ $question->id }}, 'questions', 'voteDown')" value="down"
                                @if($myCount==-1) disabled @endif></button>
                                @if($myCount!==0) 
                                   <button class="btn btn-sm text-secondary font-weight-light"
                                    onclick="vote({{ $question->id}}, 'questions', 'voteCancel')" value="cancel"
                                     >取消評價</button>
                                     @endif
                        </div>
                        <small>{{$question->created_at}}</small>
                    </div>
                </div>

            </div>

        </div>


        <!-- 回答者 -->
        <div id="forum" class="my-3 pb-3 pl-3 pr-3 bg-white rounded shadow-sm">

            @forelse($question->answers as $answer)
            <div class="p-3">
                <div class="row">

                    <div class="col-3 text-center">
                        <img class="rounded-circle" src="/storage/img/user/{{ $answer->user->img }}" style="height:150px;width:150px">
                        <p class="mr-auto"><a href="#">{{$answer->user->chinese_name}}</a></p>
                    </div>

                    <div class="col-9 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            #{{ $loop->iteration }}

                            @if($user == $question->user)
                                @if( $question->answer == null)
                                <button type="button" class="btn btn-sm btn-outline-success"
                                    onclick="accept_answer({{$question->id}}, {{$answer->id}})">設為正解</button>

                                @elseif($question->answer->id == $answer->id)
                                <div class="alert alert-success"><i class="fas fa-star"></i> 正解</div>
                                @endif
                            @endif
@if($user == $answer->user && $answer->question->answer == null)<div class="d-flex">
                            
                            <a href="/answers/{{$answer->id}}/edit" class="btn btn-sm btn-outline-secondary">編輯回答</a>
                            <button class="btn btn-sm btn-outline-danger" onclick="answerDelete({{$answer->id}})">刪除回答</a>
                          
</div>  @endif
                        </div>
                        <p>{{$answer->content}}</p>

                        <div class="d-flex justify-content-between mt-auto">
                            <div class="mr-auto">
                                @php ($myVote = $user ? $answer->votes->where('user_id', $user->id)->first() : null)
                                @php ($myCount = $myVote ? $myVote->count : 0)
                                <button class="btn fas fa-caret-up text-secondary btn-vote"
                                    onclick="vote({{ $answer->id }}, 'answers', 'voteUp')" value="up" @if($myCount==1)
                                    disabled @endif></button>
                                <span class="p-1"
                                    id="answers-vote-{{ $answer->id }}">{{ $answer->votes()->sum('count') }}</span>
                                <button class="btn btn-sm fas fa-caret-down text-secondary btn-vote"
                                    onclick="vote({{ $answer->id }}, 'answers', 'voteDown')" value="down"
                                    @if($myCount==-1) disabled @endif></button>
                                   @if($myCount!==0) 
                                   <button class="btn btn-sm text-secondary font-weight-light"
                                    onclick="vote({{ $answer->id }}, 'answers', 'voteCancel')" value="cancel"
                                     >取消評價</button>
                                     @endif
                            </div>
                            <small> {{$answer->created_at}}</small>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p class="alert alert-warning ">尚無回答</p>
            @endforelse

            <div class="p-3">
                <h4>回答問題</h4>
                <div class="d-flex flex-column align-items-end">
                    <textarea class="answer_content form-control" name="content" rows="4"
                        placeholder="輸入回答 ..."></textarea>
                    <input type="button" class="btn btn-success mt-3 px-5"
                        onclick="answer_question({{ $question->id }}, this);" value="提交" />
                </div>
            </div>
        </div>
        @endsection