<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IngredientModel
 *
 * @author michel
 */
class UniteModel {
    public function selectRecherche($unite){
        
        $pdo = Database::getPdo();
        
        $sql = "SELECT unites_de_mesure.id_unites_de_mesure as id, unites_de_mesure.nom_unites_de_mesure as nom 
                FROM  unites_de_mesure WHERE  unites_de_mesure.nom_unites_de_mesure LIKE :val";
        
        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array('val' => '%' . $unite->getNom() . '%'));
       
        if($resultat){
            $array = $sth->fetchAll(PDO::FETCH_CLASS, 'UnitedeMesure');
            //var_dump($array);
        }else{
            $array = [];
        }
        return $array; 
    }
    
    public function selectCount($unite){
        $pdo = Database::getPdo();
        
        $sql = "SELECT * FROM unites_de_mesure WHERE unites_de_mesure.nom_unites_de_mesure = :nom AND unites_de_mesure.id_unites_de_mesure = :id";
        
        $sth = $pdo->prepare($sql);
        $sth->execute(array('nom' => $unite->getNom(), 'id' => $unite->getId() ));
        
        return $sth->rowCount();
    }
    
    public function insert($unite){
        $pdo = Database::getPdo();
        
         $sql = "INSERT INTO `unites_de_mesure` (`nom_unites_de_mesure`) "
                . "VALUES (:nom);";

        try {
            $pdo->beginTransaction();
            $sth = $pdo->prepare($sql);
            $sth->execute(array('nom' => $unite->getNom()));
            //$sth->debugDumpParams();
            $id = $pdo->lastInsertId();
            $pdo->commit();
         
        } catch(PDOExecption $e) {
            $pdo->rollback();
        }
        return $id;
        
    }
}