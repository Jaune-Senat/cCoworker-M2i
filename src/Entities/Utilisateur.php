<?php

namespace CCoworker\CCoworker\Entities;

class Utilisateur extends Entity {

    private string $id;
    private string $nom;
    private string $prenom;
    private string $email;
    private string $mdp;
    private string $mdpHash;
    private int $role;

    function __construct() 
    {
        $this->_prefix = "utilisateur";
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getMdp() {
        return $this->mdp;
    }

    public function getHashedMdp(){

        if($this->mdp){

            $this->mdpHash = password_hash($this->mdp, PASSWORD_DEFAULT);
        }

        return $this->mdpHash;
    }

    public function getRole() {
        return $this->role;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    public function setHashedMdp($mdp){
        $this->mdpHash = $mdp;
    }

    public function setRole($role) {
        $this->role = $role;
    }
}