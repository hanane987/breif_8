<?php include '../layout/coon.php';

 $id = $_GET["id"] ;

$stmt = $conn->prepare("DELETE FROM `users` WHERE id = $id");
$stmt->execute(); 






?>
