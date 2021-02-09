<?php


/**
 * Description of Lots
 *
 * @author michel
 */
class Lots {
    private $refCommandLots;
    private $articles;
    private $cout;
    private $quantite;
    private $dateCreation;
    

    
    function getRefCommandLots() {
        return $this->refCommandLots;
    }

    function getArticles() {
        return $this->articles;
    }

    function getCout() {
        return $this->cout;
    }

    function getQuantite() {
        return $this->quantite;
    }

    function getDateCreation() {
        return $this->dateCreation;
    }

    function setRefCommandLots($refCommandLots): void {
        $this->refCommandLots = $refCommandLots;
    }

    function setArticles($articles): void {
        $this->articles = $articles;
    }

    function setCout($cout): void {
        $this->cout = $cout;
    }

    function setQuantite($quantite): void {
        $this->quantite = $quantite;
    }

    function setDateCreation($dateCreation): void {
        $this->dateCreation = $dateCreation;
    }


}
