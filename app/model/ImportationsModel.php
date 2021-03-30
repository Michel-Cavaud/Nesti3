<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImportationsModel
 *
 * @author michel
 */
class ImportationsModel {
     public function dateImport($id){
        
        $pdo = Database::getPdo();
        
        $sql = "SELECT date_importation FROM `importations` WHERE `id_externe` = :id ORDER BY date_importation DESC LIMIT 1";
        
        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array('id' => $id));

         if($resultat && $sth->rowCount() > 0){
            $data = $sth->fetch()['date_importation'];
        }else{
            return 0;
        }
        return $data;
    }  
}
