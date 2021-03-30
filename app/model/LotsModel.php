<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LotsModel
 *
 * @author michel
 */
class LotsModel {
    function qtyLot($id){
        $pdo = Database::getPdo();
        
        $sql = "SELECT SUM(quantite_achete_lots) as qty FROM `lots` WHERE `id_externe` = :id ";
        
        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array('id' => $id));

        if($resultat && $sth->rowCount() > 0){
            $data = $sth->fetch()['qty'];
        }else{
            return 0;
        }
        return $data;
        
    }
    
   
}
