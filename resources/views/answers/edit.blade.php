<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/answers/{{ $answer->id }}" method="post">
        @csrf
        <div>
            <label>content</label>
            <textarea type="text" name="content">{{ $answer->content }}</textarea>
        </div>
        <input type="submit" value="submit"/>
    </form>
</body>
</html>