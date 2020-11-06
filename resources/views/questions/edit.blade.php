<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/questions/{{ $question->id }}" method="post">
        @csrf
        <div>
            <label>title</label>
            <input type="text" name="title" value="{{ $question->title }}"/>
        </div>
        <div>
            <label>content</label>
            <input type="text" name="content" value="{{ $question->content }}"/>
        </div>
        <input type="submit" value="submit"/>
    </form>
</body>
</html>