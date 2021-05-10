<?php

$modelArticle = new ArticleModel();
//$data['article'] = new Articles();
 $data['nomComArticleMessage'] = '';

 if( $_SESSION['admin']){
    if (isset($_POST['ok'])){
       extract($_POST);

       $filtre = new controlerFormArticle();
       $filtre->filter();
       $data['article'] = new Articles();
       $data['article']->setNomCom($nomComArticle);
       $data['article']->setId($identifiant);

       if($filtre->hasErrors()) {  
           $listeErreurs = $filtre->errors; 
           if(isset($listeErreurs['nomComArticle'])){
               $data['nomComArticleMessage'] = $listeErreurs['nomComArticle'];   
           }  
       }else{
           $modelArticle->update($data['article']);
       } 
   }
   }else{
     header('Location:' . BASE_URL . 'acces/interdit');  
}

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
  //var_dump($data['article']);
    return $data;
}

function edition($data, $modelArticle, $id){
    $data['chemin'] = "Articles";
    $data['cheminRole'] = "articles";
    $data['chemin2'] = "> Article";
    
    $data['article'] = $modelArticle->readOne($id);
    //var_dump($data['article']);
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

