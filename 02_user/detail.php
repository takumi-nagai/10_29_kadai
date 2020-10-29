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
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=". $id);
$status = $stmt->execute();


//３．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();
}

var_dump($result['kanri_flg']);
var_dump($result['life_flg']);
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
        <a class="navbar-brand" href="index.php">ユーザ情報【登録】</a>
    </header>
    
            <?= $view ?>

<!-- Main[Start] -->
<form method="POST" action="update.php">
  <div class="jumbotron">
    <fieldset>

    
        <legend>ユーザ情報【更新】</legend>
            <p>氏名<input type="text" name="name" value=<?= $result['name'] ?>></p>
            <p>ID<input type="text" name="lid" value=<?= $result['lid'] ?>></p>
            <p>パスワード<input type="text" name="pw" value=<?= $result['pw'] ?>></p>
            <p>ユーザ区分<input type="checkbox" name="kanri_flg" <?= $result['kanri_flg']==1 ? 'checked':''?>><input type="hidden" name="kanri_flg" value="0"></p>
            <p>在籍状況<input type="checkbox" name="life_flg" <?= $result['life_flg']==1 ? 'checked':''?>><input type="hidden" name="life_flg" value="0"></p>
            <input type="hidden" name="id" value= <?= $result['id'] ?>>
            <input type="submit" value="更新">
   </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>

</html>