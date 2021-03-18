<?php

include_once '../config/config.php';
//var_dump($_POST);//autoload
include_once '../model/ParagrapheModel.php';
include_once '../model/Database.php';
include_once '../entite/Paragraphes.php';


if (isset($_POST) & !empty($_POST)) {
    //var_dump($_POST);
    $modelPreparation = new ParagrapheModel();

    $data = $_POST["data"];
    $data  = json_decode("$data", true);
    
    extract($data);
    
    $modelPreparation->inversseOrdre($idNew, $ordre, 'haut' );

    $preparations = $modelPreparation->selectAllRecette($idNew);
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

    echo $html;
}



