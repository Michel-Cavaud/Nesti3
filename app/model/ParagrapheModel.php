<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PreparationModel
 *
 * @author michel
 */
class ParagrapheModel {

    public function countpreparation($idRecette) {

        $pdo = Database::getPdo();


        $sql = 'SELECT MAX(ordre_paragraphes) as maxi FROM paragraphes WHERE id_recettes = :id';

        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array('id' => $idRecette));

        if ($resultat) {
            $valMax = $sth->fetch(PDO::FETCH_ASSOC)["maxi"];
            if ($valMax == null) {
                $valMax = 0;
            }
        } else {
            $valMax = null;
        }
        return $valMax;
    }

    public function insert($preparation) {

        $pdo = Database::getPdo();

        $sql = "INSERT INTO `paragraphes` (`contenu_paragraphes`, `ordre_paragraphes`, `id_recettes`) "
                . "VALUES (:contenu, :ordre, :id);";

        try {
            $pdo->beginTransaction();
            $sth = $pdo->prepare($sql);
            $sth->execute(array('contenu' => $preparation->getContenu(), 'ordre' => $preparation->getOrdre(), 'id' => $preparation->getIdRecettes()));
            $pdo->commit();
        } catch (PDOException $e) {
            $pdo->rollback();
        }
    }

    public function selectAllRecette($idRecette) {

        $pdo = Database::getPdo();

        $sql = 'SELECT *  FROM paragraphes WHERE id_recettes = :id ORDER by ordre_paragraphes ASC';

        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array('id' => $idRecette));

        if ($resultat) {
            $array = $sth->fetchAll(PDO::FETCH_CLASS, 'Paragraphes');
            //var_dump($array);
        } else {
            $array = [];
        }
        return $array;
    }
    
    public function delete($idRecette, $ordre){

        $pdo = Database::getPdo();

        $sql = 'DELETE FROM `paragraphes` WHERE `id_recettes` = :id AND `ordre_paragraphes` = :ordre';
        
        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array('id' => $idRecette, 'ordre' => $ordre));
        
    }
    
    public function changeOrdre($idParagraphe, $ordre){
        $pdo = Database::getPdo();

        $sql = 'UPDATE `paragraphes` SET `ordre_paragraphes` = :ordre WHERE `paragraphes`.`id_paragraphes` = :id';
        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array('id' => $idParagraphe, 'ordre' => $ordre));
        
        
    }
    
     public function inversseOrdre($idRecette, $ordre, $sens){
        $pdo = Database::getPdo();
        $sql = 'UPDATE `paragraphes` SET `ordre_paragraphes` = :ordreNew WHERE `id_recettes` = :id AND `ordre_paragraphes` = :ordre';
        $sth = $pdo->prepare($sql);
        
   
        if($sens == 'haut'){
            $sth->execute(array('id' => $idRecette, 'ordreNew' => "-1", 'ordre' => $ordre));
            $sth->execute(array('id' => $idRecette, 'ordreNew' => $ordre, 'ordre' => $ordre - 1));
            $sth->execute(array('id' => $idRecette, 'ordreNew' => $ordre - 1, 'ordre' => "-1")); 
             
        }else{
            $sth->execute(array('id' => $idRecette, 'ordreNew' => "-1", 'ordre' => $ordre));
            $sth->execute(array('id' => $idRecette, 'ordreNew' => $ordre, 'ordre' => $ordre + 1));
            $sth->execute(array('id' => $idRecette, 'ordreNew' => $ordre + 1, 'ordre' => "-1"));          
        }
    }
    
    public function inRecette($id){
        $pdo = Database::getPdo();
        
        $sql = "SELECT * FROM paragraphes WHERE id_recettes = :id";
        
        $sth = $pdo->prepare($sql);
        $sth->execute(array('id' => $id ));
        
        return $sth->rowCount();
    }

}
