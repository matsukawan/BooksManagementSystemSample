<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データの更新</title>
</head>
<body>
    <h1>データの更新</h1>
        <form action="/review/reviewUpdateSuccess" method="post">
            <input type="hidden" name="book_name" value="{{ $book_name }}">
            <input type="hidden" name="author" value="{{ $author }}">
            <input type="hidden" name="emp_name" value="{{ $emp_name }}">
            <input type="hidden" name="emp_id" value="{{ $records -> emp_id }}">
            <input type="hidden" name="book_id" value="{{ $records -> book_id }}">
            @csrf
            <table class="table1">
                <tr>
                    <th>書籍名：{{ $book_name }}</th>
                </tr>
                <tr>
                    <th>著者：{{ $author }}</th>
                </tr>
                <tr>
                    <th>名前：{{ $emp_name }}</th>
                </tr>
                <tr>
                    <th>社員ID：{{ $records -> emp_id }}</th>
                </tr>
                <tr>
                    <th>書籍ID：{{ $records -> book_id }}</th>
                </tr>
            </table>
            <div class="mb-3">
                おすすめ度：<input type="number" name="rating" value="{{ $records -> rating }}" required>
            </div>
            <div class="mb-3">
                コメント入力：<textarea name="comment" id="comment" cols="30" rows="10"  required>{{ $records -> comment }}</textarea>
            </div>
            <input type="submit" value="レビュー更新">
        </form>

</body>
</html>