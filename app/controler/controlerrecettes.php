<?php

$modelRecette = new RecetteModel();
$modelImage = new ImageModel();
$modelIngredient = new IngredientRecetteModel();

 $data['recette'] = new Recettes();
 $data['recette']->setDifficulte(0);
 //$data['recette']->setNom('');
 $data['nomRecetteMessage'] = "";
 $data['difficulteMessage'] = "";
 $data['tempsMessage'] = "";
 $data['nbPersonneMessage'] = "";
 $data['messageInsert']= "";
 
 $data['actifHaut'] = "";
 
if (isset($_POST['ok'])){
    extract($_POST);
    $filtre = new controlerFormRecette();
    $filtre->filter();
    //var_dump($_POST);
    $data['recette']->setNom($nomRecette);
    $data['recette']->setDifficulte($difficulte);
    $data['recette']->setNombrePersonne($nbPersonne);
    $data['recette']->setTemps($temps);
    $data['recette']->setEtat("w");
    $chef = new Chef();
    $chef->setId($_SESSION['idUser']);
    $data['recette']->setChef($chef);
    
    if($filtre->hasErrors()) {
        $listeErreurs = $filtre->errors; 
        if(isset($listeErreurs['nomRecette'])){
            $data['nomRecetteMessage'] = $listeErreurs['nomRecette'];
        }
         if(isset($listeErreurs['difficulte'])){
            $data['difficulteMessage'] = $listeErreurs['difficulte'];
        }
         if(isset($listeErreurs['nbPersonne'])){
            $data['nbPersonneMessage'] = $listeErreurs['nbPersonne'];
        }
         if(isset($listeErreurs['temps'])){
            $data['tempsMessage'] = $listeErreurs['temps'];
        }
        $idNew = "";
     }else{
        if(isset($idRecette)){
            $data['recette']->setId($idRecette);
            $modelRecette->update($data['recette']);
        }else{
            $data['actifHaut'] = "disabled='disabled'";
            $data['actif'] = "";
            $idNew = $modelRecette->insert($data['recette']);
            $data['messageInsert'] = "Votre recette a été créée en mode bloqué. Pour valider votre recette compléter les Ingrédients et les préparations";      
        }
       
     }
}else{
     $idNew = "";
}

if($action == ""){
    $data = listRecettes($data, $modelRecette);   
}else{
    switch ($action) {
        case 'ajout':
            $data = ajout($data, $idNew);
            break;
        case 'edition':
            $data = edition($data, $modelRecette, $modelImage, $modelIngredient, $id);
            break;
        case 'supprimer':
            $data = supprimer($data, $modelRecette);
            break;
        default:
            break;
    }   
}
$data['btnNavActifRecettes'] = "btnnavActif";

function edition($data, $modelRecette, $modelImage, $modelIngredient, $id){
    $data['chemin'] = "Recettes";
    $data['cheminRole'] = "recettes";
    $data['chemin2'] = "> Recette";
    $recette = $modelRecette->readOne($id);
    
    $data['idNew'] = $id;
    if($recette->getImage()->getId() != null){
        $recette = $modelImage->readOne($recette);
        
    }
   
    if($recette->getImage()->getNom() != "" & $recette->getImage()->getExtension() != ""){
        
        $source =  $recette->getImage()->getNom() . "." . $recette->getImage()->getExtension();
        
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
    
    $ingredientRecette = new IngredientsRecettes();
    $ingredientRecette->setRecette($recette);
   
    $listeIngredient = $modelIngredient->selectPourRecette($ingredientRecette);
   
    $html = "";
    foreach ($listeIngredient as $value) {
        
        $html .="<div class='row justify-content-between'><div class='col-8'>" . $value->getQuantite() . ' ' . $value->getUniteMesure()->getNom() 
                   . ' de ' . $value->getIngredient()->getNom() ;
        $html .= "</div> <div class='col-4'><button type='button' data-id='" . $value->getIngredient()->getId();
        $html .= "' class='btn btn-link p-0 m-0'>Supprimer</button></div></div> ";
    }
    $data['listeIngredient'] = $html;
    
    $data['recette'] = $recette;
    
    $modelPreparation = new ParagrapheModel();
    $preparations = $modelPreparation->selectAllRecette($data['idNew']);
    $i=0;
    $iMax = count($preparations);
    $html = "";
    foreach ($preparations as $preparation) {
        if($i == 0){
           
            $html .= 
            '<div class="row align-items-end">
                <div class="col-2 text-right">
                    <div>
                        <button type="button" data-ordre="' . $preparation->ordre_paragraphes . '" class="btn btnBas">
                            <img src="' . PATH_IMAGES . 'icons/down-svg.png' . '" alt="" class="img-fluid">
                        </button>
                    </div>';
        }elseif ($i == $iMax - 1) {
            $html .= ' <div class="row align-items-end">
                <div class="col-2 text-right">
                <div>
                   <button type="button"  data-ordre="' . $preparation->ordre_paragraphes . '" class="btn btnHaut">
                         <img src="' . PATH_IMAGES . 'icons/up-svg.png' . '" alt="" class="img-fluid">
                   </button>

               </div>';
            
        }else{
           $html .= ' <div class="row align-items-end">
               <div class="col-2 text-right">
                <div>
                   <button type="button"  data-ordre="' . $preparation->ordre_paragraphes . '" class="btn btnHaut">
                         <img src="' . PATH_IMAGES . 'icons/up-svg.png' . '" alt="" class="img-fluid">
                   </button>

               </div>
               <div>
                   <button type="button" data-ordre="' . $preparation->ordre_paragraphes . '" class="btn btnBas">
                            <img src="' . PATH_IMAGES . 'icons/down-svg.png' . '" alt="" class="img-fluid">
                        </button>

               </div> ';

        }
        $html .=  '<div>
                        <button  type="button" data-ordre="' . $preparation->ordre_paragraphes . '" class="btn btnCorbeille corbeillePrepa mb-4">
                            <img src="' . PATH_IMAGES . 'icons/delete-svg.png' . '" alt="" class="img-fluid">
                        </button>
                    </div>
                </div>
                <div class="col-9">
                    <div class="form-group pr-3">
                        <textarea class="form-control p-3 preparation" rows="3">' . $preparation->contenu_paragraphes . '</textarea>
                    </div>
                </div>
            </div>';
        $i++;
        
    }
    $data['listePreparation'] = $html;
    
    return $data;
}

function listRecettes($data, $modelRecette){
    $data['chemin'] = "";
    $data['cheminRole'] = "";
    $data['chemin2'] = "";
    
    $data['recettes'] = $modelRecette->readAll();
    
    
    return $data;
}

function ajout($data, $idNew){
    $data['chemin'] = "Recettes";
    $data['cheminRole'] = "recettes";
    $data['chemin2'] = "> Recette";
    $data['idNew'] = $idNew;
    if($idNew == ""){
        $data['actif'] = "disabled='disabled'";
    }else{
        $data['actif'] = "";
    }
    return $data;
}

function supprimer($data, $modelRecette){
    $data['chemin'] = "Recettes";
    $data['cheminRole'] = "recettes";
    $data['chemin2'] = "> Recette";

    $data['recettes'] = $modelRecette->readAll();
    return $data;
}