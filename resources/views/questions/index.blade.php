@extends('layouts.front')
@section('title') {{ env('APP_NAME') }}－討論區 @endsection
@section('content')
    <div>
        @foreach($questions as $question)
            <div style="border: solid; padding: 3px; margin: 5px;">
                <div style="dispaly: inline-block">
                    <h4>Question id: {{$question->id}}</h4>
                    <small>last update: {{$question->updated_at}}</small>
                    <div style="border: solid #aaa">
                        title: <div>{{ $question->title }}</div>
                        content:<div>{{ $question->content }}</div>
                        type:
                        @foreach($question->questionTypes as $question_type)
                            <div>{{ $question_type->type->name}}</div>
                        @endforeach
                        <div style="border: solid; padding: 3px; margin: 5px;">
                            <div>Vote  <div>{{ $question->votes()->sum('count') }}</div></div>
                            <div>ViewCount  <div>{{ $question->viewCount }}</div></div>
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
                            <div>Answer {{ $loop->iteration }}</div>
                            
                            
                            <div style="border: solid; padding: 3px; margin: 5px;">
                                <div>Vote  <div>{{ $answer->votes()->sum('count') }}</div></div>
                            </div>
                            <div>{{ $answer->content }}</div>
                         </div>
                         
                        
                    @empty
                        <div>no answer now</div>
                    @endforelse
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
@endsection