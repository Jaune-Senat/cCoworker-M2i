<?php

namespace CCoworker\CCoworker\Models;

use PDO;

class ReservationModel extends Model {

    public function findAll(){
        
        // Requête
        $requete = "SELECT *,espace.num_espace FROM reservation
                    INNER JOIN espace ON espace.id_espace = reservation.id_espace";

        // Prépare la requête
        $prepare = $this->_db->prepare($requete);

        // Execute la requête. Retourne un tableau (si résussite) ou false (si echec)
        $prepare->execute();
        return $prepare->fetchAll();
    }

    public function findById($id){

        // Requête
        $requete = "SELECT * FROM reservation WHERE id_reservation = :id";

        // Prépare la requête
        $prepare = $this->_db->prepare($requete);

        // Définition des paramètres
        $prepare->bindValue(":id", $id, PDO::PARAM_INT);

        // Execute la requête
        $prepare->execute();
        return $prepare->fetch();
    }

    public function add($objReservation){
        
        // Requête
        $requete = "INSERT INTO reservation (id_espace, id_utilisateur, debut_reservation, fin_reservation, nom_client, prenom_client)
							VALUES (:id_espace, :id_utilisateur, :debut_reservation, :fin_reservation, :nom_client, :prenom_client)";

        // Prépare la requête
        $prepare = $this->_db->prepare($requete);

        // Définition des paramètres
        $prepare->bindValue(":id_espace", $objReservation->getEspace(), PDO::PARAM_INT);
        $prepare->bindValue(":id_utilisateur", $objReservation->getUtilisateur(), PDO::PARAM_INT);
        $prepare->bindValue(":debut_reservation", $objReservation->getDebut(), PDO::PARAM_STR);
        $prepare->bindValue(":fin_reservation", $objReservation->getFin(), PDO::PARAM_STR);
        $prepare->bindValue(":nom_client", $objReservation->getNom_client(), PDO::PARAM_STR);
        $prepare->bindValue(":prenom_client", $objReservation->getPrenom_client(), PDO::PARAM_STR);
        
        // Execute la requête. Retourne un tableau (si résussite) ou false (si echec)
        return $prepare->execute();
    }

    public function edit($objReservation){
        
        // Requête
        $requete = "UPDATE reservation SET id_espace = :espace
                                         , debut_reservation = :debut
                                         , fin_reservation = :fin
                                         , nom_client = :nom_client
                                         , prenom_client = :prenom_client
                                         WHERE id_reservation = :reservation";

        // Prépare la requête
        $prepare = $this->_db->prepare($requete);

        // Définition des paramètres
        $prepare->bindValue(":espace", $objReservation->getEspace(), PDO::PARAM_INT);
        $prepare->bindValue(":debut", $objReservation->getDebut(), PDO::PARAM_STR);
        $prepare->bindValue(":fin", $objReservation->getFin(), PDO::PARAM_STR);
        $prepare->bindValue(":nom_client", $objReservation->getNom_client(), PDO::PARAM_STR);
        $prepare->bindValue(":prenom_client", $objReservation->getPrenom_client(), PDO::PARAM_STR);
        
        // Execute la requête. Retourne un tableau (si résussite) ou false (si echec)
        return $prepare->execute();
    }

    public function delete($reservation){
        
        //Requête
        $requete = "DELETE FROM reservation WHERE id_reservation = :reservation";

        // Prépare la requête
        $prepare = $this->_db->prepare($requete);

        $prepare->bindValue(":reservation", $reservation, PDO::PARAM_INT);

        return $prepare->execute();
    }
}