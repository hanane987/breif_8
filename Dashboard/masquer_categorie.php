<?php include '../layout/coon.php';

 $id = $_GET["id"] ;
 $timee = date("Y/m/d H:i:s");

 $stmt = $conn->prepare("SELECT * FROM `categorie` WHERE id = ?");
 $stmt->execute([$id]);
 $categorieData = $stmt->fetch(PDO::FETCH_ASSOC);

 if ($categorieData) {
     if (empty($categorieData["deleted_at"])) {
         // Update the 'deleted_at' field with the current timestamp
         $stmt = $conn->prepare("UPDATE `categorie` SET `deleted_at` = ? WHERE id = ?");
         $stmt->execute([$timee, $id]);

         $stmt = $conn->prepare("UPDATE `produit` SET `deleted_at` = ? WHERE CategorieID = ?");
         $stmt->execute([$timee, $id]);

     } else {
         // Set the 'deleted_at' field to NULL 
         $stmt = $conn->prepare("UPDATE `categorie` SET `deleted_at` = NULL WHERE id = ?");
         $stmt->execute([$id]);
         $stmt = $conn->prepare("UPDATE `produit` SET `deleted_at` = NULL WHERE CategorieID = ?");
         $stmt->execute([ $id]);
         
     }
 }



// header("Location: ../dashboard_Categories.php");
// exit; 




?>
