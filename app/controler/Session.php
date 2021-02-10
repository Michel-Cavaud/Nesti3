<?php

class Session {

    public function isConnectUser() {

        $isConnect = false;

        if(isset($_SESSION["idUser"]) &&  !empty($_SESSION["idUser"])) {
            $isConnect = true;
        }
        return $isConnect;
    }

    public function connectUser($id, $nom, $prenom) {

        $_SESSION["idUser"] = $id;
        $_SESSION["nomUser"] = $nom;
        $_SESSION["prenomUser"] = $prenom;
    }

    public function disconnectUser() {
        session_unset();
        session_destroy();
    }

}

