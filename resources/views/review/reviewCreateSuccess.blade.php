<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>確認画面</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
  <h1>書籍のレビューを投稿しました</h1>

  <table class="table1">
    <tr>
      <th>作品名：{{ $book_name }}</th>     
    </tr>
    <tr>
      <th>著者名：{{ $author }}</th>
    </tr>
  </table>


  <table class="table2">
    <tr>
      <th>おすすめ度：{{ $rating }}</th>
    </tr>
  </table>

  <table class="table3">
    <tr>
      <th>名前：{{ $emp_name }}</th>     
    </tr>
    <tr>
      <th>日付：{{ $created_at }}</th>
    </tr>
    <tr>
    <tr>
      <th>投稿コメント：{{ $comment }}</th>
    </tr>
    <tr>

    </tr>
  </table>
  <br>
  <a href="/booksmanagement/mainMenu">一覧表示に戻る</a>
  {{-- <input type="submit" value="詳細画面に戻る" class="btn btn-back"> --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
