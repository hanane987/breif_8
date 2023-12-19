<?php include '../layout/coon.php';
if ( empty($_SESSION["user"]) ) {  
  
    echo "no" ; 
   }else {
$user_id = $_SESSION["user"] ;

 
$panier_result = $conn->query("SELECT * FROM `panier` WHERE client_id = $user_id");
$panierData = $panier_result->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($panierData);

   }