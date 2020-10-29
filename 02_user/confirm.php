<?php
require_once('funcs.php');
$id = $_GET['id'];
$pdo = db_conn();
echo($id);
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=". $id);
$status = $stmt->execute();
$result = $stmt->fetch();
$name = $result["name"];
echo($name);
$view = 'delete.php?id='.$result["id"];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>削除確認</title>
<link href="css/stylesheet2.css" rel="stylesheet">
</head>
<body id="main">
<!-- Head[Start] -->
<header>
</header>
<!-- Head[End] -->
<h3>削除してもよいですか</h3>
<!-- Main[Start] -->
<button><a href=<?=$view?>>[削除]</a></button>
<button><a href="select.php">[戻る]</a></button>
<!-- Main[End] -->
</body>
</html>