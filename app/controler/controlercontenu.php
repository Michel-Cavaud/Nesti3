<?php


if(in_array($loc, $arrayLoc) & $action ==""){
   $files = PATH_VIEW . $loc .  'content.php'; 
}else if(in_array($loc, $arrayLoc) & in_array($action, $arrayAction)){
    if($action == "deconnexion"){
        $files = PATH_VIEW . 'logincontent.php';
    }else{
        if($loc == 'recettes' & $action == 'supprimer'){
            $files = PATH_VIEW . $loc . 'content.php';
        }else{
            $files = PATH_VIEW . $loc . $action . 'content.php';
        }
        
    }
    
}else{
    header('Location:' . PATH_ERROR . 'error404.html');
}

include_once $files;



