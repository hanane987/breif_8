<?php


class DetailsCommande {
    private $detailsId;
    private $names;
    private $prixTotal;
    private $commandeId;
    private $idUser;
    private $confirmAchter;

    // Constructor
    public function __construct($detailsId, $names, $prixTotal, $commandeId, $idUser, $confirmAchter) {
        $this->detailsId = $detailsId;
        $this->names = $names;
        $this->prixTotal = $prixTotal;
        $this->commandeId = $commandeId;
        $this->idUser = $idUser;
        $this->confirmAchter = $confirmAchter;
    }

    // Getters
    public function getDetailsId() {
        return $this->detailsId;
    }

    public function getNames() {
        return $this->names;
    }

    public function getPrixTotal() {
        return $this->prixTotal;
    }

    public function getCommandeId() {
        return $this->commandeId;
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function getConfirmAchter() {
        return $this->confirmAchter;
    }

    // Setters
    public function setDetailsId($detailsId) {
        $this->detailsId = $detailsId;
    }

    public function setNames($names) {
        $this->names = $names;
    }

    public function setPrixTotal($prixTotal) {
        $this->prixTotal = $prixTotal;
    }

    public function setCommandeId($commandeId) {
        $this->commandeId = $commandeId;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function setConfirmAchter($confirmAchter) {
        $this->confirmAchter = $confirmAchter;
    }
}
?>