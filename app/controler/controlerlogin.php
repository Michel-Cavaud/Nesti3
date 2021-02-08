<?php

$isValidI = "";
$isValidMdp = "";
$valI = "";

if($action == "deconnexion"){
    $messageConnexion = "Déconnexion réussi";

    $couleur = "disabled";
}else{
    $messageConnexion = "";

    $couleur = "";
    
}
//var_dump($_POST);

if (isset($_POST['ok'])){
    extract($_POST);
    if ($identifiant == ""){
        $isValidI = "is-invalid";
    }
    if ($mdp == ""){
        $isValidMdp = "is-invalid";
        $valI = $identifiant;
    }

    if ($mdp != "" & $identifiant !=""){
        $utilisateursModel = new UtilisateursModel;

        $users = $utilisateursModel->connexionUser($identifiant);
        foreach($users as $user){
            if(Fonctions::deCript($mdp, $user->getMdp())){
                

            }

        }
    }

    //$hash = Fonctions::cript($mdp);
    //echo $hash;

    //echo Fonctions::deCript($mdp, $hash);

}
