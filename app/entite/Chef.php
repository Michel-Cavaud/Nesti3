<?php



/**
 * Description of ingredients
 *
 * @author michel
 */
class Chef {
   private $id;
   
    public function __construct($row) {
        
        $this->id = $row['id_utilisateurs'];
        
    }
    
    function getId() {
        return $this->id;
    }

    function setId($id): void {
        $this->id = $id;
    }


}