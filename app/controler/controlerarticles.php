<?php

$modelArticle = new ArticleModel();

if($action == ""){
    $data = listArticles($data, $modelArticle);   
}else{
    switch ($action) {
        case 'edition':
            $data = edition($data, $modelArticle, $id);
            break;
        case 'supprimer':
            $data = supprimer($data, $modelArticle, $id);
            break;
        case 'importer':
            $data = importer($data, $modelArticle);
        default:
            break;
    }   
}
$data['btnNavActifArticles'] = "btnnavActif";

function importer($data, $modelArticle){
     $data['chemin'] = "Articles";
    $data['cheminRole'] = "articles";
    $data['chemin2'] = "> Importer";
    return $data;
    
}

function listArticles($data, $modelArticle){
    $data['chemin'] = "";
    $data['cheminRole'] = "";
    $data['chemin2'] = "";
    
    $data['article'] = $modelArticle->readAll();
  
    return $data;
}

function edition($data, $modelArticle, $id){
    $data['chemin'] = "Articles";
    $data['cheminRole'] = "articles";
    $data['chemin2'] = "> Article";
    
    $data['article'] = $modelArticle->readOne($id);
    
    if($data['article']->getImage()->getId() != null){
        $modelImage = new ImageModel();
       $data['article'] = $modelImage->readOne($data['article']);
    }
    if($data['article']->getImage()->getNom() != "" & $data['article']->getImage()->getExtension() != ""){
        
        $source =  $data['article']->getImage()->getNom() . "." . $data['article']->getImage()->getExtension();
        
        if(file_exists(PATH_IMAGES_UPLOAD . $source)){
            $data['srcImage'] = PATH_IMAGES . '/upload/' . $source;
            $data['urlImage'] = $source;
            $data['invisible'] = '';
        }else{
            $data['srcImage'] = PATH_IMAGES . 'vide.png';
            $data['urlImage'] = '';
            $data['invisible'] = 'invisible';
        }
    }else{
        $data['srcImage'] = PATH_IMAGES . 'vide.png';
        $data['urlImage'] = '';
        $data['invisible'] = 'invisible';
    }
    
    return $data;
}

function supprimer($data, $modelArticle, $id){
    $data['chemin'] = "Articles";
    $data['cheminRole'] = "articles";
    $data['chemin2'] = "> Article";
    
    $modelArticle->delete($id);

    $data['article'] = $modelArticle->readAll();
    return $data;
}

