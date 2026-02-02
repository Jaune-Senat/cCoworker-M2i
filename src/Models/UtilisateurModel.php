<?php

namespace CCoworker\CCoworker\Models;

use PDO;

class UtilisateurModel extends Model {
    
    public function findAll(){
        
        // Requête
        $requete = "SELECT *,role.nom_role FROM utilisateur
                    INNER JOIN role ON role.id_role = utilisateur.id_role";

        // Prépare la requête
        $prepare = $this->_db->prepare($requete);

        // Execute la requête. Retourne un tableau (si résussite) ou false (si echec)
        $prepare->execute();
        return $prepare->fetchAll();
    }

    public function findById($id){

        // Requête
        $requete = "SELECT * FROM utilisateur WHERE id_utilisateur = :id";

        // Prépare la requête
        $prepare = $this->_db->prepare($requete);

        // Définition des paramètres
        $prepare->bindValue(":id", $id, PDO::PARAM_INT);

        // Execute la requête
        $prepare->execute();
        return $prepare->fetch();
    }

    // Trouve un utilisateur via son email
    public function findByMail($email) {

        // Requête
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
        $prepare->bindValue(":mdp_utilisateur", $objUtilisateur->getHashedMdp(), PDO::PARAM_STR);
        $prepare->bindValue(":id_role", $objUtilisateur->getRole(), PDO::PARAM_INT);
        
        return $prepare->execute();
    }

    public function edit($objUtilisateur){

        //Requête
        $requete = "UPDATE utilisateur SET nom_utilisateur = :nom
                                        , prenom_utilisateur = :prenom
                                        , email_utilisateur = :email
                                        , mdp_utilisateur = :mdp
                                        WHERE id_utilisateur = :id";

        // Prépare la requête
        $prepare = $this->_db->prepare($requete);

        // Définition des paramètres
        $prepare->bindValue(":nom", $objUtilisateur->getNom(), PDO::PARAM_STR);
        $prepare->bindValue(":prenom", $objUtilisateur->getPrenom(), PDO::PARAM_STR);
        $prepare->bindValue(":email", $objUtilisateur->getEmail(), PDO::PARAM_STR);
        $prepare->bindValue(":mdp", $objUtilisateur->getMdp(), PDO::PARAM_INT);
        $prepare->bindValue(":id", $objUtilisateur->getId(), PDO::PARAM_INT);
        
        return $prepare->execute();
    }

    public function delete($email){

        //Requête
        $requete = "DELETE FROM utilisateur WHERE email_utilisateur = :email";

        // Prépare la requête
        $prepare = $this->_db->prepare($requete);

        // Définition des paramètres
        $prepare->bindValue(":email", $email, PDO::PARAM_STR);

        return $prepare->execute();
    }
}