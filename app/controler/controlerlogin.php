<?php

$isValidI = "";
$isValidMdp = "";
$valI = "";

if($action == "deconnexion"){
    $messageConnexion = "Déconnexion réussi";
    $couleur = "disabled";
    
    $maSession->disconnectUser();
    
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
        $userConnect = null;
        $users = $utilisateursModel->connexionUser($identifiant);
        foreach($users as $user){
            if(Fonctions::deCript($mdp, $user->getMdp())){
                $userConnect = $user;
                break; 
            }
        }
        
        if($userConnect != null){
            $maSession->connectUser($userConnect->getId(), $userConnect->getNom(), $userConnect->getPrenom());
           
            //var_dump($_SESSION);
            header('Location:' . BASE_URL);
        }
    }

    //$hash = Fonctions::cript($mdp);
    //echo $hash;

    //echo Fonctions::deCript($mdp, $hash);

}
