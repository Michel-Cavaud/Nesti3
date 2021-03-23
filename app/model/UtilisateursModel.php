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
         
        } catch(PDOException $e) {
            $pdo->rollback();
        }
        
    }
    
    public function connexionUser($identifiant){

        $pdo = Database::getPdo();

        $sql = "SELECT id_utilisateurs as id, mdp_utilisateurs as mdp, nom_utilisateurs as nom, prenom_utilisateurs as prenom FROM utilisateurs WHERE email_utilisateurs = :identifiant OR pseudo_utilisateurs = :identifiant";

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
        
        $sql = 'SELECT id_utilisateurs, nom_utilisateurs, etat_utilisateurs FROM utilisateurs ';
        
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
}