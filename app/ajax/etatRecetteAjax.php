<?php

include_once '../config/config.php';
 //var_dump($_POST);//autoload
include_once '../model/RecetteModel.php';
include_once '../model/IngredientModel.php';
include_once '../model/ParagrapheModel.php';
include_once '../model/Database.php';
//include_once '../entite/Produits.php';
//include_once '../entite/Ingredients.php';

if (isset($_POST) & !empty($_POST)){
   //var_dump($_POST);
    $modelRecette = new RecetteModel();
    $image = $modelRecette->chercheImage($_POST['id'])['id_images'];
    
    $etat = $modelRecette->chercheEtat($_POST['id'])['etat_recettes'];
    if($etat == 'a'){
        $etatText = "en ligne";
        $bouton= '<button type"button" class="btn btnValider" id="etatRecetteBtn" data-id="' . $_POST['id'] . '"> Mettre cette recette hors ligne ?</button>';
    }elseif($etat == 'w'){
        $etatText = "en attente";
        $bouton = '<button type"button" class="btn btnValider" id="etatRecetteBtn" data-id="' . $_POST['id'] . '"> Mettre cette recette en ligne ?</button>';
    }
   
    $modelIngredient = new IngredientModel;
    $ingredient = $modelIngredient->inRecette($_POST['id']);
    
    $modelParagraphe= new ParagrapheModel;
    $paragraphe = $modelParagraphe->inRecette($_POST['id']);
       
    $htmlEtat = '<div>Votre recette est ' . $etatText . '</div>';
    $html = '<div class="list-group">';
    $valid = true;
    if($image == null){
        $html .=  '<a href="#" class="list-group-item list-group-item-action">Votre recette n\'a pas d\'image</a>';
        $valid = false;
    }
    if($ingredient == 0){
        $html .=  '<a href="#" class="list-group-item list-group-item-action">Votre recette n\'a pas d\'ingrédient</a>';
        $valid = false;
    }
    if($paragraphe == 0){
        $html .=  '<a href="#" class="list-group-item list-group-item-action">Votre recette n\'a pas de préparation</a>';
        $valid = false;
    }
    $html .= '</div>';
    
    if ($valid){ 
        $html = $htmlEtat . $bouton;  
    }else{
        $modelRecette->updateEtat($_POST['id']);
        $etatText = "en attente";
        $htmlEtat = '<div>Votre recette est ' . $etatText . '</div>';
        $bouton = '<button type"button" class="btn btnValider" id="etatRecetteBtn" data-id="' . $_POST['id'] . '"> Mettre cette recette en ligne ?</button>';
        $html = $htmlEtat . $html; 
    }
    echo $html;  
}


