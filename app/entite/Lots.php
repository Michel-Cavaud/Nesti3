<?php


/**
 * Description of Lots
 *
 * @author michel
 */
class Lots {
    private $refCommandLots;
    private $idArticles;
    private $cout;
    private $quantite;
    private $dateCreation;
    


    public function __construct($row) {
        $this->refCommandLots = $row['ref_commandes_lots'];
        $this->idArticless = $row['id_externe'];
        $this->couts = $row['cout_unitaire_lots'];
        $this->quantites = $row['quantite_achete_lots'];
        $this->dateCreations = $row['date_creation_lots'];
        
    }
    
    function getRefCommandLots() {
        return $this->refCommandLots;
    }

    function getIdArticles() {
        return $this->idArticles;
    }

    function getCout() {
        return $this->cout;
    }

    function getQuantite() {
        return $this->quantite;
    }

    function getDateCreation() {
        return $this->dateCreation;
    }

    function setRefCommandLots($refCommandLots): void {
        $this->refCommandLots = $refCommandLots;
    }

    function setIdArticles($idArticles): void {
        $this->idArticles = $idArticles;
    }

    function setCout($cout): void {
        $this->cout = $cout;
    }

    function setQuantite($quantite): void {
        $this->quantite = $quantite;
    }

    function setDateCreation($dateCreation): void {
        $this->dateCreation = $dateCreation;
    }


}
