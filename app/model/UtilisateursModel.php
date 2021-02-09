<?php


class UtilisateursModel {

    public function connexionUser($identifiant){

        $pdo = Database::getPdo();

        $sql = "SELECT id_utilisateurs as id, mdp_utilisateurs as mdp FROM utilisateurs WHERE email_utilisateurs = :identifiant OR pseudo_utilisateurs = :identifiant";

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
  
         return $array = [];
     }
}