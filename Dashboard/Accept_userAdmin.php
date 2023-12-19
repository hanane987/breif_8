<?php include '../layout/coon.php';


$id = $_GET["id"] ;

$Users_result = $conn->query("SELECT * FROM `users` WHERE id = $id");
$UsersData = $Users_result->fetch(PDO::FETCH_ASSOC);


$Email = $UsersData["Email"] ;
$Password = $UsersData["Password"] ;



$stmt = $conn->prepare("INSERT INTO `admin`( `Email`, `Password`) VALUES ('$Email','$Password')");

$stmt->execute();



$stmt = $conn->prepare("DELETE FROM `users` WHERE id = $id");
$stmt->execute(); 
?>