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
