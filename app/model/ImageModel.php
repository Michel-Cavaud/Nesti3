<?php

/**
 * Description of ImageModel
 *
 * @author michel
 */
class ImageModel{
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
         
        } catch(PDOException $e) {
            $pdo->rollback();
        }
    }
    
     public function readOne($recette){
        
        $pdo = Database::getPdo();
    
        $sql = "SELECT 	nom_images as nom, extension_images as ext FROM images WHERE id_images = :id";
        
        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array('id' => $recette->getImage()->getId()));

        if($resultat){
            $data = $sth->fetch();
            $image = new Images();
            $image->setId($recette->getId());
            $image->setNom($data['nom']);
            $image->setExtension($data['ext']);
            $recette->setImage($image);  
            return $recette;
               
        }
        else{
            return false;
        }   
    }
}
