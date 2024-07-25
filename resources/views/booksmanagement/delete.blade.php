<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>データの削除</title>
</head>
<body>
    <h1>データの削除</h1>
    @if(isset($record))
        <form action="/db/deleteSuccess.blade.php" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $record->id }}" readonly><br>
        書籍ID{{  $record->id }}<br>
        書籍名<input type="text"name="book_name" value="{{ $record->book_name}}"readonly><br>
        著者名<input type="text" name="author" value="{{ $record->author }}" readonly>
        出版社<input type="text" name="publiser" value="{{ $record->publiser}}" readonly>
        価格(税抜)<input type="number" name="price" value="{{ $record->price }}" readonly>
        <input type="submit" value="削除"><br>
        <a href="/mainMenu.blade.php">一覧表示画面に戻る</a>
        </form>
    @else
    <form action="/db/delete.blade.php" method="post">
        @csrf
        書籍ID<input type="number" name="id" required>
        <input type="submit" value="登録データ表示">
    </form>
    @endif
</body>
</html>
