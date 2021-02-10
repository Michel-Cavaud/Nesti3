<?php

/**
 * Description of ImageModel
 *
 * @author michel
 */
class ImageModel {
    public function insert($image, $idRecette){
        
        $pdo = Database::getPdo();

        $sql = "INSERT INTO `images` (`nom_images`, `extension_images`) "
                . "VALUES (:nom, :ext);";
        $sql2 = "UPDATE `recettes` SET `id_images` = :idImage WHERE `recettes`.`id_recettes` = :idRecette;";

        try {
            $pdo->beginTransaction();
            $sth = $pdo->prepare($sql);
            $sth->execute(array('nom' => $image->getNom(), 'ext' => $image->getExtension()));
            //$sth->debugDumpParams();
            $id = $pdo->lastInsertId();
            
            $sth = $pdo->prepare($sql2);
            $sth->execute(array('idImage' => $id, 'idRecette' => $idRecette));
            $pdo->commit();
         
        } catch(PDOExecption $e) {
            $pdo->rollback();
        }
       
        
    }
}
