<?php

class Panier {
    private $panierId;
    private $etiquette;
    private $img;
    private $offreDePrix;
    private $quantiteStock;
    private $stock;
    private $clientId;
    private $validCommend;

    // Constructor
    public function __construct($panierId, $etiquette, $img, $offreDePrix, $quantiteStock, $stock, $clientId, $validCommend) {
        $this->panierId = $panierId;
        $this->etiquette = $etiquette;
        $this->img = $img;
        $this->offreDePrix = $offreDePrix;
        $this->quantiteStock = $quantiteStock;
        $this->stock = $stock;
        $this->clientId = $clientId;
        $this->validCommend = $validCommend;
    }

    // Getters
    public function getPanierId() {
        return $this->panierId;
    }

    public function getEtiquette() {
        return $this->etiquette;
    }

    public function getImg() {
        return $this->img;
    }

    public function getOffreDePrix() {
        return $this->offreDePrix;
    }

    public function getQuantiteStock() {
        return $this->quantiteStock;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getClientId() {
        return $this->clientId;
    }

    public function getValidCommend() {
        return $this->validCommend;
    }

    // Setters
    public function setPanierId($panierId) {
        $this->panierId = $panierId;
    }

    public function setEtiquette($etiquette) {
        $this->etiquette = $etiquette;
    }

    public function setImg($img) {
        $this->img = $img;
    }

    public function setOffreDePrix($offreDePrix) {
        $this->offreDePrix = $offreDePrix;
    }

    public function setQuantiteStock($quantiteStock) {
        $this->quantiteStock = $quantiteStock;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function setClientId($clientId) {
        $this->clientId = $clientId;
    }

    public function setValidCommend($validCommend) {
        $this->validCommend = $validCommend;
    }
}
?>