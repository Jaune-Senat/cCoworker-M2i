<?php

namespace CCoworker\CCoworker\Models;

use PDO;

class EspaceModel extends Model {

    public function findAll(){

        // Requête
        $requete = "SELECT * FROM espace";

        // Prépare la requête
        $prepare = $this->_db->prepare($requete);

        // Execute la requête. Retourne un tableau (si résussite) ou false (si echec)
        $prepare->execute();
        return $prepare->fetchAll();
    }


    public function add(){

    }

    public function edit(){

    }

    public function delete(){
        
    }
}