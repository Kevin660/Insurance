<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
    <script>
        function answer_question(id, t){
            var cont = $(t).siblings(".answer_content");
            $.ajax({
                url: "/questions/"  + id + "/answer",
                type: "post",
                data: {
                    content: cont.val(),
                }, 
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(e){
                    location.reload();
                },
                error: function(e){
                    alert('error');
                    console.log(e.responseText);
                }
            });
        }
        function vote(id, type, method){
            $.ajax({
                url: "/" + type + "/" + id +"/" + method,
                type: "post",
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(e){
                    location.reload();
                }
            });
        }
        function accept_answer(q_id, a_id){
            $.ajax({
                url: "/questions/" + q_id + "/accept/" + a_id,
                type: "post",
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(e){
                    location.reload();
                }
            });
        }
    </script>
</head>
<body>
    <div style="border: solid; padding: 3px; margin: 5px;">
        <div style="dispaly: inline-block">
            <h4>Question @if($question->answer == null) Unresoleved @else Resolve @endif</h4>
            <small>last update: {{$question->updated_at}}</small>
            <div>ViewCount: {{ $question->viewCount }}</div>
            <div style="border: solid #aaa">
                title: <div>{{ $question->title }}</div>
                content:<div>{{ $question->content }}</div>
                type:
                @foreach($question->questionTypes as $question_type)
                    <div>{{ $question_type->type->name}}</div>
                @endforeach
                <div style="border: solid; padding: 3px; margin: 5px;">
                    <div>Vote  <div id="questions-vote-{{ $question->id }}">{{ $question->votes()->sum('count') }}</div></div>
                    @php ($myVote = $question->votes->where('user_id', $user->id)->first())
                    @php ($myCount = $myVote ? $myVote->count : 0)
                    <input type='button' onclick="vote({{ $question->id }}, 'questions', 'voteUp')" value="up" @if($myCount == 1) disabled @endif/>
                    <input type='button' onclick="vote({{ $question->id }}, 'questions', 'voteDown')" value="down" @if($myCount == -1) disabled @endif/>
                    <input type='button' onclick="vote({{ $question->id }}, 'questions', 'voteCancel')" value="cancel"/>
                </div>
            </div>
            <div style="border: solid #aaa">
                <h4>Type your answer</h4>
                <div>
                    <textarea class="answer_content" name="content" placeholder="answer the question"></textarea>
                    <input type="button" onclick="answer_question({{ $question->id }}, this);" value="submit"/>
                </div>
            </div>
        </div>
        <div style="border: solid #aaa">
            <h4>All answers</h4>
            @forelse($question->answers as $answer)
                <div>
                    <div>Answer {{ $loop->iteration }} @if($question->answer == null) <input type="button" onclick="accept_answer({{$question->id}}, {{$answer->id}})" value="accept"/> @elseif($question->answer->id == $answer->id) <div class="alert alert-success">Accepted</div> @endif</div>
                    <div style="border: solid; padding: 3px; margin: 5px;">
                        <div>Vote  <div id="answers-vote-{{ $answer->id }}">{{ $answer->votes()->sum('count') }}</div></div>
                        @php ($myVote = $answer->votes->where('user_id', $user->id)->first())
                        @php ($myCount = $myVote ? $myVote->count : 0)
                        <input type='button' onclick="vote({{ $answer->id }}, 'answers', 'voteUp')" value="up" @if($myCount == 1) disabled @endif/>
                        <input type='button' onclick="vote({{ $answer->id }}, 'answers', 'voteDown')" value="down" @if($myCount == -1) disabled @endif/>
                        <input type='button' onclick="vote({{ $answer->id }}, 'answers', 'voteCancel')" value="cancel"/>
                    </div>
                    <div>{{ $answer->content }}</div>
                </div>
            @empty
                <div>no answer now</div>
            @endforelse
        </div>
    </div>
</body>
</html>