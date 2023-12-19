<?php

class Product {
    private $reference;
    private $etiquette;
    private $code;
    private $prixAchat;
    private $img;
    private $prixFinal;
    private $offreDePrix;
    private $description;
    private $quantiteMin;
    private $quantiteStock;
    private $categorieID;
    private $deleted_at;

    // Constructor
    public function __construct(
        $etiquette,
        $code,
        $prixAchat,
        $img,
        $prixFinal,
        $offreDePrix,
        $description,
        $quantiteMin,
        $quantiteStock,
        $categorieID,
        $deleted_at = null
    ) {
        $this->etiquette = $etiquette;
        $this->code = $code;
        $this->prixAchat = $prixAchat;
        $this->img = $img;
        $this->prixFinal = $prixFinal;
        $this->offreDePrix = $offreDePrix;
        $this->description = $description;
        $this->quantiteMin = $quantiteMin;
        $this->quantiteStock = $quantiteStock;
        $this->categorieID = $categorieID;
        $this->deleted_at = $deleted_at;
    }

    // Getters
    public function getReference() {
        return $this->reference;
    }

    public function getEtiquette() {
        return $this->etiquette;
    }

    public function getCode() {
        return $this->code;
    }

    public function getPrixAchat() {
        return $this->prixAchat;
    }

    public function getImg() {
        return $this->img;
    }

    public function getPrixFinal() {
        return $this->prixFinal;
    }

    public function getOffreDePrix() {
        return $this->offreDePrix;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getQuantiteMin() {
        return $this->quantiteMin;
    }

    public function getQuantiteStock() {
        return $this->quantiteStock;
    }

    public function getCategorieID() {
        return $this->categorieID;
    }

    public function getDeletedAt() {
        return $this->deleted_at;
    }

    // Setters
    public function setReference($reference) {
        $this->reference = $reference;
    }

    public function setEtiquette($etiquette) {
        $this->etiquette = $etiquette;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function setPrixAchat($prixAchat) {
        $this->prixAchat = $prixAchat;
    }

    public function setImg($img) {
        $this->img = $img;
    }

    public function setPrixFinal($prixFinal) {
        $this->prixFinal = $prixFinal;
    }

    public function setOffreDePrix($offreDePrix) {
        $this->offreDePrix = $offreDePrix;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setQuantiteMin($quantiteMin) {
        $this->quantiteMin = $quantiteMin;
    }

    public function setQuantiteStock($quantiteStock) {
        $this->quantiteStock = $quantiteStock;
    }

    public function setCategorieID($categorieID) {
        $this->categorieID = $categorieID;
    }

    public function setDeletedAt($deleted_at) {
        $this->deleted_at = $deleted_at;
    }

}
?>