<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LogsUtilisateurs
 *
 * @author michel
 */
class LogsUtilisateursModel {
    public function insert($utilisateur){

       $pdo = Database::getPdo();

       $sql = "INSERT INTO `logs_utilisateurs` (`id_utilisateurs`) VALUES (:id);";

       try {
           $pdo->beginTransaction();
           $sth = $pdo->prepare($sql);
           $sth->execute(array('id' => $utilisateur->getId()));

           $pdo->commit();

       } catch(PDOException $e) {
           $pdo->rollback();
       }

    }
    
    public function selectOne($utilisateur){

        $pdo = Database::getPdo();

        $sql = 'SELECT date_logs_utilisateurs as date_logs FROM `logs_utilisateurs` WHERE id_utilisateurs = :id ORDER by date_logs_utilisateurs DESC LIMIT 1';
        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array('id' => $utilisateur->id_utilisateurs));
       
        if($resultat && $sth->rowCount() > 0){
            $data = $sth->fetch()['date_logs'];
            
        }else{
            $data = 'Jamais';
        }
        return $data;

    }
}
