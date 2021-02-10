<?php



/**
 * Description of RecetteModal
 *
 * @author michel
 */ 
//include PATH_MODEL . 'database.php';

class RecetteModel {
    public function readOne($id){
        
        $pdo = Database::getPdo();
        
        $sql = "SELECT r.id_recettes as id, r.nom_recettes as nom, r.difficulte_recettes as difficulte, r.nombre_personne_recettes as nombrePersonne, 
        r.temps_recettes as temps
        FROM recettes as r WHERE id_recettes = :id";
        
        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array('id' => $id));
        
        if($resultat){
            $array = $sth->fetchAll(PDO::FETCH_CLASS, 'Recettes');
        }else{
            $array = [];
        }
        return $array;
        
        
    }
    
    public function readAll(){
       
        $pdo = Database::getPdo();
        
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
            
                array_push ($array, $recette);
            }
        }else{
            $array;
        }
        return $array;
    }

    public function insert($recette){

        $pdo = Database::getPdo();

        $sql = "INSERT INTO `recettes` (`nom_recettes`, `difficulte_recettes`, `nombre_personne_recettes`, `etat_recettes`, `temps_recettes`, `id_chef`) "
                . "VALUES (:nom, :difficulte, :nbPersonne, :etat, :temps, :chef);";

        try {
            $pdo->beginTransaction();
            $sth = $pdo->prepare($sql);
            $sth->execute(array('nom' => $recette->getNom(), 'difficulte' => $recette->getDifficulte(), 'nbPersonne' => $recette->getNombrePersonne(),
                'etat' => $recette->getEtat(), 'temps' => $recette->getTempsSQL(), 'chef' => $recette->getChef()->getId()));
            //$sth->debugDumpParams();
            $id = $pdo->lastInsertId();
            $pdo->commit();
         
        } catch(PDOExecption $e) {
            $pdo->rollback();
        }
        return $id;
    }

    
}
