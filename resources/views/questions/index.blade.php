<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>Document</title>
    <script>
        function answer_question(id, t){
            var cont = $(t).siblings(".answer_content");
            $.ajax({
                url: "/questions/"  + id + "/answer/",
                type: "post",
                data: {
                    content: cont.value
                }, 
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(){

                }
            });
        }
    
    </script>
</head>
<body>
    <div>
        @foreach($questions as $question)
            <div style="border: solid; padding: 3px">
                <div style="border: solid #aaa">
                    <div>{{ $question->title }}</div>
                    <div>{{ $question->content }}</div>
                    @foreach($question->questionTypes as $question_type)
                        <div>{{ $question_type->type->name}}</div>
                    @endforeach
                    <form action="/questions/{{ $question->id }}/voteUp" method="post">
                        @csrf
                        <input type='submit' value="up"/>
                    </form>
                    <form action="/questions/{{ $question->id }}/voteDown" method="post">
                        @csrf
                        <input type='submit' value="down"/>
                    </form>
                    <form action="/questions/{{ $question->id }}/voteCancel" method="post">
                        @csrf
                        <input type='submit' value="cancel"/>
                    </form>
                </div>
                <div style="border: solid #aaa">
                    <div>
                        <textarea class="answer_content" name="content" placeholder="answer the question"></textarea>
                        <input type="button" onclick="answer_question({{ $question->id }}, this);" value="submit"/>
                    </div>
                </div>
                <div style="border: solid #aaa">
                    @foreach($question->answers as $answer)
                        <div>{{ $answer->contentf }}</div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>