<?php include '../layout/coon.php';

 $id = $_GET["id"] ;

$stmt = $conn->prepare("DELETE FROM `produit` WHERE Reference = $id");
$stmt->execute(); 
header("Location: ../dashboard_Products.php");
exit; 




?>
