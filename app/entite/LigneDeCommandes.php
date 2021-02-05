<?php



/**
 * Description of LigneDeCommandes
 *
 * @author michel
 */
class LigneDeCommandes {
    
    private $idArticles;
    private $refCommandesLots;
    private $idCommandes;
    Private $quantite;


    public function __construct($row) {
        $this->idArticles = $row['id_externe'];
        $this->refCommandesLots = $row['ref_commandes_lots'];
        $this->idCommandes = $row['id_commandes'];
        $this->quantite = $row['quantite_commandee'];
    }
    
    function getIdArticles() {
        return $this->idArticles;
    }

    function getRefCommandesLots() {
        return $this->refCommandesLots;
    }

    function getIdCommandes() {
        return $this->idCommandes;
    }

    function getQuantite() {
        return $this->quantite;
    }

    function setIdArticles($idArticles): void {
        $this->idArticles = $idArticles;
    }

    function setRefCommandesLots($refCommandesLots): void {
        $this->refCommandesLots = $refCommandesLots;
    }

    function setIdCommandes($idCommandes): void {
        $this->idCommandes = $idCommandes;
    }

    function setQuantite($quantite): void {
        $this->quantite = $quantite;
    }


}
