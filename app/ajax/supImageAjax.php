<?php


include_once '../config/config.php';
 //var_dump($_POST);//autoload
include_once '../model/RecetteModel.php';
include_once '../model/Database.php';

if (isset($_POST) & !empty($_POST)){
    $modelRecette= new RecetteModel();
    
    $data = $_POST["data"];
    $data  = json_decode("$data", true);
    
    extract($data); 
    
    $modelRecette->supImage($id);
            
    echo '';    
    
}