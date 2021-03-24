<?php

$modelUtilisateur = new UtilisateursModel();

$data['utilisateur'] = new Utilisateurs();
$data['nomUtilisateurMessage'] = "";
$data['prenomUtilisateurMessage'] = "";
$data['emailUtilisateurMessage'] = "";
$data['mdpUtilisateurMessage'] = "";



if (isset($_POST['ok'])){
    if (!isset($_POST['idEdition'])){
        extract($_POST);
        $filtre = new controlerFormUtilisateur();
        $filtre->filter();

        $data['utilisateur']->setNom($nomUtilisateur);
        $data['utilisateur']->setPrenom($prenomUtilisateur);
        $data['utilisateur']->setRole($roleUtilisateur);
        $data['utilisateur']->setEtat($etatUtilisateur);
        $data['utilisateur']->setEmail($emailUtilisateur);

        if($filtre->hasErrors()) {
            $listeErreurs = $filtre->errors; 
            if(isset($listeErreurs['nomUtilisateur'])){
                $data['nomUtilisateurMessage'] = $listeErreurs['nomUtilisateur'];
            }
             if(isset($listeErreurs['prenomUtilisateur'])){
                $data['prenomUtilisateurMessage'] = $listeErreurs['prenomUtilisateur'];
            }
             if(isset($listeErreurs['emailUtilisateur'])){
                $data['emailUtilisateurMessage'] = $listeErreurs['emailUtilisateur'];
            }
             if(isset($listeErreurs['mdpUtilisateur'])){
                $data['mdpUtilisateurMessage'] = $listeErreurs['mdpUtilisateur'];
            }
        }else{
           $data['utilisateur']->setMdp($mdpUtilisateur);
           $data['utilisateur']->setPseudo(substr($prenomUtilisateur, 0, 1) . $nomUtilisateur);
           $modelUtilisateur->insert($data['utilisateur']);
           $data['utilisateur']->setMdp('');
           header('Location:' . BASE_URL . 'utilisateurs');
        }
    }else{
        extract($_POST);
       
        $filtre = new controlerFormUtilisateur(true);
        $filtre->filter();

        $data['utilisateur']->setNom($nomUtilisateur);
        $data['utilisateur']->setPrenom($prenomUtilisateur);
        $data['utilisateur']->setRole($roleUtilisateur);
        $data['utilisateur']->setEtat($etatUtilisateur);
        if($filtre->hasErrors()) {
            $listeErreurs = $filtre->errors; 
            if(isset($listeErreurs['nomUtilisateur'])){
                $data['nomUtilisateurMessage'] = $listeErreurs['nomUtilisateur'];
            }
             if(isset($listeErreurs['prenomUtilisateur'])){
                $data['prenomUtilisateurMessage'] = $listeErreurs['prenomUtilisateur'];
            }
        }else{
            
           $data['utilisateur']->setId($idEdition);
           $modelUtilisateur->update($data['utilisateur']);
           //$modelUtilisateur->insert($data['utilisateur']);
           //$data['utilisateur']->setMdp('');
           //header('Location:' . BASE_URL . 'utilisateurs');
           header('Location:' . BASE_URL . 'utilisateurs/edition/' . $idEdition);
        }
        
    }
}

if($action == ""){
    $data = listUtilisateurs($data, $modelUtilisateur);   
}else{
    switch ($action) {
        case 'ajout':
            $data = ajout($data);
            break;
        case 'edition':
            $data = edition($data, $modelUtilisateur, $id);
            break;
        case 'supprimer':
            $data = supprimer($data, $modelUtilisateur);
            break;
        default:
            break;
    }   
}
$data['btnNavActifUtilisateurs'] = "btnnavActif";

function edition($data, $modelUtilisateur, $id){
    $data['utilisateur'] = $modelUtilisateur->readOne($id)[0];

    $data['isChef'] = $modelUtilisateur->isChef($data['utilisateur']);
    
    $data['isAdmin'] = $modelUtilisateur->isAdmin($data['utilisateur']);
    $data['isModerateur'] = $modelUtilisateur->isModerateur($data['utilisateur']);
    
    $data['chemin'] = "Utilisateurs";
    $data['cheminRole'] = "utilisateurs";
    $data['chemin2'] = "> Utilisateur";
    
    return $data;
}

function listUtilisateurs($data, $modelUtilisateur){
    $data['chemin'] = "";
    $data['cheminRole'] = "";
    $data['chemin2'] = "";
    
    
    $data['utilisateurs'] = $modelUtilisateur->readAll();
    
    $modelLog = new LogsUtilisateursModel();
    foreach ($data['utilisateurs']  as $utilisateur) {
        //date dernière connexion
        $utilisateur->dernierlog = $modelLog->selectOne($utilisateur);
        
        //état en toutes lettres
        if($utilisateur->etat_utilisateurs == 'a'){
            $utilisateur->etat_utilisateurs = 'Actif';
        }elseif ($utilisateur->etat_utilisateurs == 'b') {
            $utilisateur->etat_utilisateurs = "Bloqué";
        }else{
            $utilisateur->etat_utilisateurs = 'en attente';
        }
        
        //est chef?
        $role = [];
        if($modelUtilisateur->isChef($utilisateur)){
            array_push ($role, 'Chef');
        }
        if($modelUtilisateur->isAdmin($utilisateur)){
            array_push ($role, 'Admin');
        }
        if($modelUtilisateur->isModerateur($utilisateur)){
            array_push ($role, 'Modérateur');
        }
        if (count($role) == 0){
            array_push ($role, 'Utilisateur');
        }
        $utilisateur->setRole($role);
        
    }
    
    return $data;
}

function ajout($data){
    $data['chemin'] = "Utilisateurs";
    $data['cheminRole'] = "utilisateurs";
    $data['chemin2'] = "> Utilisateur";
    
    $data['mdpAleatoire'] = Fonctions::createPassword();
    
    return $data;
}

function supprimer($data, $modelUtilisateur){
    $data['chemin'] = "Utilisateurs";
    $data['cheminRole'] = "utilisateurs";
    $data['chemin2'] = "> Utilisateur";

    $data['utilisateurs'] = $modelUtilisateur->readAll();
    return $data;
}