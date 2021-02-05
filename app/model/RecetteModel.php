<?php



/**
 * Description of RecetteModal
 *
 * @author michel
 */ 
include PATH_MODEL . 'database.php';

class RecetteModel {
    
    public function readAll(){
       
        $pdo = Database::getPdo();
        $sql="SELECT id_recettes as id, nom_recettes as nom, difficulte_recettes as difficulte, temps_recettes as temps, nombre_personne_recettes as nombrePersonne FROM recettes";
        
        $resultat = $pdo->query($sql);
        
        if($resultat){
            $array = $resultat->fetchAll(PDO::FETCH_CLASS, 'Recettes');
            
        }else{
            $array = [];
        }
        return $array;
    }
}
