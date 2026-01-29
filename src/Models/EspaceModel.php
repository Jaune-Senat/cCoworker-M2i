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


    public function add($objEspace){
        // Requête
        $requete = "INSERT INTO espace (num_espace, capacite_espace, id_type)
							VALUES (:num_espace, :capacite_espace, :id_type)";

        // Prépare la requête
        $prepare = $this->_db->prepare($requete);

        // Définition des paramètres
        $prepare->bindValue(":num_espace", $objEspace->getNum(), PDO::PARAM_INT);
        $prepare->bindValue(":capacite_espace", $objEspace->getCapacite(), PDO::PARAM_INT);
        $prepare->bindValue(":id_type", $objEspace->getType(), PDO::PARAM_INT);
        
        return $prepare->execute();
    }

    public function edit($objEspace){

        //Requête
        $requete = "UPDATE espace SET num_espace = :num
                                    , capacite_espace = :capacite
                                    , type_espace = :type
                                    WHERE id_espace = :id";

        // Prépare la requête
        $prepare = $this->_db->prepare($requete);

        // Définition des paramètres
        $prepare->bindValue(":num_espace", $objEspace->getNum(), PDO::PARAM_INT);
        $prepare->bindValue(":capacite_espace", $objEspace->getCapacite(), PDO::PARAM_INT);
        $prepare->bindValue(":id_type", $objEspace->getType(), PDO::PARAM_INT);
        
        return $prepare->execute();
        
    }
    
    public function delete(){

    }
}