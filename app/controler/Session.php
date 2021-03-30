<?php

class Session {

    public function isConnectUser() {

        $isConnect = false;

        if(isset($_SESSION["idUser"]) &&  !empty($_SESSION["idUser"])) {
            $isConnect = true;
        }
        return $isConnect;
    }

    public function connectUser($utilisateur) {
         $utilisateurModel = new UtilisateursModel();
        $_SESSION["chef"] =  $utilisateurModel->isChef($utilisateur);
        $_SESSION["admin"] =  $utilisateurModel->isAdmin($utilisateur);
        $_SESSION["moderateur"] =  $utilisateurModel->isModerateur($utilisateur);
                 
        $_SESSION["idUser"] = $utilisateur->id_utilisateurs;
        $_SESSION["nomUser"] = $utilisateur->nom_utilisateurs;
        $_SESSION["prenomUser"] = $utilisateur->prenom_utilisateurs;
    }

    public function disconnectUser() {
        session_unset();
        session_destroy();
    }

}

