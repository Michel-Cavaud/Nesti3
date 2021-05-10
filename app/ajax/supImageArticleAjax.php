<?php


include_once '../config/config.php';
 //var_dump($_POST);//autoload
include_once '../model/ArticleModel.php';
include_once '../model/Database.php';

if (isset($_POST) & !empty($_POST)){
    $modelArticle= new ArticleModel();
    
    $data = $_POST["data"];
    $data  = json_decode("$data", true);
    
    extract($data); 
    
    $modelArticle->supImage($id);
            
    echo '';    
    
}