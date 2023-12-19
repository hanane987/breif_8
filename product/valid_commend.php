<?php  include '../layout/coon.php';


if (isset($_POST["valid_commend"]) && isset($_SESSION["user"])) {
    $valid_commend = $_POST["valid_commend"];
    $randomNumber = $_POST["randomNumber"];
    $user_id = $_SESSION["user"] ;
}


 
$panier_result = $conn->query("SELECT * FROM `panier` WHERE client_id = $user_id");
$panierData = $panier_result->fetchAll(PDO::FETCH_ASSOC);    
$names = [];
$total = 0 ; 
 foreach ($panierData as $value) {
    array_push($names, $value["Etiquette"]);
    $total += $value["OffreDePrix"] ;
 }
$implodarray = implode(" || ", $names);

 if (!empty($total)) {
    $stmt = $conn->prepare("INSERT INTO `details_commande`( `names`, `prix_total`, `commande_id`, `id_user`) VALUES ('$implodarray','$total','$randomNumber','$user_id')");

     
 $stmt->execute() ;

  }

  $stmt = $conn->prepare("DELETE FROM `panier` WHERE client_id = $user_id");

     
  $stmt->execute() ;











 header("Location: ../index.php");