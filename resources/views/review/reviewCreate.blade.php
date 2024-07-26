<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>レビュー作成画面</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
  <h1>レビュー作成画面</h1>
  <ul>
    <table class="table1">
      <tr>
        <th>本のタイトル</th>
        <th>著者名</th>
      </tr>
      <tr>
        <th>{{ $book_name }}</th>
        <th>{{ $author }}</th>
      </tr>
    </table>

  </ul>
  <form action="/review/UpdateSuccess" method="post">
    @csrf
    <div class="aaaa">
      <label for="rating_check" class="aaaa">おすすめ度</label>
      <input type="number" name="rating_check" id="rating_check" required>
    </div>
    <br>

    <div class="aaaa">
      <label for="emp_name" class="aaaa">名前</label>
      <input type="text" name="emp_name" id="emp_name">
    </div>
H
    <div class="aaaa">
      <label for="commnet_day" class="aaaa">投稿日</label>
      <input type="text" name="comment_day" id="comment_day" value="{{date('Y年m月d日 H時i分')}}">
    </div>

    <div class="aaaa">
      <label for="comment_form" class="aaaa">コメント入力</label>
      <textarea class="aaaa" name="comment_form" id="comment_form" cols="30" rows="10" required></textarea>
    </div>

    <input type="submit" value="更新" class="btn btn-go">
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
