<?php


/**
 * Description of PrixArticle
 *
 * @author michel
 */
class PrixArticle {
    
    private $id;
    private $dateCreation;
    private $prix;
    private $idArticles;


    public function __construct($row) {
        $this->id = $row['id_prix_article'];
        $this->dateCreation  = $row['date_creation_prix_article'];
        $this->prix = $row['prix_prix_article'];
        $this->idArticles = $row['id_externe'];
    }
    function getId() {
        return $this->id;
    }

    function getVateCreation() {
        return $this->vateCreation;
    }

    function getPrix() {
        return $this->prix;
    }

    function getIdArticles() {
        return $this->idArticles;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setVateCreation($vateCreation): void {
        $this->vateCreation = $vateCreation;
    }

    function setPrix($prix): void {
        $this->prix = $prix;
    }

    function setIdArticles($idArticles): void {
        $this->idArticles = $idArticles;
    }


}
