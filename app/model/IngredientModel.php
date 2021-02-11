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
class IngredientModel {
    public function selectRecherche($ingredient){
        
        $pdo = Database::getPdo();
        
        $sql = "SELECT produits.id_produits as id, produits.nom_produits as nom 
                FROM ingredients, produits WHERE produits.id_produits = ingredients.id_produits AND produits.nom_produits LIKE :val";
        
        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array('val' => '%' . $ingredient->getNom() . '%'));
       
        if($resultat){
            $array = $sth->fetchAll(PDO::FETCH_CLASS, 'Produits');
            //var_dump($array);
        }else{
            $array = [];
        }
        return $array;
        
    }
    
     public function selectCount($ingredient){
        $pdo = Database::getPdo();
        
        $sql = "SELECT * FROM ingredients as i, produits as p WHERE p.id_produits = i.id_produits AND i.id_produits = :id AND p.nom_produits = :nom";
        
        $sth = $pdo->prepare($sql);
        $sth->execute(array('nom' => $ingredient->getNom(), 'id' => $ingredient->getId() ));
        
        return $sth->rowCount();
    }
    
    public function insert($ingredient){
        $pdo = Database::getPdo();
        
        $sql = "INSERT INTO `produits` (`nom_produits`) "
                . "VALUES (:nom);";
        
        $sql2 = "INSERT INTO `ingredients` (`id_produits`) "
                . "VALUES (:id);";

        try {
            $pdo->beginTransaction();
            $sth = $pdo->prepare($sql);
            $sth->execute(array('nom' => $ingredient->getNom()));
            //$sth->debugDumpParams();
            $id = $pdo->lastInsertId();
            
            $sth2 = $pdo->prepare($sql2);
            $sth2->execute(array('id' => $id));
            
            
            $pdo->commit();
         
        } catch(PDOExecption $e) {
            $pdo->rollback();
        }
        return $id;
        
    }
}
