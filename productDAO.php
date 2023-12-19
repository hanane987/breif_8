
<?php
require_once 'connexion.php';
require_once 'product.php';
require_once 'databasepoo.php';


 
    
    class fetchingdata {
        private $db;
    
        public function __construct(){
            $this->db = DatabaseConnection::getInstance()->getConnection(); 
        }
    
    
        public function get_product(){
            $query = "SELECT * FROM produit";
            $stmt = $this->db->query($query);
            $stmt->execute();
            $productData = $stmt->fetchAll();
            $products = array();
    
            foreach ($productData as $P) {
                $products[] = new Product($P["etiquette"],
                    $P["etiquette"],
                    $P["code"],
                    $P["description"],
                    $P["prixAchat"],
                    $P["prixFinal"],
                    $P["offreDePrix"],
                    $P["quantiteMin"],
                    $P["quantiteStock"],
                    $P["categorieID"]
                );
            }
    
            return $products;
        }
    
        public function insert_product($product) {
            $query = "INSERT INTO produit 
                      (`Etiquette`, `Code à barres`, `PrixAchat`, `img`, `PrixFinal`, `OffreDePrix`, `Description`, `QuantiteMin`, `QuantiteStock`, `CategorieID`, `deleted_at`) 
                      VALUES (
                        :etiquette,
                        :code,
                        :prixAchat,
                        :img,
                        :prixFinal,
                        :offreDePrix,
                        :description,
                        :quantiteMin,
                        :quantiteStock,
                        :categorieID,
                        :deleted_at
                      )";
        
            $stmt = $this->db->prepare($query);
        
            $etiquette = $product->getEtiquette();
            $code = $product->getCode();
            $prixAchat = $product->getPrixAchat();
            $img = $product->getImg(); 
            $prixFinal = $product->getPrixFinal();
            $offreDePrix = $product->getOffreDePrix();
            $description = $product->getDescription();
            $quantiteMin = $product->getQuantiteMin();
            $quantiteStock = $product->getQuantiteStock();
            $categorieID = $product->getCategorieID();
            $deleted_at = $product->getDeletedAt(); 
        
            $stmt->bindParam(':etiquette', $etiquette);
            $stmt->bindParam(':code', $code);
            $stmt->bindParam(':prixAchat', $prixAchat);
            $stmt->bindParam(':img', $img);
            $stmt->bindParam(':prixFinal', $prixFinal);
            $stmt->bindParam(':offreDePrix', $offreDePrix);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':quantiteMin', $quantiteMin);
            $stmt->bindParam(':quantiteStock', $quantiteStock);
            $stmt->bindParam(':categorieID', $categorieID);
            $stmt->bindParam(':deleted_at', $deleted_at);
        
            $stmt->execute();
        }
        

        
    
        public function update_product($product){
            $query = "UPDATE `produit` SET
                `etiquette`='".$product->getEtiquette()."',
                `code`='".$product->getCode()."',
                `description`='".$product->getDescription()."',
                `prixAchat`=".$product->getPrixAchat().",
                `prixFinal`=".$product->getPrixFinal().",
                `offreDePrix`=".$product->getOffreDePrix().",
                `quantiteMin`=".$product->getQuantiteMin().",
                `quantiteStock`=".$product->getQuantiteStock().",
                `categorieID`='".$product->getCategorieID()."'
            WHERE `reference`= ".$product->getReference();
    
            echo $query;
    
            $stmt = $this->db->query($query);
            $stmt->execute();
        }
    
        public function delete_product($id){
            $query = "DELETE FROM `produit` WHERE `reference`=" . $id;
            echo $query; // Add this line to print the query
            $stmt = $this->db->query($query);
            $stmt->execute();
        }
        
        
        
    }
    
    $product = new Product('NewLabel', '456', 2500, 'path/to/image.jpg', 2600, 1200, 'NewDescription', 3, 40, 100);

    $productDAO = new fetchingdata();
    $productDAO->insert_product($product);

    $productDAO = new fetchingdata();
$productDAO->delete_product(112); 

    ?>
    