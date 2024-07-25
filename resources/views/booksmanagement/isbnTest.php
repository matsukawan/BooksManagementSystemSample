<?php
$base_url = 'https://api.openbd.jp/v1/get?isbn=';

    $tag = '9784801907607';

    $response = file_get_contents(
    $base_url.$tag
    );

    $result = json_decode($response,true);
    print_r($result);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>