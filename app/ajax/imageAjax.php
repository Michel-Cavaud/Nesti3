<?php


include_once '../config/config.php';
 //var_dump($_POST);//autoload
include_once '../model/ImageModel.php';
include_once '../model/Database.php';
include_once '../entite/Images.php';

if (isset($_FILES) & !empty($FILES)){
    $modelImage = new ImageModel();
    
    $valid_extensions = array('jpeg', 'jpg', 'png');
    $path = PATH_IMAGES_UPLOAD; 

    //var_dump($_FILES);
    
    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
   
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    $position = strpos($img, ".");
   
    if(in_array($ext, $valid_extensions)){ 
        $path = $path.strtolower($img); 
        if(move_uploaded_file($tmp, $path)){
            echo $img;
            $idNew = $_POST['idNew'];
            $image = new Images();
            $image->setExtension($ext);
            $image->setNom(substr($img, 0, $position));
            $modelImage->insert($image, $idNew);
        }else{
            echo "!";
        }
    }else{
            echo "!";
    }
}



