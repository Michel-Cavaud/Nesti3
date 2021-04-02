<?php

$isValidI = "";
$isValidMdp = "";
$valI = "";



if($action == "deconnexion"){
    $messageConnexion = "Déconnexion réussi";
    $couleur = "disabled";
    
    $maSession->disconnectUser();
    
}else if ($action == "erreur"){
    $messageConnexion = "Erreur de connexion merci de vérifier vos identifiants !";
    $couleur = "erreurLogin";
    $maSession->disconnectUser();
    
}else{
    $messageConnexion = "";

    $couleur = "";
    
}


if (isset($_POST['ok'])){
    //var_dump($_POST);
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
        //print_r($users);
        foreach($users as $user){
            if(Fonctions::deCript($mdp, $user->mdp_utilisateurs)){
                $userConnect = $user;
                break; 
            }
        }
        
        if($userConnect != null){
            $maSession->connectUser($userConnect);
            $logsUtilisateur = new LogsUtilisateursModel();
            $logsUtilisateur->insert($userConnect);
            //print_r($_SESSION);
            if($_SESSION['chef']){
                header('Location:' . BASE_URL);
            }
            elseif($_SESSION['admin']){
                header('Location:' . BASE_URL . 'statistiques');
            }
            elseif($_SESSION['moderateur']){
                header('Location:' . BASE_URL . 'utilisateurs');
            }elseif($_SESSION['utilisateur']){
                //echo $_SESSION['utilisateur'];
            }else{
                $maSession->disconnectUser();
                header('Location:' . BASE_URL . 'login/erreur');
            }
        }else{
           $maSession->disconnectUser();
            header('Location:' . BASE_URL . 'login/erreur');
        }
    }

    //$hash = Fonctions::cript($mdp);
    //echo $hash;

    //echo Fonctions::deCript($mdp, $hash);

}
