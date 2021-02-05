<?php


/**
 * Description of Produits
 *
 * @author michel
 */
class Produits {
    
    private $id;
    private $nom;
    
    public function __construct($row) {
        $this->id = $row['id_produits'];
        $this->nom = $row['nom_produits'];
    }
    
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
