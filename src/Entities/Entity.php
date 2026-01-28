<?php

namespace CCoworker\CCoworker\Entities;

abstract class Entity {

    protected string $_prefix;

    // Hydrate l'entité en appelant les setters correspondant au tableau $data s'ils existent
    public function hydrate($data){
        foreach($data as $key=>$value){
            $setterName = "set".ucfirst(str_replace("_" . $this->_prefix, "", $key));
            if (method_exists($this, $setterName)){
                $this->$setterName($value);
            }
        }
    }
}