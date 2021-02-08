<?php



/**
 * Description of RecetteModal
 *
 * @author michel
 */ 
//include PATH_MODEL . 'database.php';

class RecetteModel {
    
    public function readAll(){
       
        $pdo = Database::getPdo();
        //$sql="SELECT id_recettes as id, nom_recettes as nom, difficulte_recettes as difficulte, temps_recettes as temps, nombre_personne_recettes as nombrePersonne 
        //FROM recettes";
        
        $sql = "SELECT r.id_recettes as id, r.nom_recettes as nom, r.difficulte_recettes as difficulte, r.nombre_personne_recettes as nombrePersonne, 
        r.temps_recettes as temps, u.nom_utilisateurs as nomUtilisateur, c.id_chef as idChef
        FROM recettes as r, utilisateurs as u, chef as c WHERE r.id_chef = c.id_chef and c.id_chef = u.id_utilisateurs";
        
        $resultat = $pdo->query($sql);
        
        
        $array = [];
        if($resultat){
            
            while($data = $resultat->fetch( PDO::FETCH_ASSOC )){ 
                $chef = new Chef();
                $chef->setId($data['idChef']);  
                $chef->setNom($data['nomUtilisateur']);

                $recette = new Recettes();
                $recette->setId($data['id']);
                $recette->setNom($data['nom']);
                $recette->setDifficulte($data['difficulte']);
                $recette->setNombrePersonne($data['nombrePersonne']);
                $recette->setTemps($data['temps']);
                $recette->setChef($chef);
            }
            array_push ($array, $recette);
        
            
        }else{
            $array;
        }
        return $array;
    }
}
