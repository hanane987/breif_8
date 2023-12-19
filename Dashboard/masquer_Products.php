<?php include '../layout/coon.php';

 $id = $_GET["id"] ;
 $timee = date("Y/m/d H:i:s");

 $stmt = $conn->prepare("SELECT * FROM `produit` WHERE Reference = ?");
 $stmt->execute([$id]);
 $produitData = $stmt->fetch(PDO::FETCH_ASSOC);

 if ($produitData) {
     if (empty($produitData["deleted_at"])) {
         // Update the 'deleted_at' field with the current timestamp
         $stmt = $conn->prepare("UPDATE `produit` SET `deleted_at` = ? WHERE Reference = ?");
         $stmt->execute([$timee, $id]);
     } else {
         // Set the 'deleted_at' field to NULL 
         $stmt = $conn->prepare("UPDATE `produit` SET `deleted_at` = NULL WHERE Reference = ?");
         $stmt->execute([$id]);
         
     }
 }



// header("Location: ../dashboard_Categories.php");
// exit; 




?>
