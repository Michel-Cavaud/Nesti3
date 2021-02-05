<?php



/**
 * Description of IngredientsRecettes
 *
 * @author michel
 */
class IngredientsRecettes {
   
    private $idProduits;
    private $idRecettes;
    private $quantite;
    private $ordre;
    private $idUnitesMesure;
    
    public function __construct($row) {
        $this->idProduits = $row['id_produits'];
        $this->idRecettes = $row['id_recettes'];
        $this->quantite = $row['quantite_ingredients_recette'];
        $this->ordre = $row['ordre_ingredients_recette'];
        $this->idUnitesMesure = $row['id_unites_de_mesure'];
        
    }
    
    function getIdProduits() {
        return $this->idProduits;
    }

    function getIdRecettes() {
        return $this->idRecettes;
    }

    function getQuantite() {
        return $this->quantite;
    }

    function getOrdre() {
        return $this->ordre;
    }

    function getIdUnitesMesure() {
        return $this->idUnitesMesure;
    }

    function setIdProduits($idProduits): void {
        $this->idProduits = $idProduits;
    }

    function setIdRecettes($idRecettes): void {
        $this->idRecettes = $idRecettes;
    }

    function setQuantite($quantite): void {
        $this->quantite = $quantite;
    }

    function setOrdre($ordre): void {
        $this->ordre = $ordre;
    }

    function setIdUnitesMesure($idUnitesMesure): void {
        $this->idUnitesMesure = $idUnitesMesure;
    }


}
