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
            
            $utilisateur = new Utilisateurs();
            $utilisateur->setId($userConnect->getId());
            $logsUtilisateur = new LogsUtilisateursModel();
            $logsUtilisateur->insert($utilisateur);
            
            header('Location:' . BASE_URL);
        }else{
          
            header('Location:' . BASE_URL . 'login/erreur');
        }
    }

    //$hash = Fonctions::cript($mdp);
    //echo $hash;

    //echo Fonctions::deCript($mdp, $hash);

}
