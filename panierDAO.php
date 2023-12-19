<?php

require_once 'connexion.php';
require_once 'databasepoo.php';
require_once 'classpanier.php';


class PanierDAO {
    private $conn;

   
    public function __construct(){
        $this->db = DatabaseConnection::getInstance()->getConnection(); 
    }

       public function insertPanier(Panier $panier) {
        $query = "INSERT INTO panier_table (panierId, etiquette, img, offreDePrix, quantiteStock, stock, clientId, validCommend)
                  VALUES (:panierId, :etiquette, :img, :offreDePrix, :quantiteStock, :stock, :clientId, :validCommend)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(':panierId', $panier->getPanierId());
        $stmt->bindValue(':etiquette', $panier->getEtiquette());
        $stmt->bindValue(':img', $panier->getImg());
        $stmt->bindValue(':offreDePrix', $panier->getOffreDePrix());
        $stmt->bindValue(':quantiteStock', $panier->getQuantiteStock());
        $stmt->bindValue(':stock', $panier->getStock());
        $stmt->bindValue(':clientId', $panier->getClientId());
        $stmt->bindValue(':validCommend', $panier->getValidCommend());

        return $stmt->execute();
    }

    public function updatePanier(Panier $panier) {
        $query = "UPDATE panier_table
                  SET etiquette = :etiquette, img = :img, offreDePrix = :offreDePrix, quantiteStock = :quantiteStock, stock = :stock, clientId = :clientId, validCommend = :validCommend
                  WHERE panierId = :panierId";

        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(':panierId', $panier->getPanierId());
        $stmt->bindValue(':etiquette', $panier->getEtiquette());
        $stmt->bindValue(':img', $panier->getImg());
        $stmt->bindValue(':offreDePrix', $panier->getOffreDePrix());
        $stmt->bindValue(':quantiteStock', $panier->getQuantiteStock());
        $stmt->bindValue(':stock', $panier->getStock());
        $stmt->bindValue(':clientId', $panier->getClientId());
        $stmt->bindValue(':validCommend', $panier->getValidCommend());

        return $stmt->execute();
    }


    public function deletePanier($panierId) {
        $query = "DELETE FROM panier_table WHERE panierId = :panierId";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':panierId', $panierId);

        return $stmt->execute();
    }

    // Method to fetch a Panier by its ID from the database
    public function getPanierById($panierId) {
        $query = "SELECT * FROM panier_table WHERE panierId = :panierId";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':panierId', $panierId);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Assuming PDO is used for database connection
    }

    // Method to fetch all Paniers from the database
    public function getAllPaniers() {
        $query = "SELECT * FROM panier_table";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Assuming PDO is used for database connection
    }
}

$panier = new Panier(
    1,
    'Sample Etiquette',
    'sample.jpg',
    100.00,
    10,
    20,
    1,
    true
);

// Create a database connection (assuming you have a function to establish a connection)
$conn = createDatabaseConnection(); // Replace with your actual function

// Create a PanierDAO object with the database connection
$panierDAO = new PanierDAO($conn);

// Insert the Panier into the database
$result = $panierDAO->insertPanier($panier);

// Check the result
if ($result) {
    echo "Panier inserted successfully!";
} else {
    echo "Error inserting Panier.";
}
?>









