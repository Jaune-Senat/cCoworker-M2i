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
}