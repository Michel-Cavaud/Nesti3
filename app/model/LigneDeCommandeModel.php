<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LigneDeCommande
 *
 * @author michel
 */
class LigneDeCommandeModel {
    
    function qtyCommande($id){
        $pdo = Database::getPdo();
        
        $sql = "SELECT SUM(quantite_commandes) as qty FROM `ligne_de_commandes` WHERE `id_externe` = :id ";
        
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
