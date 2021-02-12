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
   
    $data = $_POST["data"];
    $data  = json_decode("$data", true);
    
    extract($data);  
      
    //var_dump($idNew);
    //var_dump($idProduit);
    
    $recette = new Recettes();
    $recette->setId($idNew);
    $ingredient = new Ingredients();
    $ingredient->setId($idProduit);
    $ingredientRecette = new IngredientsRecettes();
    $ingredientRecette->setRecette($recette);
    $ingredientRecette->setIngredient($ingredient);

    $ingredientRecetteModel = new IngredientRecetteModel;
    $ingredientRecetteModel->delete($ingredientRecette);

    
    
    $ligne = $ingredientRecetteModel->selectPourRecette($ingredientRecette);
    $listeRetour = [];
    foreach ($ligne as $value) {
        $listeRetour[] = array( 'nom' => $value->getQuantite() . ' ' . $value->getUniteMesure()->getNom() 
                . ' de ' . $value->getIngredient()->getNom(), 'bouton' => $value->getIngredient()->getId());

    }
    
    header('Content-Type: application/json');
    echo json_encode($listeRetour); 
}

