<?php

/**
 * FilterClass_FormulaireInscription
 * Traitement du formulaire d'inscription d'un site web
 *
 * @author Darth Killer
 * revue Michel Cavaud pour l'exercice
 */
class controlerFormUtilisateur {

    // Message d'erreur pré-rédigés
    private static $ERREURS_ELEMVIDE = [
        'nomUtilisateur' => "Vous devez renseigner un nom.",
        'prenomUtilisateur' => "Vous devez renseigner un prénom.",
        'mdpUtilisateur' => "Vous devez renseigner un mot de passe.",
        'emailUtilisateur' => "Vous devez renseigner un email.",
    ];
    private static $ERREURS_ELEMINVALID = [
        'mdpUtilisateur' => "Force du mot de passe trop faible.",
        'emailUtilisateur' => "Format de l'émail non valide.",
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
            'nomUtilisateur' => [
                'filter' => FILTER_CALLBACK,
                'options' => [$this, 'filter_st']
            ],
            'prenomUtilisateur' => [
                'filter' => FILTER_CALLBACK,
                'options' => [$this, 'filter_st']
            ],
            'mdpUtilisateur' => [
                'filter' => FILTER_CALLBACK,
                'options' => [$this, 'filter_mdp']
            ],
            'emailUtilisateur' => [
                'filter' => FILTER_CALLBACK,
                'options' => [$this, 'filter_email']
            ]
        ];
    }

    public function filter() {
        $reponse_filtre = filter_input_array(INPUT_POST, $this->definitions);
        foreach (array_keys($reponse_filtre, NULL, true) as $key) { // On parcours les index dont la valeur est NULL
            if (empty($this->errors[$key]) and!empty(self::$ERREURS_ELEMVIDE[$key])) {
                // Donc l'erreur n'a pas déjà été gérée, c'est un élément absent du formulaire de départ
                // Et pourtant considéré obligatoire.
                $this->errors[$key] = self::$ERREURS_ELEMVIDE[$key];
            }
        }
    }

    private function filter_st($input) {
        $reponse_filtre = filter_var($input, FILTER_SANITIZE_STRING);
        return empty($reponse_filtre) ? null : $reponse_filtre;
    }

    private function filter_email($input) {
        $reponse_filtre = filter_var($input, FILTER_SANITIZE_EMAIL);
        return (empty($reponse_filtre)) ? null : $reponse_filtre;
    }

    private function filter_mdp($input) {
        $reponse_filtre = $this->valid_password($input);
        if($reponse_filtre ==''){
           $this->errors['mdpUtilisateur'] = self::$ERREURS_ELEMINVALID['mdpUtilisateur']; 
        }else{
          return (empty($reponse_filtre)) ? null : $reponse_filtre;  
        }
        

        
    }

    public function hasErrors() {
        return !empty($this->errors);
    }

    private function valid_password($password = '') {
        $password = trim($password);
        $regex_lowercase = '/[a-z]/';
        $regex_uppercase = '/[A-Z]/';
        $regex_number = '/[0-9]/';
        $regex_special = '/[$@$!%*#?&./]/';
        if (empty($password)) {
            return '';
        }
        if (preg_match_all($regex_lowercase, $password) < 1) {
            return '';
        }
        if (preg_match_all($regex_uppercase, $password) < 1) {
            return '';
        }
        if (preg_match_all($regex_number, $password) < 1) {
            return '';
        }
        if (preg_match_all($regex_special, $password) < 1) {
            return '';
        }
        if (strlen($password) < 8) {
            return '';
        }
        return TRUE;
    }

}
