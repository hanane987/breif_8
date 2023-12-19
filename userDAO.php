<?php
require_once 'connexion.php';
require_once 'classuser.php';
require_once 'databasepoo.php';

class UserDAO {
    private $db;

    public function __construct() {
        $this->db = DatabaseConnection::getInstance()->getConnection();
    }

    public function getUserById($userId) {
        $query = "SELECT * FROM `users` WHERE is_Active = 1 ORDER BY id DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllUsers() {
        $query = "SELECT * FROM users";
        $stmt = $this->db->query($query);
        while($row=$stmt->fetchAll(PDO::FETCH_ASSOC)){
            $user=new User($row['id'],$row['name'],$row['name'],$row['prenom'],$row['phone'],$row['email'],$row['adresse'],$row['ville'],$row['password'],$row['isActive']);
        }
        return $user;
    }

    public function addUser(User $user) {
        $query = "INSERT INTO users (name, phone, email, adresse, ville, password, is_active)
                  VALUES (:name, :phone, :email, :adresse, :ville, :password, :isActive)";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':isActive', $isActive, PDO::PARAM_BOOL);

        
        $name = $user->getName();
        $phone = $user->getPhone();
        $email = $user->getEmail();
        $adresse = $user->getAdresse();
        $ville = $user->getVille();
        $password = $user->getPassword();
        $isActive = $user->getIsActive();

       
        $result = $stmt->execute();

        return $result ? $this->db->lastInsertId() : false;
    }


    public function deleteUser($userId) {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $result = $stmt->execute();

        return $result;
    }

}

$userDAO = new UserDAO();


$newUser = new User(null, 'NewUser', 'NewPrenom', '123456789', 'newuser@example.com', 'NewAddress', 'NewCity', 'newpassword', true);
$newUserId = $userDAO->addUser($newUser);

if ($newUserId) {
    echo "Add User Result: Success, ID: $newUserId" . PHP_EOL;

    // Fetch the user by ID
    $addedUser = $userDAO->getUserById($newUserId);

    // Check if the user was retrieved successfully
    if ($addedUser) {
        echo "User with ID $newUserId found:" . PHP_EOL;
        print_r($addedUser);
    } else {
        echo "User with ID $newUserId not found." . PHP_EOL;
    }
} else {
    echo "Add User Result: Failure" . PHP_EOL;
}
$userDAO = new UserDAO();


?>

