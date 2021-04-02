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
    private $prix;
    private $stock;
    private $dateImport;
    private $type;
    
    function getType() {
        return $this->type;
    }

    function setType($type): void {
        $this->type = $type;
    }

    function getDateImport() {
        return $this->dateImport;
    }

    function setDateImport($dateImport): void {
        $this->dateImport = $dateImport;
    }

    function getStock() {
        return $this->stock;
    }

    function setStock($stock): void {
        $this->stock = $stock;
    }

    function getPrix() {
        $prix = floatval($this->prix);
        if ($prix == 0){
            return $this->prix;
        }else{
            $prix = round($prix, 2);
            $prix = str_replace(".",",", $prix);
            return $prix;
        }
        
    }

    function setPrix($prix): void {
        $this->prix = $prix;
    }

        function getUniteMesure() {
        return $this->uniteMesure;
    }

    function setUniteMesure($uniteMesure): void {
        $this->uniteMesure = $uniteMesure;
    }

       
    function getProduits() {
        return $this->produits;
    }

    function getImage() {
        return $this->images;
    }

    function setProduits($produits): void {
        $this->produits = $produits;
    }

    function setImage($images): void {
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
