<?php
//１．PHP
//select.phpのPHPコードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。
$id = $_GET['id'];
// var_dump($id);

//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
require_once("funcs.php");
$pdo = db_conn();


//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=". $id);
$status = $stmt->execute();


//３．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>更新</title>
    <link href="css/stylesheet.css" rel="stylesheet">
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <a class="navbar-brand" href="index.php">データ登録</a>
    </header>

            <?= $view ?>

<!-- Main[Start] -->
<form method="POST" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>お気に入りの本【更新画面】</legend>
        <tr>
            <td>書籍名</td>
            <td><input type="text" name="book" value=<?= $result['book'] ?>></td>
        </tr>
        <tr>
            <td>書籍_URL</td>
            <td><input type="text" name="b_url" value=<?= $result['b_url'] ?>></td>
        </tr>
        <tr>
            <td>書籍コメント</td>
            <td><textArea name="coment" rows="4" cols="40"> <?= $result['coment'] ?></textArea></td>
        </tr>
        <input type="hidden" name="id" value= <?= $result['id'] ?>>
        <input type="submit" value="更新">
   </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>

</html>