<?php

$modelRecette = new RecetteModel();
 $data['recette'] = new Recettes();
 //$data['recette']->setNom('');
 $data['nomRecetteMessage'] = "";
 $data['difficulteMessage'] = "";
 $data['tempsMessage'] = "";
 $data['nbPersonneMessage'] = "";
 
 $data['actifHaut'] = "";
 
if (isset($_POST['ok'])){
    extract($_POST);
    $filtre = new controlerFormRecette();
    $filtre->filter();
    //var_dump($_POST);
    $data['recette']->setNom($nomRecette);
    $data['recette']->setDifficulte($difficulte);
    $data['recette']->setNombrePersonne($nbPersonne);
    $data['recette']->setTemps($temps);
    
    if($filtre->hasErrors()) {
        $listeErreurs = $filtre->errors; 
        if(isset($listeErreurs['nomRecette'])){
            $data['nomRecetteMessage'] = $listeErreurs['nomRecette'];
        }
         if(isset($listeErreurs['difficulte'])){
            $data['difficulteMessage'] = $listeErreurs['difficulte'];
        }
         if(isset($listeErreurs['nbPersonne'])){
            $data['nbPersonneMessage'] = $listeErreurs['nbPersonne'];
        }
         if(isset($listeErreurs['temps'])){
            $data['tempsMessage'] = $listeErreurs['temps'];
        }
     }else{
         $data['actifHaut'] = "disabled='disabled'";
         $data['actif'] = "";
         
         $id= 1;
     }
}
if($action == ""){
    $data = listRecettes($data, $modelRecette);   
}else{
    switch ($action) {
        case 'ajout':
            $data = ajout($data, $id);
            break;
        case 'edition':
            $data = edition($data, $modelRecette, $id);
            break;
        case 'supprimer':
            $data = supprimer($data, $modelRecette);
            break;
        default:
            break;
    }   
}
$data['btnNavActifRecettes'] = "btnnavActif";

function edition($data, $modelRecette, $id){
    $data['chemin'] = "Recettes";
    $data['cheminRole'] = "recettes";
    $data['chemin2'] = "> Recette";
    
    $data['recette'] = $modelRecette->readOne($id)[0];
    
    return $data;
}

function listRecettes($data, $modelRecette){
    $data['chemin'] = "";
    $data['cheminRole'] = "";
    $data['chemin2'] = "";
    
    $data['recettes'] = $modelRecette->readAll();
    
    
    return $data;
}

function ajout($data, $id){
    $data['chemin'] = "Recettes";
    $data['cheminRole'] = "recettes";
    $data['chemin2'] = "> Recette";
    
    if($id ==""){
        $data['actif'] = "disabled='disabled'";
    }else{
        $data['actif'] = "";
    }
    return $data;
}

function supprimer($data, $modelRecette){
    $data['chemin'] = "Recettes";
    $data['cheminRole'] = "recettes";
    $data['chemin2'] = "> Recette";

    $data['recettes'] = $modelRecette->readAll();
    return $data;
}