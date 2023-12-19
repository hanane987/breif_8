<?php
require_once 'connexion.php';// Assuming your Categorie class file is named 'Categorie.php'
require_once 'databasepoo.php';
require_once 'classcategory.php';
class CategorieDAO {
    private $db;

    public function __construct() {
        $this->db = DatabaseConnection::getInstance()->getConnection();
    }

    public function getCategoryById($categoryId) {
        $query = "SELECT * FROM categorie WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllCategories() {
        $query = "SELECT * FROM categorie";
        $stmt = $this->db->prepare($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCategory(Categorie $category) {
        $query = "INSERT INTO categorie (nom, description, img)
                  VALUES (:nom, :description, :img)";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':img', $img);

        // Set variables with values from the Categorie object
        $nom = $category->getNom();
        $description = $category->getDescription();
        $img = $category->getImg();

        // Execute the query
        $result = $stmt->execute();

        // Return the ID of the inserted category or false if the operation failed
        // return $result ? $this->db->lastInsertId() : false;
    }

    public function deleteCategory($categoryId) {
        $query = "DELETE FROM categorie WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $categoryId, PDO::PARAM_INT);
        $result = $stmt->execute();

        return $result;
    }

    // Add other methods (updateCategory, deleteCategory) as before...
}

// $categorieDAO = new CategorieDAO();

// // Add a new category
// $newCategory = new Categorie('NewCategory', 'NewCategoryDescription', 'NewCategoryImg');
// $newCategoryId = $categorieDAO->addCategory($newCategory);

// if ($newCategoryId) {
//     echo "Add Category Result: Success, ID: $newCategoryId" . PHP_EOL;

//     // Fetch the category by ID
//     $addedCategory = $categorieDAO->getCategoryById($newCategoryId);

//     // Check if the category was retrieved successfully
//     if ($addedCategory) {
//         echo "Category with ID $newCategoryId found:" . PHP_EOL;
//         print_r($addedCategory);
//     } else {
//         echo "Category with ID $newCategoryId not found." . PHP_EOL;
//     }
// } else {
//     echo "Add Category Result: Failure" . PHP_EOL;
// }

// Delete category with ID 1
// $deleteResult = $categorieDAO->deleteCategory(99);

// echo "Delete Category Result: " . ($deleteResult ? "Success" : "Failure") . PHP_EOL;
?>
