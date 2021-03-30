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
        r.temps_recettes as temps, r.etat_recettes as etat, u.nom_utilisateurs as nomUtilisateur, c.id_chef as idChef, r.id_images as idImage
        FROM recettes as r, utilisateurs as u, chef as c
        WHERE r.id_chef = c.id_chef AND c.id_chef = u.id_utilisateurs AND r.id_recettes = :id";
        
        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array('id' => $id));

        if($resultat && $sth->rowCount() > 0){
            $data = $sth->fetch();
            $chef = new Chef();
            $chef->setId($data['idChef']);  
            $chef->setNom($data['nomUtilisateur']);
            
            $image= new Images();
            
            if ($data['idImage'] != null){
                $image->setId($data['idImage']);
            }

            $recette = new Recettes();
            $recette->setId($data['id']);
            $recette->setNom($data['nom']);
            $recette->setDifficulte($data['difficulte']);
            $recette->setNombrePersonne($data['nombrePersonne']);
            $recette->setTemps($data['temps']);
            $recette->setChef($chef);
            $recette->setEtat($data['etat']);
            $recette->setImage($image);
            
            return $recette;  
        }else{
            return false;
        }   
    }
    
    public function readAll(){
       
        $pdo = Database::getPdo();
        
        $sql = "SELECT r.id_recettes as id, r.nom_recettes as nom, r.difficulte_recettes as difficulte, r.nombre_personne_recettes as nombrePersonne, 
        r.temps_recettes as temps, r.etat_recettes as etat, u.nom_utilisateurs as nomUtilisateur, c.id_chef as idChef
        FROM recettes as r, utilisateurs as u, chef as c WHERE r.id_chef = c.id_chef and c.id_chef = u.id_utilisateurs and r.etat_recettes <> 'b'";
        
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
                $recette->setEtat($data['etat']);
                $recette->setChef($chef);
            
                array_push ($array, $recette);
            }
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
         
        } catch(PDOException $e) {
            $pdo->rollback();
        }
        return $id;
    }
    
    public function supImage($id){
        
        $sql = "UPDATE `recettes` SET `id_images` = NULL WHERE `recettes`.`id_recettes` = :id;";
        
        $pdo = Database::getPdo();
         try {
            $pdo->beginTransaction();
            $sth = $pdo->prepare($sql);
            $sth->execute(array('id' => $id));
            $pdo->commit();
         
        } catch(PDOException $e) {
            $pdo->rollback();
        }
    }
    
    public function chercheImage($id){
        $pdo = Database::getPdo();
        $sql = "SELECT id_images FROM recettes WHERE id_recettes = :id";
        
        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array('id' => $id));
        
         if($resultat){
            $data = $sth->fetch();
            return $data;   
        }
        else{
            return false;
        }
        
    }
    
    public function chercheEtat($id){
        $pdo = Database::getPdo();
        $sql = "SELECT etat_recettes FROM recettes WHERE id_recettes = :id";
        
        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array('id' => $id));
        
         if($resultat){
            $data = $sth->fetch();
            return $data;   
        }
        else{
            return false;
        }
        
    }

    public function update($recette){
        $pdo = Database::getPdo();
        
        $sql = 'UPDATE `recettes` SET  `nom_recettes` = :nom, '
            . '`difficulte_recettes` = :difficulte, `nombre_personne_recettes` = :nb, `temps_recettes` = :temps WHERE `recettes`.`id_recettes` = :id';
        
        $sth = $pdo->prepare($sql);
        $sth->execute(array('id' => $recette->getId(), 'nom' => $recette->getNom(), 'difficulte' => $recette->getDifficulte(), 'nb' => $recette->getNombrePersonne(), 'temps' =>$recette->getTempsSQL()));
         
    }
    
     public function updateEtat($id){
        $pdo = Database::getPdo();
        
        $sql = 'UPDATE `recettes` SET  `etat_recettes` = :etat WHERE `recettes`.`id_recettes` = :id';
        
        $sth = $pdo->prepare($sql);
        $sth->execute(array('id' => $id, 'etat' => 'w'));
         
    }
    
      public function inverseEtat($id){
        $pdo = Database::getPdo();
        
        $sql = 'SELECT etat_recettes as etat FROM recettes WHERE id_recettes = :id';
        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array('id' => $id));
        
        if ($resultat){
            $data = $sth->fetch();
   
            $sql = 'UPDATE `recettes` SET  `etat_recettes` = :etat WHERE `recettes`.`id_recettes` = :id';
            $sth = $pdo->prepare($sql);
            if($data['etat'] == 'w'){
                $sth->execute(array('id' => $id, 'etat' => 'a'));
            }else{
                $sth->execute(array('id' => $id, 'etat' => 'w'));
            }
        }      
    }
    
    public function delete($id){
        $pdo = Database::getPdo();
        
        $sql = 'UPDATE `recettes` SET `etat_recettes` = "b" WHERE `recettes`.`id_recettes` = :id';
        $sth = $pdo->prepare($sql);
        $sth->execute(array('id' => $id));
    }
    
}
