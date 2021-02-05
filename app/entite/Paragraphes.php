<?php



/**
 * Description of Paragraphes
 *
 * @author michel
 */
class Paragraphes {
    private $id;
    private $contenu;
    private $ordre;
    private $dateCreation;
    private $idRecettes;


    public function __construct($row) {
        $this->id = $row['id_paragraphes'];
        $this->contenu = $row['contenu_paragraphes'];
        $this->ordre  = $row['ordre_paragraphes'];
        $this->dateCreation = $row['date_creation_paragraphes'];  
        $this->idRecettes = $row['id_recettes'];
        
    }
    function getId() {
        return $this->id;
    }

    function getContenu() {
        return $this->contenu;
    }

    function getOrdre() {
        return $this->ordre;
    }

    function getDateCreation() {
        return $this->dateCreation;
    }

    function getIdRecettes() {
        return $this->idRecettes;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setContenu($contenu): void {
        $this->contenu = $contenu;
    }

    function setOrdre($ordre): void {
        $this->ordre = $ordre;
    }

    function setDateCreation($dateCreation): void {
        $this->dateCreation = $dateCreation;
    }

    function setIdRecettes($idRecettes): void {
        $this->idRecettes = $idRecettes;
    }


}
