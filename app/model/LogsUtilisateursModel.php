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
}
