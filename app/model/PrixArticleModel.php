<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PrixArticleModel
 *
 * @author michel
 */
class PrixArticleModel {
    
    public function readOne($id){
        
        $pdo = Database::getPdo();
        
        $sql = "SELECT * FROM `prix_article` WHERE `id_externe` = :id ORDER BY date_creation_prix_article DESC LIMIT 1";
        
        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array('id' => $id));

        if($resultat && $sth->rowCount() > 0){
            $array = $sth->fetchAll(PDO::FETCH_CLASS, 'PrixArticle');
        }else{
            $array = false;
        }
        return $array;
    }  
}
