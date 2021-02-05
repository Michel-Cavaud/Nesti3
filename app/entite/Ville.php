<?php

/**
 * Description of LogUtilisateurs
 *
 * @author michel
 */
    class Utilisateur{
        
        private $id;
        private $nom;
        
        public function __construct($row) {
            $this->id = $row['id_ville'];
            $this->nom = $row['nom_ville'];
        }
        
        function getId() {
            return $this->id;
        }

        function getNom() {
            return $this->nom;
        }

        function setId($id): void {
            $this->id = $id;
        }

        function setNom($nom): void {
            $this->nom = $nom;
        }


    }

