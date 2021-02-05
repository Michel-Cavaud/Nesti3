<?php

include_once './app/config/config.php';

if(DEBUG){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);  
    
    var_dump($_GET);
    var_dump($_POST);
}

$loc = filter_input(INPUT_GET, "loc", FILTER_SANITIZE_STRING);
$action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if($loc == ""){
    $loc = "recettes";
}
//echo $loc;
//echo $action;
//echo $id;


$data = array(
    'chemin' => '',
    'cheminRole' => '',
    'chemin2' => '',
    'btnNavActif' => ''
);

$arrayLoc = array('login', 'recettes', 'articles', 'utilisateurs', 'statistique');

if(in_array($loc, $arrayLoc)){
   include_once PATH_CTRL . 'controler' . $loc . '.php'; 
}
else{
    //header('Location:' . PATH_ERROR . 'error404.html');
}

if($loc != 'login'){
    include_once PATH_VIEW . 'template.php'; 
}else{
     include_once PATH_VIEW . 'templatelogin.php';
}





