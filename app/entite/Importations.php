<?php


/**
 * Description of Importations
 *
 * @author michel
 */
class Importations {
    
    private $idArticles;
    private $refCommandesLots;
    private $idAdmin;
    private $dateImport;

    public function __construct($row) {
        $this->idArticles = $row['id_externe'];
        $this->refCommandesLots = $row['ref_commandes_lots'];
        $this->idAdmin = $row['id_utilisateurs'];
        $this->dateImport  = $row['date_importation'];
    }
    
    function getIdArticles() {
        return $this->idArticles;
    }

    function getRefCommandesLots() {
        return $this->refCommandesLots;
    }

    function getIdAdmin() {
        return $this->idAdmin;
    }

    function getDateImport() {
        return $this->dateImport;
    }

    function setIdArticles($idArticles): void {
        $this->idArticles = $idArticles;
    }

    function setRefCommandesLots($refCommandesLots): void {
        $this->refCommandesLots = $refCommandesLots;
    }

    function setIdAdmin($idAdmin): void {
        $this->idAdmin = $idAdmin;
    }

    function setDateImport($dateImport): void {
        $this->dateImport = $dateImport;
    }


}
