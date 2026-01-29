<?php

namespace CCoworker\CCoworker\Entities;

use DateTime;

class Reservation extends Entity {

    private int $espace;
    private int $utilisateur;
    private DateTime $debut;
    private DateTime $fin;
    private string $nom_client;
    private string $prenom_client;

    function __construct() 
    {
        $this->_prefix = "reservation";
    }

    // Getters
    public function getEspace() {
        return $this->espace;
    }
    public function getUtilisateur() {
        return $this->utilisateur;
    }
    public function getDebut() {
        return $this->debut;
    }
    public function getFin() {
        return $this->fin;
    }
    public function getNom_client() {
        return $this->nom_client;
    }
    public function getPrenom_client() {
        return $this->prenom_client;
    }

    // Setters
    public function setEspace($espace) {
        $this->espace = $espace;
    }
    public function setUtilisateur($utilisateur) {
        $this->utilisateur = $utilisateur;
    }
    public function setDebut($debut) {
        $this->debut = $debut;
    }
    public function setFin($fin) {
        $this->fin = $fin;
    }
    public function setNom_client($nom_client) {
        $this->nom_client = $nom_client;
    }
    public function setPrenom_client($prenom_client) {
        $this->prenom_client = $prenom_client;
    }
}