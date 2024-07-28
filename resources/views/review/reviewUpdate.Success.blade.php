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
    <table>
        <tr>
            <th>投稿番号</th>
            <th>投稿者名</th>
            <th>投稿記事</th>
        </tr>
        <tr>
            <td>{{ $id }}</td>
            <td>{{ $user_name }}</td>
            <td>{{ $posted_item }}</td>
        </tr>
    </table>
    <br>
    <a href="/">Topページに戻る</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous"></script>
</body>
</html>