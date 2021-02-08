<?php



/**
 * Description of ingredients
 *
 * @author michel
 */
class Chef extends Utilisateurs{
    
    private $id;
   
    function getId() {
        return $this->id;
    }

    function setId($id): void {
        $this->id = $id;
    }


}
