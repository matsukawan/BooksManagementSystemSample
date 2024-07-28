<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>トップページ</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <h1>図書管理</h1>
  <form action="/booksmanagement/logout" method="GET">
    <input type="submit" value="ログアウト">
  </form>
  <br>
  <h3>検索</h3>
  <form action="/booksmanagement/searchResult" method="GET">
    @csrf
    <input type="hidden" name="emp_id" value="{{ $emp_id }}">
    <input type="hidden" name="emp_name" value="{{ $emp_name }}">
    <input type="hidden" name="dep_id" value="{{ $dep_id }}">
    <input type="text" name="search_word">
    <input type="submit" value="検索">
  </form>
  <br>
  @if ($dep_id == 1)
    <form action="/booksmanagement/registration" method="GET">
      @csrf
      <input type="hidden" name="book_id" value="{{ $dep_id }}">
      <input type="submit" value="登録">
    </form>
  @endif
  <hr>
  <h3>一覧</h3>
  <table class="table">
    <tr>
      <th>No</th>
      <th>書籍名</th>
      <th>著者名</th>
      <th>出版社</th>
      {{-- <th>価格</th> --}}
      {{-- <th>ISBN</th> --}}
      {{-- <th>冊数</th> --}}
      {{-- <th>登録日</th> --}}
      <th>詳細</th>
    </tr>
    @foreach ($records as $record)
      <tr>
        <td>{{ $loop->index + 1 }}</td>
        <td>{{ $record->book_name }}</td>
        <td>{{ $record->author }}</td>
        <td>{{ $record->publisher }}</td>
        {{-- <td>{{ $record->price }}</td> --}}
        {{-- <td>{{ $record->isbn }}</td> --}}
        {{-- <td>{{ $record->num_of_books }}</td> --}}
        {{-- <td>{{ $record->created_at }}</td> --}}
        <td>
          <form action="/booksmanagement/detailView" method="GET">
            @csrf
            <input type="hidden" name="book_id" value="{{ $record->id }}">
            <input type="hidden" name="emp_id" value="{{ $emp_id }}">
            <input type="hidden" name="emp_name" value="{{ $emp_name }}">
            <input type="hidden" name="dep_id" value="{{ $dep_id }}">
            <input type="submit" value="詳細">
          </form>
        </td>
      </tr>
    @endforeach
  </table>
  <br>
  {{ $records->links() }}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></script>
</body>

</html>