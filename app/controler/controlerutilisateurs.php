<?php

$modelUtilisateur = new UtilisateursModel();

if($action == ""){
    $data = listUtilisateurs($data, $modelUtilisateur);   
}else{
    switch ($action) {
        case 'ajout':
            $data = ajout($data);
            break;
        case 'supprimer':
            $data = supprimer($data, $modelUtilisateur);
            break;
        default:
            break;
    }   
}
$data['btnNavActifUtilisateurs'] = "btnnavActif";



function listUtilisateurs($data, $modelUtilisateur){
    $data['chemin'] = "";
    $data['cheminRole'] = "";
    $data['chemin2'] = "";
    
    $data['utilisateurs'] = $modelUtilisateur->readAll();
    
    
    return $data;
}

function ajout($data){
    $data['chemin'] = "Utilisateurs";
    $data['cheminRole'] = "utilisateurs";
    $data['chemin2'] = "> Utilisateur";
    return $data;
}

function supprimer($data, $modelUtilisateur){
    $data['chemin'] = "Utilisateurs";
    $data['cheminRole'] = "utilisateurs";
    $data['chemin2'] = "> Utilisateur";

    $data['utilisateurs'] = $modelUtilisateur->readAll();
    return $data;
}