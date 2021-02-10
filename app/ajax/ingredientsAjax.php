<?php

include_once '../config/config.php';
 //var_dump($_POST);//autoload
include_once '../model/IngredientModel.php';
include_once '../model/Database.php';
include_once '../entite/Produits.php';
include_once '../entite/Ingredients.php';

if (isset($_POST) & !empty($_POST)){
   //var_dump($_POST);
    $modelIngredient = new IngredientModel();
    
    $ingredient = new Ingredients();
    $ingredient->setNom($_POST['name']);
    
    $array = $modelIngredient->selectRecherche($ingredient);
    var_dump($array);
    $listeRetour = []; 
    foreach ($array as $value) {
        $listeRetour[] = array( 'id' => $value->getId(), 'label' => $value->getNom(), 'value' => $value->getNom());
        var_dump($value->getNom());
    }
    header('Content-Type: application/json');
    echo json_encode($listeRetour);  
}
    


