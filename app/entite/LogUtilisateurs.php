<?php

/**
 * Description of LogUtilisateurs
 *
 * @author michel
 */
    class LogUtilisateurs {
        
        private $id;
        private $date;
        private $idUtilisateur;
        
        public function __construct($row) {
            
            $this->id = $row['id_logs_utilisateurs'];
            $this->date = $row['date_logs_utilisateurs'];
            $this->idUtilisateur = $row['id_utilisateurs'];
            
        }
        
        function getIdUtilisateur() {
            return $this->idUtilisateur;
        }

        function setIdUtilisateur($idUtilisateur): void {
            $this->idUtilisateur = $idUtilisateur;
        }

                function getId() {
            return $this->id;
        }

        function getDate() {
            return $this->date;
        }

        function setId($id): void {
            $this->id = $id;
        }

        function setDate($date): void {
            $this->date = $date;
        }


    }
