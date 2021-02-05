<?php



/**
 * Description of Articles
 *
 * @author michel
 */
class Articles {
   
    private $id;
    private $quantite;
    private $etat;
    private $dateCreation;
    private $dateMiseAJour;
    private $idProduits;
    private $idUniteMesure;
    private $idImages;
    
    
    public function __construct($row) {
        $this->id = $row['id_externe'];
        $this->quantite = $row['quantite_unite_articles'];
        $this->etat = $row['etat_articles'];
        $this->dateCreation = $row['date_creation_articles'];
        $this->dateMiseAJour = $row['date_mise_jour_articles'];
        $this->idProduits = $row['id_produits'];
        $this->idUniteMesure = $row['id_unites_de_mesure'];
        $this->idImages = $row['id_images'];
    }
    
    function getId() {
        return $this->id;
    }

    function getQuantite() {
        return $this->quantite;
    }

    function getEtat() {
        return $this->etat;
    }

    function getDateCreation() {
        return $this->dateCreation;
    }

    function getDateMiseAJour() {
        return $this->dateMiseAJour;
    }

    function getIdProduits() {
        return $this->idProduits;
    }

    function getIdUniteMesure() {
        return $this->idUniteMesure;
    }

    function getIdImages() {
        return $this->idImages;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setQuantite($quantite): void {
        $this->quantite = $quantite;
    }

    function setEtat($etat): void {
        $this->etat = $etat;
    }

    function setDateCreation($dateCreation): void {
        $this->dateCreation = $dateCreation;
    }

    function setDateMiseAJour($dateMiseAJour): void {
        $this->dateMiseAJour = $dateMiseAJour;
    }

    function setIdProduits($idProduits): void {
        $this->idProduits = $idProduits;
    }

    function setIdUniteMesure($idUniteMesure): void {
        $this->idUniteMesure = $idUniteMesure;
    }

    function setIdImages($idImages): void {
        $this->idImages = $idImages;
    }


}
