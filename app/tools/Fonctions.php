<?php

class Fonctions{

    public static function formatTemps($temps){

        $arrayTemps = explode(":", $temps);
        if($arrayTemps[0] == '00'){
            $retour = $arrayTemps[1] . 'mn';
        }else{
            $retour = $arrayTemps[0] . 'h ' . $arrayTemps[1] . 'mn';
        }

        return $retour;

    }

    public static function cript($mdp){
        $options = [
            'cost' => 12,
        ];
        return password_hash($mdp, PASSWORD_BCRYPT, $options);

    }

    public static function  deCript($mdp, $hash){
        return password_verify($mdp, $hash);

    }




}





