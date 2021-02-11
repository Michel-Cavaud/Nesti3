<?php

include_once '../config/config.php';
 //var_dump($_POST);//autoload
include_once '../model/UniteModel.php';
include_once '../model/Database.php';
include_once '../entite/UniteDeMesure.php';

if (isset($_POST) & !empty($_POST)){
   //var_dump($_POST);
    $modelUnite = new UniteModel();
    
    $unite = new UnitedeMesure();
    $unite->setNom($_POST['name']);
    
    $array = $modelUnite->selectRecherche($unite);
    $listeRetour = []; 
    foreach ($array as $value) {
        $listeRetour[] = array( 'id' => $value->getId(), 'label' => $value->getNom(), 'value' => $value->getNom());
    }
    header('Content-Type: application/json');
    echo json_encode($listeRetour);  
}
    


