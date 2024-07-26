<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>書籍データの新規登録</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
    crossorigin="anonymous">
</head>
<body>
    <h1>以下のデータを登録しました</h1>
    <table class="table">
        <tr><th>書籍名</th><th>著者名</th><th>出版社</th><th>価格(税抜)</th><th>冊数</th><th>ISBN</th></tr>
        <tr>
            <td>{{ $book_name }}</td>
            <td>{{ $author}}</td>
            <td>{{ $publisher }}</td>
            <td>{{ $price }}</td>
            <td>{{ $num_of_books }}</td>
            <td>{{ $isbn }}</td>
        </tr>
    </table>
    <br>
    <a href="/booksmanagement/mainMenu">Topページに戻る</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
     crossorigin="anonymous"></script>
</body>
</html>
