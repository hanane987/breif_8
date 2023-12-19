<?php include '../layout/coon.php';

 $id = $_GET["id"] ;

$stmt = $conn->prepare("UPDATE `details_commande` SET `confirm_achter`= 1 WHERE details_id =$id ");
$stmt->execute(); 






?>
