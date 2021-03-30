<?php

$modelArticle = new ArticleModel();

if($action == ""){
    $data = listArticles($data, $modelArticle);   
}else{
    switch ($action) {
        case 'edition':
            $data = edition($data);
            break;
        case 'supprimer':
            $data = supprimer($data, $modelArticle);
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

function edition($data){
    $data['chemin'] = "Articles";
    $data['cheminRole'] = "articles";
    $data['chemin2'] = "> Article";
    return $data;
}

function supprimer($data, $modelArticle){
    $data['chemin'] = "Articles";
    $data['cheminRole'] = "articles";
    $data['chemin2'] = "> Article";

    $data['article'] = $modelArticle->readAll();
    return $data;
}

