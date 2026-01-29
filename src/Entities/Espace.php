<?php

namespace CCoworker\CCoworker\Entities;

class Espace extends Entity {

    private int $id;
    private int $num;
    private int $capacite;
    private int $type;


    function __construct() 
    {
        $this->_prefix = "espace";
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNum() {
        return $this->num;
    }

    public function getCapacite() {
        return $this->capacite;
    }

    public function getType() {
        return $this->type;
    }


    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNum($num) {
        $this->num = $num;
    }

    public function setCapacite($capacite) {
        $this->capacite = $capacite;
    }

    public function setType($type) {
        $this->type = $type;
    }







}