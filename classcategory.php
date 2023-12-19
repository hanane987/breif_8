<?php
class Categorie {
    private $id;
    private $nom;
    private $description;
    private $img;
    private $deleted_at;

    public function __construct($nom, $description, $img) {
        $this->nom = $nom;
        $this->description = $description;
        $this->img = $img;
    }

    // Getters and setters for each property

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getImg() {
        return $this->img;
    }

    public function setImg($img) {
        $this->img = $img;
    }

    public function getDeletedAt() {
        return $this->deleted_at;
    }

    public function setDeletedAt($deleted_at) {
        $this->deleted_at = $deleted_at;
    }

    // Other methods specific to Category, if needed
}
?>