<?php
//1. POSTデータ取得
$id = $_POST["id"];
$book   = $_POST["book"];
$b_url  = $_POST["b_url"];
$coment = $_POST["coment"];

require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE
 gs_bm_table
  SET 
  book = :book,
  b_url = :b_url,
  coment = :coment,
  indate = sysdate()
  WHERE id = :id;");
$stmt->bindValue(':book', $book, PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':b_url', $b_url, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':coment', $coment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    //*** function化する！*****************
    // $error = $stmt->errorInfo();
    // exit("SQLError:".$error[2]);
    sql_error($stmt);
}else{
    //*** function化する！*****************
    // header("Location: index.php");
    // exit();
    redirect('index.php');
}
?>