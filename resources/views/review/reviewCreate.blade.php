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
        <th>本のタイトル：{{ $book_name }}</th>
      </tr>
      <tr>
        <th>著者名：{{ $author }}</th>
      </tr>
    </table>
  </ul>
  
  <form action="/review/reviewCreate" method="post">
    @csrf
    <input type="hidden" name="book_name" value="{{ $book_name }}">
    <input type="hidden" name="author" value="{{ $author }}">
    <input type="hidden" name="emp_id" value="{{ $emp_id }}">
    <input type="hidden" name="book_id" value="{{ $book_id }}">
    <input type="hidden" name="emp_name" value="{{ $emp_name }}">
    <input type="hidden" name="date" value="{{ date('Y年m月d日') }}">
    <div class="mb-3">
      <label for="rating" class="form-label">おすすめ度</label>
      <input type="number" name="rating" id="rating" required>
    </div>
    <!-- <div class="mb-3">
      <label for="emp_name" class="emp_name">名前</label>
      <input type="text" name="emp_name" id="emp_name" value="{{ $emp_name }}" repuired>
    </div>
    <div class="mb-3">
      <label for="emp_id" class="emp_id">社員ID</label>
      <input type="text" name="emp_id" id="emp_id" value="{{ $emp_id }}" required>
    </div>
    <div class="mb-3">
      <label for="create_date" class="create_date">投稿日</label>
      <input type="text" name="create_date" id="create_date" value="{{ date('Y年m月d日') }}">
    </div>
    <div class="mb-3">
      <label for="book_id" class="book_id">書籍ID</label>
      <input type="number" name="book_id" id="book_id" value="{{ $book_id }}" required>
    </div> -->
    <ul>
    <table class="table1">
    <tr>
        <th>名前：{{ $emp_name }}</th>
      </tr>
      <tr>
        <th>社員ID：{{ $emp_id }}</th>
      </tr>
      <tr>
        <th>投稿日：{{ date('Y年m月d日') }}</th>
      </tr>
      <tr>
        <th>書籍ID：{{ $book_id }}</th>
      </tr>
    </table>
  </ul>
    <div class="mb-3">
      <label for="comment" class="comment">コメント入力</label>
      <textarea name="comment" id="comment" cols="30" rows="10" required></textarea>
    </div>
    
      <input type="submit" value="投稿" class="btn btn-primary">
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>

</html>
