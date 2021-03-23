<?php

/**
 * Description of LogUtilisateurs
 *
 * @author michel
 */
    class Utilisateurs{
        private $id;
        private $pseudo;
        private $email;
        private $nom;
        private $prenom;
        private $mdp;
        private $etat;
        private $dateCreation;
        private $adresse1;
        private $adresse2;
        private $ville;
        private $role;
                
        function getAdresse1() {
            return $this->adresse1;
        }

        function getAdresse2() {
            return $this->adresse2;
        }

        function getVille() {
            return $this->ville;
        }

        function getRole() {
            return implode(",", $this->role);
           
        }
         function getRoleArray() {
            return $this->role;
           
        }

        function setAdresse1($adresse1): void {
            $this->adresse1 = $adresse1;
        }

        function setAdresse2($adresse2): void {
            $this->adresse2 = $adresse2;
        }

        function setVille($ville): void {
            $this->ville = $ville;
        }

        function setRole($role): void {
            $this->role = $role;
        }

        function getId() {
            return $this->id;
        }

        function getPseudo() {
            return $this->pseudo;
        }

        function getEmail() {
            return $this->email;
        }

        function getNom() {
            return $this->nom;
        }

        function getPrenom() {
            return $this->prenom;
        }
        
        function getMdpBrut() {
            return $this->mdp;
        }

        function getMdp() {
            if($this->mdp != ''){
                return Fonctions::cript($this->mdp);
            }else{
                return '';
            }
            
        }

        function getEtat() {
            return $this->etat;
        }

        function getDateCreation() {
            return $this->dateCreation;
        }

        function setId($id): void {
            $this->id = $id;
        }

        function setPseudo($pseudo): void {
            $this->pseudo = $pseudo;
        }

        function setEmail($email): void {
            $this->email = $email;
        }

        function setNom($nom): void {
            $this->nom = $nom;
        }

        function setPrenom($prenom): void {
            $this->prenom = $prenom;
        }

        function setMdp($mdp): void {
            $this->mdp = $mdp;
        }

        function setEtat($etat): void {
            $this->etat = $etat;
        }

        function setDateCreation($dateCreation): void {
            $this->dateCreation = $dateCreation;
        }
    }
