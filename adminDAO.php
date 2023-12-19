<?php

require_once 'connexion.php';
require_once 'databasepoo.php';
require_once 'classadmin.php';

class AdminDAO {
    private $db;

    public function __construct() {
        $this->db = DatabaseConnection::getInstance()->getConnection();
    }

    public function getAdminById($adminId) {
        $query = "SELECT * FROM admin WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $adminId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllAdmins() {
        $query = "SELECT * FROM admin";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addAdmin(Admin $admin) {
        $query = "INSERT INTO admin (email, password, super_admin)
                  VALUES (:email, :password, :superAdmin)";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':superAdmin', $superAdmin, PDO::PARAM_BOOL);

      
        $email = $admin->getEmail();
        $password = $admin->getPassword();
        $superAdmin = $admin->getSuperAdmin();
        $result = $stmt->execute();
        return $result ? $this->db->lastInsertId() : false;
    }

    public function deleteAdmin($adminId) {
        $query = "DELETE FROM admin WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $adminId, PDO::PARAM_INT);
        $result = $stmt->execute();

        return $result;
    }



        public function getAllActiveAdmins() {
            $query = "SELECT * FROM admin WHERE super_admin = 1 ORDER BY id ASC";
            $stmt = $this->db->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
        public function getAllRegularAdmins() {
            $query = "SELECT * FROM admin WHERE super_admin = 0 ORDER BY id ASC";
            $stmt = $this->db->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
        public function getAdminCount() {
            $query = "SELECT COUNT(*) as count FROM admin WHERE super_admin = 1";
            $stmt = $this->db->query($query);
            return $stmt->fetch(PDO::FETCH_ASSOC)['count'];
        }
    
     

 




    }






$adminDAO = new AdminDAO();


$deleteResult = $adminDAO->deleteAdmin(100078);

echo "Delete Admin Result: " . ($deleteResult ? "Success" : "Failure") . PHP_EOL;

?>
