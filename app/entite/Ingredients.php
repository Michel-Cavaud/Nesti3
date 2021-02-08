<?php



/**
 * Description of ingredients
 *
 * @author michel
 */
class Ingredients extends Produits{
   private $id;
   
    public function __construct($row) {
        
        $this->id = $row['id_produits'];
        
    }
    
    function getId() {
        return $this->id;
    }

    function setId($id): void {
        $this->id = $id;
    }


}
