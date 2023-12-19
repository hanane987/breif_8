      <?php include '../layout/coon.php';


      if (isset($_GET["id_add"])) {
        

      $id_add = $_GET["id_add"] ; 
     


      $produit_result = $conn->query("SELECT * FROM `produit` WHERE Reference = $id_add");
      $produitData = $produit_result->fetch(PDO::FETCH_ASSOC);
 


      $Reference = $produitData["Reference"] ;
      $Etiquette = $produitData["Etiquette"] ;
      $img = $produitData["img"] ;
      $OffreDePrix = $produitData["OffreDePrix"] ;
      $QuantiteStock = $produitData["QuantiteStock"] ;



      if ( empty($_SESSION["user"]) ) {  
      echo "no" ; 
      }else {
        $user_id = $_SESSION["user"] ;

        $panier_result = $conn->query("SELECT * FROM `panier`");
        $panierData = $panier_result->fetchAll(PDO::FETCH_ASSOC);

         
     
        $found = false;
foreach ($panierData as $item) {
    if ($item["Etiquette"] === $Etiquette && $item["client_id"] === $user_id) {
        // Matching product found in the cart
        $found = true;
        $panier_id =$item["panier_id"] ;
        $total =  $item["Stock"] + 1 ;
        $update_query = $conn->prepare("UPDATE `panier` SET `Stock` = :total WHERE panier_id = :id_product");
        $update_query->bindParam(':total', $total, PDO::PARAM_INT);
        $update_query->bindParam(':id_product', $panier_id, PDO::PARAM_INT);
        $update_query->execute();
        break; // Exit loop since product is found
    }
}

if (!$found) {
   
  $user_id = $_SESSION["user"] ;

  $stmt = $conn->prepare("INSERT INTO `panier`( `Etiquette`, `img`, `OffreDePrix`,`QuantiteStock`,  `client_id`) VALUES ('$Etiquette','$img','$OffreDePrix','$QuantiteStock' ,'$user_id')");
  
$stmt->execute() ; 
}
    
     
   
    

      

    


      }
        
        ?>




      <?php }  ?>