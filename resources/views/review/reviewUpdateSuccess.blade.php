<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データの更新</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous">
</head>
<body>
    <h1>以下のデータを更新しました</h1>
    <table class="table1">
      <tr>
        <th>名前：{{ $emp_name }}</th>     
      </tr>
    <tr>
      <th>作品名：{{ $book_name }}</th>     
    </tr>
    <tr>
      <th>著者名：{{ $author }}</th>
    </tr>
    <tr>
      <th>おすすめ度：{{ $records -> rating }}</th>
    </tr>
    <tr>
      <th>日付：{{ $records -> created_at }}</th>
    </tr>
    <tr>
    <tr>
      <th>投稿コメント：{{ $records -> comment }}</th>
    </tr>
  </table>
    <br>
    <a href="/booksmanagement/mainMenu">一覧表示に戻る</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous"></script>
</body>
</html>