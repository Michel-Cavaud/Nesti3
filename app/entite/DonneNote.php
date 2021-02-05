<?php



/**
 * Description of DonneNote
 *
 * @author michel
 */
class DonneNote {
   
    private $idRecettes;
    private $idUtilisateurs;
    private $note;


    public function __construct($row) {
        $this->idRecettes = $row['id_recettes'];
        $this->idUtilisateurs = $row['id_utilisateurs'];
        $this->note = $row['note_sur_5'];
    }
    
    function getIdRecettes() {
        return $this->idRecettes;
    }

    function getIdUtilisateurs() {
        return $this->idUtilisateurs;
    }

    function getNote() {
        return $this->note;
    }

    function setIdRecettes($idRecettes): void {
        $this->idRecettes = $idRecettes;
    }

    function setIdUtilisateurs($idUtilisateurs): void {
        $this->idUtilisateurs = $idUtilisateurs;
    }

    function setNote($note): void {
        $this->note = $note;
    }


}
