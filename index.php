<?php
require __DIR__.'/vendor/autoload.php';

include_once './app/loader.php';

//echo $loc;
//echo $action;
//echo $id;


$data = array(
    'chemin' => '',
    'cheminRole' => '',
    'chemin2' => '',
    'btnNavActifArticles' => '',
    'btnNavActifRecettes' => '',
    'btnNavActifUtilisateurs' => '',
    'btnNavActifStatistiques' => '',
);

$arrayLoc = array('login', 'recettes', 'articles', 'utilisateurs', 'statistiques', 'acces');
$arrayAction = array('ajout', 'edition', 'commandes', 'importation', 'deconnexion', 'supprimer', 'importer', 'erreur', 'interdit');
if(in_array($loc, $arrayLoc)){
   include_once PATH_CTRL . 'controler' . $loc . '.php'; 
}
else{
    header('Location:' . PATH_ERROR . 'error404.html');
}

include_once PATH_VIEW . 'template.php'; 






