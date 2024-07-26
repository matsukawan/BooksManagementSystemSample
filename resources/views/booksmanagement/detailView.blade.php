<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>詳細表示</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
  @if ($dep_id == 1)
    <form action="/booksmanagement/delete" method="GET">
      @csrf
      <input type="hidden" name="book_id" value="{{ $book_id }}">
      <input type="hidden" name="emp_id" value="{{ $emp_id }}">
      <input type="hidden" name="dep_id" value="{{ $dep_id }}">
      <input type="submit" value="削除">
    </form>
  @endif

  @if ($review_exist)
    <form action="" method="GET">
      @csrf
      <input type="hidden" name="book_id" value="{{ $book_id }}">
      <input type="hidden" name="book_id" value="{{ $book_name }}">
      <input type="hidden" name="book_id" value="{{ $author }}">
      {{-- <input type="hidden" name="book_id" value="{{ $comment }}"> --}}
      {{-- <input type="hidden" name="book_id" value="{{ $rating }}"> --}}
      <input type="submit" value="レビュー編集">
    </form>
  @else
    <form action="/review/reviewCreate" method="GET">
      @csrf
      <input type="hidden" name="book_id" value="{{ $book_id }}">
      <input type="hidden" name="book_id" value="{{ $book_name }}">
      <input type="hidden" name="book_id" value="{{ $author }}">
      <input type="submit" value="レビュー投稿">
    </form>
  @endif

  <table class="table">
    <tr>
      <th>書籍名</th>
      <th>著者名</th>
      <th>出版社</th>
      <th>価格</th>
      <th>ISBN</th>
      <th>冊数</th>
      <th>登録日</th>
    </tr>
    <tr>
      <td>{{ $book_name }}</td>
      <td>{{ $author }}</td>
      <td>{{ $publisher }}</td>
      <td>{{ $price }}</td>
      <td>{{ $isbn }}</td>
      <td>{{ $num_of_books }}</td>
      <td>{{ $created_at }}</td>
    </tr>
  </table>

  <table class="table">
    <tr>
      <th>おすすめ度</th>
      <th>レビュー</th>
    </tr>
    @foreach ($reviews as $review)
      <tr>
        <td>{{ $review->rating }}</td>
        <td>{{ $review->comment }}</td>
      </tr>
    @endforeach
  </table>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
