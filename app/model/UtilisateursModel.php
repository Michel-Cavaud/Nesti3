<?php


class UtilisateursModel {
    
    public function insert($utilisateur){
        $pdo = Database::getPdo();
        $sql = 'INSERT INTO `utilisateurs` ( `pseudo_utilisateurs`, `nom_utilisateurs`, `prenom_utilisateurs`, '
                . '`email_utilisateurs`, `mdp_utilisateurs`, `etat_utilisateurs` '
                . ') VALUES (:pseudo, :nom, :prenom, :email,'
                . ' :mdp, :etat);';
         
        $sqlChef = "INSERT INTO `chef` (`id_chef`) VALUES (:id)";
        $sqlAdmin = "INSERT INTO `admin` (`id_admin`) VALUES (:id)";
        $sqlModerateur = "INSERT INTO `moderateurs` (`id_moderateurs`) VALUES (:id)";
        $flag = false;
        try {
            $pdo->beginTransaction();
            $sth = $pdo->prepare($sql);
            $sth->execute(array('pseudo' => $utilisateur->getPseudo(), 'nom' => $utilisateur->getNom(), 'prenom' => $utilisateur->getPrenom(),
                'email' => $utilisateur->getEmail(), 'mdp' => $utilisateur->getMdp(), 'etat' => $utilisateur->getEtat()));
            
            $id = $pdo->lastInsertId();
            foreach ($utilisateur->getRoleArray() as $role) {
                switch ($role) {
                    case 1:
                        break;
                     case 2:
                        $sth = $pdo->prepare($sqlAdmin);
                        $sth->execute(array('id' => $id));
                        break;
                     case 3:
                        $sth = $pdo->prepare($sqlModerateur);
                        $sth->execute(array('id' => $id));
                        break;
                     case 4:
                        $sth = $pdo->prepare($sqlChef);
                        $sth->execute(array('id' => $id));
                        break;
                    default:
                        break;
                }
            }      
            $pdo->commit();  
            $flag = true;
        } catch(PDOException $e) {
            $pdo->rollback();
        }
        return $flag;
    }
    
    public function update($utilisateur){
        $pdo = Database::getPdo();
        
        $sql = 'UPDATE `utilisateurs` SET `nom_utilisateurs` = :nom, `prenom_utilisateurs` = :prenom, `etat_utilisateurs` = :etat WHERE `utilisateurs`.`id_utilisateurs` = :id';
        
        $sqlModerateur = "DELETE FROM `moderateurs` WHERE `moderateurs`.`id_moderateurs` = :id";
        $sqlAdmin = "DELETE FROM `admin` WHERE `admin`.`id_admin` = :id";
        $sqlChef = "DELETE FROM `chef` WHERE `chef`.`id_chef` = :id";
        
        $flag = false;
        try {
            $pdo->beginTransaction();
            
            $sth = $pdo->prepare($sql);
            $resultat = $sth->execute(array('id' => $utilisateur->getId(), 'nom' =>$utilisateur->getNom(), 'prenom' =>$utilisateur->getPrenom(),'etat' =>$utilisateur->getEtat())); 
            
            $sth = $pdo->prepare($sqlModerateur);
            $sth->execute(array('id' => $utilisateur->getId()));
            $sth = $pdo->prepare($sqlAdmin);
            $sth->execute(array('id' => $utilisateur->getId()));
            $sth = $pdo->prepare($sqlChef);
            $sth->execute(array('id' => $utilisateur->getId()));
            
            $sqlChef = "INSERT INTO `chef` (`id_chef`) VALUES (:id)";
            $sqlAdmin = "INSERT INTO `admin` (`id_admin`) VALUES (:id)";
            $sqlModerateur = "INSERT INTO `moderateurs` (`id_moderateurs`) VALUES (:id)";
            
            foreach ($utilisateur->getRoleArray() as $role) {
                switch ($role) {
                    case 1:
                        break;
                     case 2:
                        $sth = $pdo->prepare($sqlAdmin);
                        $sth->execute(array('id' => $utilisateur->getId()));
                        break;
                     case 3:
                        $sth = $pdo->prepare($sqlModerateur);
                        $sth->execute(array('id' => $utilisateur->getId()));
                        break;
                     case 4:
                        $sth = $pdo->prepare($sqlChef);
                        $sth->execute(array('id' => $utilisateur->getId()));
                        break;
                    default:
                        break;
                }
            }      
            
            $pdo->commit(); 
            $flag = true;
        } catch(PDOException $e) {
            $pdo->rollback();
        }
        return $flag;
    }
    
    public function connexionUser($identifiant){

        $pdo = Database::getPdo();

        $sql = "SELECT id_utilisateurs, mdp_utilisateurs, nom_utilisateurs, prenom_utilisateurs FROM utilisateurs WHERE email_utilisateurs = :identifiant OR pseudo_utilisateurs = :identifiant";

        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array('identifiant' => $identifiant));

        if($resultat){
            $array = $sth->fetchAll(PDO::FETCH_CLASS, 'Utilisateurs');
        }else{
            $array = [];
        }
        return $array;

    }
    
    public function readAll(){
        
        $pdo = Database::getPdo();
        
        $sql = 'SELECT id_utilisateurs, nom_utilisateurs, prenom_utilisateurs, etat_utilisateurs FROM utilisateurs ';
        
        $sth = $pdo->prepare($sql);
         $resultat = $sth->execute();

        $array = [];
         if($resultat){
            $array = $sth->fetchAll(PDO::FETCH_CLASS, 'Utilisateurs');
           
        }else{
            $array = [];
        }
        return $array;
     
     }
     
     public function readOne($id){
        $pdo = Database::getPdo();
        
        $sql = 'SELECT * FROM utilisateurs WHERE id_utilisateurs = :id';
        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array('id' => $id));
        $array = [];
         if($resultat){
            $array = $sth->fetchAll(PDO::FETCH_CLASS, 'Utilisateurs');
           
        }else{
            $array = [];
        }
        return $array;
     }
     
    public function isChef($utilisateur){

        $pdo = Database::getPdo();

        $sql = 'SELECT * FROM chef WHERE id_chef = :id';

        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array('id' => $utilisateur->id_utilisateurs));
        if($resultat && $sth->rowCount() > 0){

            return true;

        }else{
            return false;
        }

    }
    
    public function isAdmin($utilisateur){

        $pdo = Database::getPdo();

        $sql = 'SELECT * FROM admin WHERE id_admin = :id';

        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array('id' => $utilisateur->id_utilisateurs));

        if($resultat && $sth->rowCount() > 0){

            return true;

        }else{
            return false;
        }

    }
    
     public function isModerateur($utilisateur){

        $pdo = Database::getPdo();

        $sql = 'SELECT * FROM moderateurs WHERE id_moderateurs = :id';

        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array('id' => $utilisateur->id_utilisateurs));

        if($resultat && $sth->rowCount() > 0){

            return true;

        }else{
            return false;
        }

    }
    
    public function delete($id){
        $pdo = Database::getPdo();
        
        $sql = 'UPDATE `utilisateurs` SET `etat_utilisateurs` = "b" WHERE `utilisateurs`.`id_utilisateurs` = :id';
        $sth = $pdo->prepare($sql);
        $sth->execute(array('id' => $id));
    }
    
   
}