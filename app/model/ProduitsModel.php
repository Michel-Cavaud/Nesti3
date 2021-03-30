<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProduitsModel
 *
 * @author michel
 */
class ProduitsModel {
     public function isProduit($id){
        
        $pdo = Database::getPdo();
        
        $sql = "SELECT * FROM `produits` WHERE `id_produits` = :id";
        
        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array('id' => $id));

         if($resultat && $sth->rowCount() > 0){
            return true;
        }else{
            return false;
        }
        
    }  
}
