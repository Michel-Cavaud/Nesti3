<?php



/**
 * Description of IngredientsRecettes
 *
 * @author michel
 */
class IngredientsRecettes {
   
    private $ingredient;
    private $recette;
    private $quantite;
    private $ordre;
    private $uniteMesure;
    
   
    function getIngredient() {
        return $this->ingredient;
    }

    function setIngredient($ingredient): void {
        $this->ingredient = $ingredient;
    }

        
    function getRecette() {
        return $this->recette;
    }

    function getQuantite() {
        return $this->quantite;
    }

    function getOrdre() {
        return $this->ordre;
    }

    function getUniteMesure() {
        return $this->uniteMesure;
    }

   
    function setRecette($recette): void {
        $this->recette = $recette;
    }

    function setQuantite($quantite): void {
        $this->quantite = $quantite;
    }

    function setOrdre($ordre): void {
        $this->ordre = $ordre;
    }

    function setUniteMesure($uniteMesure): void {
        $this->uniteMesure = $uniteMesure;
    }




}
