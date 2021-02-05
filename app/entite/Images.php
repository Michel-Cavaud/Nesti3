<?php



/**
 * Description of Images
 *
 * @author michel
 */
class Images {
    private $id;
    private $dateCreation;
    private $nom;
    private $extension;


    public function __construct($row) {
        $this->id = $row['id_images'];
        $this->dateCreation = $row['date_creation_images'];
        $this->nom = $row['nom_images'];
        $this->extension = $row['extension_images'];
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

    function getExtension() {
        return $this->extension;
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

    function setExtension($extension): void {
        $this->extension = $extension;
    }


}
