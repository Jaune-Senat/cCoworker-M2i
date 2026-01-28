<?php

namespace CCoworker\CCoworker\Models;

use PDO;

class UtilisateurModel extends Model {
    
    // Trouve un utilisateur via son email
    public function findByMail($email) {

        // Reqête
        $requete = "SELECT * FROM utilisateur WHERE email_utilisateur = :email_utilisateur";

        // Prépare la requête
        $prepare = $this->_db->prepare($requete);

        // Définition des paramètres
        $prepare->bindValue(":email_utilisateur", $email, PDO::PARAM_STR);

        // Execute la requête. Retourne un tableau (si résussite) ou false (si echec)
        $prepare->execute();
        return $prepare->fetch();
    }

    public function addUser($objUtilisateur) {

        // Requête
        $requete = "INSERT INTO utilisateur (nom_utilisateur, prenom_utilisateur, email_utilisateur, mdp_utilisateur, id_role)
							VALUES (:nom_utilisateur, :prenom_utilisateur, :email_utilisateur, :mdp_utilisateur, :id_role)";

        // Prépare la requête
        $prepare = $this->_db->prepare($requete);

        // Définition des paramètres
        $prepare->bindValue(":nom_utilisateur", $objUtilisateur->getNom(), PDO::PARAM_STR);
        $prepare->bindValue(":prenom_utilisateur", $objUtilisateur->getPrenom(), PDO::PARAM_STR);
        $prepare->bindValue(":email_utilisateur", $objUtilisateur->getEmail(), PDO::PARAM_STR);
        $prepare->bindValue(":mdp_utilisateur", $objUtilisateur->getMdp(), PDO::PARAM_STR);
        $prepare->bindValue(":id_role", $objUtilisateur->getRole(), PDO::PARAM_INT);
        
        return $prepare->execute();

    }
}