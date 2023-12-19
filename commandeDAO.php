<?php
require_once 'connexion.php'; 
require_once 'databasepoo.php';
require_once 'classdetailscommand.php'; 

class DetailsCommandeDAO {
    private $db;

    public function __construct() {
        $this->db = DatabaseConnection::getInstance()->getConnection();
    }

    public function getDetailsCommandeById($detailsId) {
        $query = "SELECT * FROM details_commande WHERE details_id = :detailsId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':detailsId', $detailsId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllDetailsCommande() {
        $query = "SELECT * FROM details_commande";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addDetailsCommande(DetailsCommande $detailsCommande) {
        try {
            $query = "INSERT INTO details_commande (names, prix_total, commande_id, id_user, confirm_achter)
                    VALUES (:names, :prixTotal, :commandeId, :idUser, :confirmAchter)";
    
            $names = $detailsCommande->getNames();
            $prixTotal = $detailsCommande->getPrixTotal();
            $commandeId = $detailsCommande->getCommandeId();
            $idUser = $detailsCommande->getIdUser();
            $confirmAchter = $detailsCommande->getConfirmAchter();
    
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':names', $names);
            $stmt->bindParam(':prixTotal', $prixTotal);
            $stmt->bindParam(':commandeId', $commandeId);
            $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
            $stmt->bindParam(':confirmAchter', $confirmAchter, PDO::PARAM_INT);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            // Log or handle the exception
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
    

    public function deleteDetailsCommande($detailsId) {
        $query = "DELETE FROM details_commande WHERE details_id = :detailsId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':detailsId', $detailsId, PDO::PARAM_INT);
        $result = $stmt->execute();

        return $result;
    }

    // Add other methods (updateDetailsCommande, deleteDetailsCommande) as needed...
}

$detailsCommandeDAO = new DetailsCommandeDAO();

// Example usage:
// Add a new details_commande
$newDetailsCommande = new DetailsCommande(null, 'Product Names', 100, 1, 201, true);
$newDetailsCommandeId = $detailsCommandeDAO->addDetailsCommande($newDetailsCommande);

if ($newDetailsCommandeId) {
    echo "Add DetailsCommande Result: Success, ID: $newDetailsCommandeId" . PHP_EOL;

    // Fetch the details_commande by ID
    $addedDetailsCommande = $detailsCommandeDAO->getDetailsCommandeById($newDetailsCommandeId);

    // Check if the details_commande was retrieved successfully
    if ($addedDetailsCommande) {
        echo "DetailsCommande with ID $newDetailsCommandeId found:" . PHP_EOL;
        print_r($addedDetailsCommande);
    } else {
        echo "DetailsCommande with ID $newDetailsCommandeId not found." . PHP_EOL;
    }
} else {
    echo "Add DetailsCommande Result: Failure" . PHP_EOL;
}

// Delete details_commande with ID 1
$deleteResult = $detailsCommandeDAO->deleteDetailsCommande(1);

echo "Delete DetailsCommande Result: " . ($deleteResult ? "Success" : "Failure") . PHP_EOL;
?>
