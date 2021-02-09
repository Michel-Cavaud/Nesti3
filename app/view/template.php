<!DOCTYPE html>
<html lang="fr">
<head>
    
    <?php
        include PATH_VIEW . 'common/head.php';
    ?>
</head>

<body>
    <?php 
    if($loc != 'login'){
        include PATH_VIEW . 'common/navigation.php';
        include PATH_VIEW . 'common/chemin.php';
    }
       
        include PATH_CTRL . 'controlercontenu.php';
    ?>
    
    <script src="<?=PATH_JS ?>script.js"></script>
</body>
</html>

