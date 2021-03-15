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
    private $articles;


    function getId() {
        return $this->id;
    }

    function getDateCreation() {
        return $this->dateCreation;
    }

    function getPrix() {
        return $this->prix;
    }

    function getArticles() {
        return $this->articles;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setDateCreation($dateCreation): void {
        $this->dateCreation = $dateCreation;
    }

    function setPrix($prix): void {
        $this->prix = $prix;
    }

    function setArticles($articles): void {
        $this->articles = $articles;
    }


}
