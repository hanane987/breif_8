<?php

class Admin {
    private $id;
    private $email;
    private $password;
    private $superAdmin;

    // Constructor
    public function __construct($id, $email, $password, $superAdmin) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->superAdmin = $superAdmin;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getSuperAdmin() {
        return $this->superAdmin;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setSuperAdmin($superAdmin) {
        $this->superAdmin = $superAdmin;
    }
}
?>