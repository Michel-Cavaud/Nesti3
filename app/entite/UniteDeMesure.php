<?php



/**
 * Description of UniteDeMesure
 *
 * @author michel
 */
class UniteDeMesure {
    
    private $id;
    private $nom;
    
    public function __construct($row) {
        $this->id = $row['id_unites_de_mesure'];
        $this->nom = $row['nom_unites_de_mesure'];
        
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
