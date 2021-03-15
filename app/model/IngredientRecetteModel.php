<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IngredientRecetteModel
 *
 * @author michel
 */
class IngredientRecetteModel {
   public function selectOrdre($ingredientRecette){
        
        $pdo = Database::getPdo();
        
        $sql = "SELECT MAX(ordre_ingredients_recette) as maxi FROM  ingredients_recettes WHERE id_recettes = :idRecette";
        
        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array( 'idRecette' => $ingredientRecette->getRecette()->getId()));
  
        if($resultat){
            $valMax = $sth -> fetch(PDO::FETCH_ASSOC)["maxi"];
            if($valMax == null){
                $valMax = 0;
            }
        }else{
            $valMax = null;  
        }
        return $valMax;
   }
   
    public function insert($ingredientRecette){

        $pdo = Database::getPdo();

        $sql = "INSERT IGNORE INTO `ingredients_recettes` (`id_produits`, `id_recettes`, `quantite_ingredients_recette`, `ordre_ingredients_recette`, `id_unites_de_mesure`) "
                . "VALUES (:idProduit, :idRecette, :qty, :ordre, :idUnite);";
        
        try {     
            $pdo->beginTransaction();
            $sth = $pdo->prepare($sql);
            $sth->execute(array('idProduit' => $ingredientRecette->getIngredient()->getId(), 'idRecette' => $ingredientRecette->getRecette()->getId(),
                'qty' => $ingredientRecette->getQuantite(), 'ordre' => $ingredientRecette->getOrdre(), 'idUnite' => $ingredientRecette->getUniteMesure()->getId()));
            $flag = $sth->rowCount();
            $pdo->commit();
            
            
        } catch(PDOException $e) {
            $flag = false;
        } 
        
        return $flag;
    }
    
    public function selectPourRecette($ingredientRecette){
        
        $pdo = Database::getPdo();
        
        $sql = "SELECT i.id_produits as idproduit, p.nom_produits as nomProduit, i.quantite_ingredients_recette as qty, u.nom_unites_de_mesure as nomUnite, i.ordre_ingredients_recette as ordre"
                . " FROM ingredients_recettes as i, unites_de_mesure as u, produits as p WHERE i.id_unites_de_mesure = u.id_unites_de_mesure"
                . " AND i.id_produits = p.id_produits AND i.id_recettes = :id  ORDER BY ordre ASC";
        
        $sth = $pdo->prepare($sql);
        $resultat = $sth->execute(array('id' => $ingredientRecette->getRecette()->getId()));
        
        $array = [];
        if($resultat){
            while($data = $sth->fetch( PDO::FETCH_ASSOC )){ 
                $recette = new Recettes;
                
                $ingredient = new Ingredients;
                $ingredient->setId($data['idproduit']);
                $ingredient->setNom($data['nomProduit']);
                
                $unite = new UniteDeMesure;
                $unite->setNom($data['nomUnite']);
                
                $ingredientRecette = new IngredientsRecettes();
                $ingredientRecette->setRecette($recette);
                $ingredientRecette->setIngredient($ingredient);
                $ingredientRecette->setUniteMesure($unite);
                $ingredientRecette->setQuantite($data['qty']);
                $ingredientRecette->setOrdre($data['ordre']);
                array_push ($array, $ingredientRecette);
                
            }
        }else{
            $array;
        }
        return $array;
    }
    
    public function delete($ingredientRecette){
        
        $pdo = Database::getPdo();
        
        $sql = "DELETE FROM `ingredients_recettes` WHERE `ingredients_recettes`.`id_produits` = :idProduit AND `ingredients_recettes`.`id_recettes` = :idRecette ";
        
        //var_dump($sql);
         try {     
            $pdo->beginTransaction();
            $sth = $pdo->prepare($sql);
            $resultat = $sth->execute(array('idRecette' => $ingredientRecette->getRecette()->getId(), 'idProduit' => $ingredientRecette->getIngredient()->getId()));
            $pdo->commit();
            
        } catch(PDOException $e) {
           
        } 
        
        
    }
}
