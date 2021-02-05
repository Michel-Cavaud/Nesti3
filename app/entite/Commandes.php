<?php



/**
 * Description of Commandes
 *
 * @author michel
 */
class Commandes {
    private $id;
    private $etat;
    private $dateCreation;
    private $idUtilisateurs;


    public function __construct($row) {
        $this->id = $row['id_commandes'];
        $this->etat = $row['etat_commandes'];
        $this->dateCreation = $row['date_creation_commandes'];
        $this->idUtilisateurs = $row['id_utilisateurs'];
    }
    
    function getId() {
        return $this->id;
    }

    function getEtat() {
        return $this->etat;
    }

    function getDateCreation() {
        return $this->dateCreation;
    }

    function getIdUtilisateurs() {
        return $this->idUtilisateurs;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setEtat($etat): void {
        $this->etat = $etat;
    }

    function setDateCreation($dateCreation): void {
        $this->dateCreation = $dateCreation;
    }

    function setIdUtilisateurs($idUtilisateurs): void {
        $this->idUtilisateurs = $idUtilisateurs;
    }


}
