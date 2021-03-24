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
    
    public static function formatTempsMn($temps){
          $arrayTemps = explode(":", $temps);
        if($arrayTemps[0] == '00'){
            $retour = $arrayTemps[1];
        }else{
            $retour = $arrayTemps[0] * 60 + $arrayTemps[1];
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

    public static function createPassword($length = 8) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $chars2 ='$@$!%*#?&';
        $chars3 ='1234567890';
        $pwd2 = substr(str_shuffle($chars2),0,3);
        $pwd4 = substr(str_shuffle($chars3),2,1);
        $pwd = substr(str_shuffle($chars),0,$length);
        $pwd3 = substr(str_shuffle($chars),0,$length);
        return $pwd4 . crypt($pwd, $pwd3) . $pwd2;
        
    }

    


}





