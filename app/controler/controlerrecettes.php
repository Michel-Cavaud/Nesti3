<?php

include_once PATH_ENTITE . 'Recettes.php';
include_once PATH_MODEL . 'RecetteModel.php';
$modelRecette = new RecetteModel();

if($action == ""){
    $data = listRecettes($data, $modelRecette);   
}else{
    switch ($action) {
        case 'ajout':
            $data = ajout($data);
            break;

        default:
            break;
    }   
}
$data['btnNavActif'] = "btnnavActif";



function listRecettes($data, $modelRecette){
    $data['chemin'] = "";
    $data['cheminRole'] = "";
    $data['chemin2'] = "";
    
    $data['recettes'] = $modelRecette->readAll();
    
    
    return $data;
}

function ajout($data){
    $data['chemin'] = "Recettes";
    $data['cheminRole'] = "recettes";
    $data['chemin2'] = "> Recette";
    return $data;
}