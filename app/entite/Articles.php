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
    private $produits;
    private $uniteMesure;
    private $images;
    
    
    function getUniteMesure() {
        return $this->uniteMesure;
    }

    function setUniteMesure($uniteMesure): void {
        $this->uniteMesure = $uniteMesure;
    }

       
    function getProduits() {
        return $this->produits;
    }

    function getImages() {
        return $this->images;
    }

    function setProduits($produits): void {
        $this->produits = $produits;
    }

    function setImages($images): void {
        $this->images = $images;
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


}
