<?php
header('Content-Type:application/json; charset=utf-8');
include_once '../config/config.php';
//var_dump($_POST);

include_once '../model/Database.php';
include_once '../model/UniteModel.php';
include_once '../model/IngredientModel.php';
include_once '../model/IngredientRecetteModel.php';
    
include_once '../entite/Produits.php';
include_once '../entite/Ingredients.php';
include_once '../entite/UniteDeMesure.php';
include_once '../entite/Recettes.php';
include_once '../entite/IngredientsRecettes.php';


if (isset($_POST) & !empty($_POST)){
   extract($_POST);
   
   $uniteModel = new UniteModel;
   
   $unite = new UniteDeMesure();
   $unite->setId($uniteHidden);
   $unite->setNom($inputUnite);
   
   $countUnite = $uniteModel->selectCount($unite);
   
   if($countUnite == 0){
       $idNewUnite = $uniteModel->insert($unite);
       $unite->setId($idNewUnite);
   }
   
   $ingredientModel = new IngredientModel();
   $ingredient = new Ingredients();
   
   $ingredient->setId($ingredientHidden);
   $ingredient->setNom($inputIngredient);
    
   $countIngredient = $ingredientModel->selectCount($ingredient);
   
   if($countIngredient == 0){
       $idNewIngredient = $ingredientModel->insert($ingredient);
       $ingredient->setId($idNewIngredient);
   }
   
   $recette = new Recettes();
   $recette->setId($idNew);
   
   $ingredientRecette = new IngredientsRecettes();
   $ingredientRecette->setRecette($recette);
   $ingredientRecette->setIngredient($ingredient);
   
   $ingredientRecetteModel = new IngredientRecetteModel;
    
   $ordre = $ingredientRecetteModel->selectOrdre($ingredientRecette);
   $ingredientRecette->setOrdre($ordre + 1);
   $ingredientRecette->setQuantite((int)$qty);
   $ingredientRecette->setUniteMesure($unite);
   
   $listeRetour = [];
   if($ingredientRecetteModel->insert($ingredientRecette) == 0){
      $listeRetour['erreur'] = "L'ingrédient est déjà dans la liste";
       
   }else{
       $ligne = $ingredientRecetteModel->selectPourRecette($ingredientRecette);
       
       foreach ($ligne as $value) {
           $listeRetour[] = array( 'nom' => $value->getQuantite() . ' ' . $value->getUniteMesure()->getNom() 
                   . ' de ' . $value->getIngredient()->getNom(), 'bouton' => $value->getOrdre());
           
       }
   }
   

    
   header('Content-Type: application/json');
   echo json_encode($listeRetour); 
  
}
