<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControlerFormArticle
 *
 * @author michel
 */
class ControlerFormArticle {
     // Message d'erreur pré-rédigés
    private static $ERREURS_ELEMVIDE = [
        'nomComArticle' => "Vous devez renseigner un nom commercial."
    ];
    private static $ERREURS_ELEMINVALID = [
        'nomComArticle' => "Vous devez renseigner un nom commercial."
    ];

    private $errors = array();
    private $definitions = array();
    
     public function __get($var) {
        if ($var != 'errors') {
            throw new BadMethodCallException(__CLASS__ . "::$var : inaccessible ou inexistant.");
        }
        return $this->errors;
    }

    public function __construct() {
        $this->definitions = [
            'nomComArticle' => [
                'filter' => FILTER_CALLBACK,
                'options' => [$this, 'filter_st']
            ]
        ];
    }
    
    public function filter() {
        $reponse_filtre = filter_input_array(INPUT_POST, $this->definitions);
        foreach(array_keys($reponse_filtre, NULL, true) as $key) { 
            if(empty($this->errors[$key]) and !empty(self::$ERREURS_ELEMVIDE[$key])) {
                $this->errors[$key] = self::$ERREURS_ELEMVIDE[$key];
            }
        }
    }
    
    private function filter_st($input) {
        $reponse_filtre = filter_var($input, FILTER_SANITIZE_STRING);
        return empty($reponse_filtre)?null:$reponse_filtre;
    }
    
    public function hasErrors() {
        return !empty($this->errors);
    }
}
