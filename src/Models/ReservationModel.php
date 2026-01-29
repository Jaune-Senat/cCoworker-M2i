<?php

namespace CCoworker\CCoworker\Models;

use PDO;

class ReservationModel extends Model {

    public function findAll(){
        // Requête
        $requete = "SELECT * FROM reservation";

        // Prépare la requête
        $prepare = $this->_db->prepare($requete);

        // Execute la requête. Retourne un tableau (si résussite) ou false (si echec)
        $prepare->execute();
        return $prepare->fetchAll();
    }
}