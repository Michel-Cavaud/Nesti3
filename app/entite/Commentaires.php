<?php



/**
 * Description of Commentaires
 *
 * @author michel
 */
class Commentaires {
    
    private $idUtilisateur;
    private $idRecettes;
    private $titre;
    private $contenu;
    private $etat;
    private $idModerateur;


    public function __construct($row) {
        $this->idRecettes = $row['id_recette'];
        $this->idUtilisateur = $row['id_utilisateurs_1'];
        $this->titre = $row['titre_commentaires'];
        $this->contenu = $row['contenu_commentaires'];
        $this->etat = $row['etat_commentaires'];
        $this->idModerateur = $row['id_utilisateurs'];
        
    }
    
    function getIdUtilisateur() {
        return $this->idUtilisateur;
    }

    function getIdRecettes() {
        return $this->idRecettes;
    }

    function getTitre() {
        return $this->titre;
    }

    function getContenu() {
        return $this->contenu;
    }

    function getEtat() {
        return $this->etat;
    }

    function getIdModerateur() {
        return $this->idModerateur;
    }

    function setIdUtilisateur($idUtilisateur): void {
        $this->idUtilisateur = $idUtilisateur;
    }

    function setIdRecettes($idRecettes): void {
        $this->idRecettes = $idRecettes;
    }

    function setTitre($titre): void {
        $this->titre = $titre;
    }

    function setContenu($contenu): void {
        $this->contenu = $contenu;
    }

    function setEtat($etat): void {
        $this->etat = $etat;
    }

    function setIdModerateur($idModerateur): void {
        $this->idModerateur = $idModerateur;
    }


}
