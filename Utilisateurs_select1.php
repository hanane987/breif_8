<?php
require_once 'connexion.php';
require_once 'classuser.php';
require_once 'databasepoo.php';
include 'layout/coon.php';

class UserDAO {
    private $db;

    public function __construct() {
        $this->db = DatabaseConnection::getInstance()->getConnection();
    }

    public function getUserById($userId) {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllUsers() {
        $query = "SELECT * FROM users WHERE is_Active = 1 ORDER BY id DESC";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

        // Execute the query
        $result = $stmt->execute();

       
        return $result ? $this->db->lastInsertId() : false;
    }

    public function deleteUser($userId) {
        $query = "UPDATE users SET is_Active = 0 WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $result = $stmt->execute();

        return $result;
    }
}

$userDAO = new UserDAO();
$usersData = $userDAO->getAllUsers();

?>

<div id="num_Utilisateurs" class="alert alert-success  mb-0 " role="alert">
    Liste des Client (<?= count($usersData) ?>)
</div>
<table class="table table-striped table-hover ">
    <thead>
        <tr>
            <th><div style=" width: 90px;  word-wrap: break-word;  white-space: normal;">Name</div></th>
            <th><div style=" width: 140px;  word-wrap: break-word;  white-space: normal;">Email</div></th>
            <th><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;">Password</div></th>
            <th><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;">Ville</div></th>
            <th><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;">Opérations</div></th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php
      if (!empty($usersData)) {
        foreach ($usersData as $value) {
    ?>
            <tr>
                <th scope="row"><div style=" width: 90px;  word-wrap: break-word;  white-space: normal;"><?= $value["name"] ?></div></th>
                <th scope="row"><div style=" width: 190px;  word-wrap: break-word;  white-space: normal;"><?=  $value["Email"]  ?></div></th>
                <td><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;"><?=  $value["Password"]  ?></div></td>
                <td><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;"><?= $value["ville"] ?></div></td>
                <td><div style=" width: 120px;  word-wrap: break-word;  white-space: normal;">
                        <button onclick="makeRequest(<?= $value['id'] ?>,'Dashboard/Accept_userAdmin.php?id=')" type="button" class="btn btn-success mb-2 ms-2">is admin</button>
                        <button onclick="makeRequest(<?= $value['id'] ?>,'Dashboard/delete_Visiteurs.php?id=')" class="btn btn-danger mb-2 ms-2" type="button">delete</button>
                    </div>
                </td>
            </tr>
    <?php
            }
        }
        ?>
    </tbody>
</table>


