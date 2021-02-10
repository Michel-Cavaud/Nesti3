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
            $array = $sth->fetchAll(PDO::FETCH_CLASS, 'Ingredients');
            //var_dump($array);
        }else{
            $array = [];
        }
        return $array;
        
        
        
    }
}
