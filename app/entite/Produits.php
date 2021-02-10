<?php


/**
 * Description of Produits
 *
 * @author michel
 */
class Produits {
    
    private $id;
    private $nom;

    
    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setNom($nom): void {
        $this->nom = $nom;
    }


}
