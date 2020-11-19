<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/questions/store" method="post">
        @csrf
        <div>
            <label>title</label>
            <input type="text" name="title" value="{{ old('title') }}"/>
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div>
            <label>type</label>
                @foreach($types as $type)
                    <input name="type_id[]" type="checkbox" value="{{ $type->id }}"/><label>{{ $type->name }}</label>
                @endforeach
            @error('type_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div>
            <label>content</label>
            <input type="text" name="content"/>
            @error('content')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <input type="submit" value="submit"/>
    </form>
</body>
</html>