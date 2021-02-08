<?php

$modelRecette = new RecetteModel();

if($action == ""){
    $data = listRecettes($data, $modelRecette);   
}else{
    switch ($action) {
        case 'ajout':
            $data = ajout($data);
            break;
        case 'supprimer':
            $data = supprimer($data, $modelRecette);
            break;
        default:
            break;
    }   
}
$data['btnNavActifRecettes'] = "btnnavActif";



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

function supprimer($data, $modelRecette){
    $data['chemin'] = "Recettes";
    $data['cheminRole'] = "recettes";
    $data['chemin2'] = "> Recette";

    $data['recettes'] = $modelRecette->readAll();
    return $data;
}