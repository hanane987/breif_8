<?php include '../layout/coon.php';

 $id = $_GET["id"] ;

$stmt = $conn->prepare("DELETE FROM `details_commande` WHERE details_id =$id ");
$stmt->execute(); 






?>
