<?php
include '../layout/coon.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Prepare and execute the DELETE query using prepared statements
    $stmt = $conn->prepare("DELETE FROM `panier` WHERE panier_id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}
?>
