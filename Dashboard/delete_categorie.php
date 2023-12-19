<?php include '../layout/coon.php';

 $id = $_GET["id"] ;

$stmt = $conn->prepare("DELETE FROM `categorie` WHERE id = $id");
$stmt->execute(); 

header("Location: ../dashboard_Categories.php");
exit; 




?>
