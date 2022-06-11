<?php
// ※detail.phpからPHP部分をコピペ
$id = $_GET['id'];

require_once('db_connect.php');
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('DELETE FROM userData WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

$view = '';
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}

?>