
<?php
// $proxy = array(
//             "http" => array(
//                "proxy" => "tcp://172.16.71.1:3128",
//                'request_fulluri' => true,
//             ),
//       );
//         $proxy_context = stream_context_create($proxy);

//         $value = 9784102102039;
//         $books = array('isbn', 'book_name', 'series', 'publisher', 'pubdate', 'cover', 'author');

//         $base_url = 'https://api.openbd.jp/v1/get?isbn=';

//         $response = file_get_contents(
//             $base_url.$value,false,$proxy_context
//         );
//         $result = json_decode($response, true);
//         $getdata = $result[0]["summary"];
//         foreach ($getdata as $key) {
//             $books = $key;
//             echo($books);
//             echo("\n");
//         }
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>書籍データの新規登録</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <style>
    body {
      width: 800px;
      margin: 0 auto;
    }
  </style>
</head>

<body>
  <h1>書籍データの新規登録</h1>

  <form action="/booksmanagement/registration" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="show">
        <input class="send" type="submit" value="情報を取得">
    </form>
  <form action="/booksmanagement/registrationSuccess" method="post">
    @csrf
    <div class="mb-3">
      <label for="isbn" class="form-label">ISBN</label>
      <input type="number" class="form-control" name="isbn" id="isbn" value="{{!isset($getdata) ? $getdata['isbn'] = '' : $getdata['isbn']}}" required>
    </div>
    <div class="mb-3">
      <label for="book_name" class="form-label">書籍名</label>
      <input type="text" class="form-control" name="book_name" id="book_name" value="{{!isset($getdata['title']) ? $getdata['title'] = '' : $getdata['title']}}" required>
    </div>
    <div class="mb-3">
      <label for="author" class="form-label">著者名</label>
      <input type="text" class="form-control" name="author" id="author"value="{{!isset($getdata['author']) ? $getdata['author'] = '' : $getdata['author']}}">
    </div>
    <div class="mb-3">
      <label for="publisher" class="form-label">出版社</label>
      <input type="text" class="form-control" name="publisher" id="publisher"value="{{!isset($getdata['publisher']) ? $getdata['publisher'] = '' : $getdata['publisher']}}">
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">価格(税抜)</label>
      <input type="number" class="form-control" name="price" id="price"></textarea>
    </div>
    <div class="mb-3">
      <label for="num_of_books" class="form-label">冊数</label>
      <input type="number" class="form-control" name="num_of_books" id="book_id" required>
    </div>
    <input type="submit" value="登録" class="btn btn-primary">
  </form>
  <br>
  @if ($errors->any())
    <ul>
      <li>{{ '既に登録済みです。' }}</li>
    </ul>
  @endif
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
