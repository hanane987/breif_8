<?php
include '../layout/coon.php'; // Include your database connection file

if (isset($_GET["op"]) && isset($_GET["id_product"]) && !empty($_SESSION["user"])) {
    $op = $_GET["op"];
    $id_product = $_GET["id_product"];
    $user_id = $_SESSION["user"];

    // Prepare and execute the SELECT query using prepared statements
    $panier_query = $conn->prepare("SELECT * FROM `panier` WHERE client_id = :user_id AND panier_id = :id_product");
    $panier_query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $panier_query->bindParam(':id_product', $id_product, PDO::PARAM_INT);
    $panier_query->execute();

    $panierData = $panier_query->fetch(PDO::FETCH_ASSOC);

    if (!empty($panierData)) {
        $currentStock = $panierData['Stock'];
        $QuantiteStock = $panierData['QuantiteStock'];
        // && $currentStock < $QuantiteStock

        // Update the stock based on the operation received
        if ($op == 1 ) {
            $currentStock += 1;
          
        } else if ($op == 0 && $currentStock > 1) {
            $currentStock -= 1;
           
        }

        // Prepare and execute the UPDATE query using prepared statements
        $update_query = $conn->prepare("UPDATE `panier` SET `Stock` = :currentStock WHERE panier_id = :id_product");
        $update_query->bindParam(':currentStock', $currentStock, PDO::PARAM_INT);
        $update_query->bindParam(':id_product', $id_product, PDO::PARAM_INT);
        $update_query->execute();

     
} 
}
?>
