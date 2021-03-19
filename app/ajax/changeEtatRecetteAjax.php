<?php

include_once '../config/config.php';
 //var_dump($_POST);//autoload
include_once '../model/RecetteModel.php';

include_once '../model/Database.php';

if (isset($_POST) & !empty($_POST)){
    
    $modelRecette = new RecetteModel();
    $modelRecette->inverseEtat($_POST['id']);

}


