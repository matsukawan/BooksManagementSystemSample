<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>図書管理システムサンプル</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous">
</head>
<body>
<h1>全件表示</h1>
    <table class="table">
        <tr><th>書籍ID</th><th>書籍名</th><th>著者名</th><th>出版社</th><th>価格</th><th>ISBN</th><th>冊数</th><th>作成日時</th></tr>
        @foreach($records as $record)
        <tr>
            <td>{{ $record -> id }}</td>
            <td>{{ $record -> book_name }}</td>
            <td>{{ $record -> author }}</td>
            <td>{{ $record -> publisher}}</td>
            <td>{{ $record -> price }}</td>
            <td>{{ $record -> isbn }}</td>
            <td>{{ $record -> num_of_books }}</td>
            <td>{{ $record -> created_at }}</td>
        </tr>
        @endforeach
    </table>
    <a href="/booksmanagement/mainMenu">Topページに戻る</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous"></script>
</body>
</html>