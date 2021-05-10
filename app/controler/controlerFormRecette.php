<?php

/**
 * FilterClass_FormulaireInscription
 * Traitement du formulaire d'inscription d'un site web
 *
 * @author Darth Killer
 * revue Michel Cavaud pour l'exercice
 */

class controlerFormRecette {

    // Message d'erreur pré-rédigés
    private static $ERREURS_ELEMVIDE = [
        'nomRecette' => "Vous devez renseigner un nom.",
        'difficulte' => "Vous devez renseigner une difficulté.",
        'nbPersonne' => "Vous devez renseigner un nombre de personne.",
        'temps' => "Vous devez renseigner un temps."

    ];
    private static $ERREURS_ELEMINVALID = [
        'nbPersonne' => "Vous devez renseigner un nombre.",
        'temps' => "VVous devez renseigner un nombre en minute."
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
            'nomRecette' => [
                'filter' => FILTER_CALLBACK,
                'options' => [$this, 'filter_st']
            ],
            'difficulte' => [
                'filter' => FILTER_CALLBACK,
                'options' => [$this, 'filter_int']
            ],
            'nbPersonne' => [
                'filter' => FILTER_CALLBACK,
                'options' => [$this, 'filter_int']
            ],
            'temps' => [
                'filter' => FILTER_CALLBACK,
                'options' => [$this, 'filter_int']
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

    private function filter_int($input) {
        $reponse_filtre = filter_var($input, FILTER_SANITIZE_NUMBER_INT, array("options"=>array("min_range"=>1)));
        return (empty($reponse_filtre))?null:$reponse_filtre;
       
        
    }

    public function hasErrors() {
        return !empty($this->errors);
    }

}


