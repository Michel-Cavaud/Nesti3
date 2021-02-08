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
        private $idVille;
        

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

        function getMdp() {
            return $this->mdp;
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
