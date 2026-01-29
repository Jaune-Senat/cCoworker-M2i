<?php

namespace CCoworker\CCoworker\Models;

use PDO;

class EspaceModel extends Model {

    public function findAll(){

        // Requête
        $requete = "SELECT *,type.nom_type FROM espace
                    INNER JOIN type ON type.id_type = espace.id_type";

        // Prépare la requête
        $prepare = $this->_db->prepare($requete);

        // Execute la requête. Retourne un tableau (si résussite) ou false (si echec)
        $prepare->execute();
        return $prepare->fetchAll();
    }

    public function findById($id){

        // Requête
        $requete = "SELECT * FROM espace WHERE id_espace = :id";

        // Prépare la requête
        $prepare = $this->_db->prepare($requete);

        // Définition des paramètres
        $prepare->bindValue(":id", $id, PDO::PARAM_INT);

        // Execute la requête
        $prepare->execute();
        return $prepare->fetch();
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
                                    , id_type = :type
                                    WHERE id_espace = :id";

        // Prépare la requête
        $prepare = $this->_db->prepare($requete);

        // Définition des paramètres
        $prepare->bindValue(":num", $objEspace->getNum(), PDO::PARAM_INT);
        $prepare->bindValue(":capacite", $objEspace->getCapacite(), PDO::PARAM_INT);
        $prepare->bindValue(":type", $objEspace->getType(), PDO::PARAM_INT);
        $prepare->bindValue(":id", $objEspace->getId(), PDO::PARAM_INT);
        
        return $prepare->execute();
        
    }

    public function delete($id){

        //Requête
        $requete = "DELETE FROM espace WHERE id_espace = :id";

        // Prépare la requête
        $prepare = $this->_db->prepare($requete);

        $prepare->bindValue(":id", $id, PDO::PARAM_INT);

        return $prepare->execute();
    }
}