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
    public static function formatTempsSQL($time){
        
            if($time < 60){
                $heures = "00";
                $minutes = $time;
            }else{
                $heures = round($time / 60); 
                $minutes = round($time % 60);
                if($heures < 10){
                    $heures = "0" . $heures;
                }
            } 
     
       
        $secondes2 = "00"; 
        if($minutes < 10){
            $minutes = "0" . $minutes;
        }
        
      
        $timeFinal = $heures . ":" . $minutes . ":" . $secondes2; 
        //var_dump($timeFinal);
        return $timeFinal; 
        
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




