<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データの更新</title>
</head>
<body>
    <h1>データの更新</h1>
    @if(isset($record))
        <form action="/db/update" method="post">
            @csrf
            //行頭に投稿番号{{ $record -> id }}を入力すれば表示可能
            //投稿番号{{ $record -> id }}<input type="hidden" name="id" value="{{ $record -> id }}"><br>
            <input type="hidden" name="id" value="{{ $record -> id }}"><br>
            投稿者<input type="text" name="user_name" value="{{ $record -> user_name }}"><br>
            投稿記事<textarea name="posted_item">{{ $record -> posted_item }}</textarea>
            <input type="submit" value="更新">
        </form>
    @else
        <form action="/db/edit" method="get">
            @csrf
            投稿番号<input type="number" name="id" required>
            <input type="submit" value="データ表示">
        </form>
    @endif
</body>
</html>