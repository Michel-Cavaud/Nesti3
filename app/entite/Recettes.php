<?php



/**
 * Description of Recettes
 *
 * @author michel
 */
class Recettes {
   
    private $id;
    private $dateCreation;
    private $nom;
    private $difficulte;
    private $nombrePersonne;
    private $etat;
    private $temps;
    private Chef $chef;
    private Image $image;
    
    
    function getChef(): Chef {
        return $this->chef;
    }

    function getImage(): Image {
        return $this->image;
    }

    function setChef(Chef $chef): void {
        $this->chef = $chef;
    }

    function setImage(Image $image): void {
        $this->image = $image;
    }

        function getId() {
        return $this->id;
    }

    function getDateCreation() {
        return $this->dateCreation;
    }

    function getNom() {
        return $this->nom;
    }

    function getDifficulte() {
        return $this->difficulte;
    }

    function getNombrePersonne() {
        return $this->nombrePersonne;
    }

    function getEtat() {
        return $this->etat;
    }

    function getTemps() {
        return $this->temps;
    }


    function setId($id): void {
        $this->id = $id;
    }

    function setDateCreation($dateCreation): void {
        $this->dateCreation = $dateCreation;
    }

    function setNom($nom): void {
        $this->nom = $nom;
    }

    function setDifficulte($difficulte): void {
        $this->difficulte = $difficulte;
    }

    function setNombrePersonne($nombrePersonne): void {
        $this->nombrePersonne = $nombrePersonne;
    }

    function setEtat($etat): void {
        $this->etat = $etat;
    }

    function setTemps($temps): void {
        $this->temps = $temps;
    }

}
