<?php

namespace CCoworker\CCoworker\Controllers;

use CCoworker\CCoworker\Models\UtilisateurModel;

class UtilisateurController extends Controller {

    // Page de connexion
    public function login() {

        // Si l'utilisateur est déja connecté
        if (isset($_SESSION["utilisateur"])) {

            // Redirige l'utilisateur vers la liste des espaces
            header("Location:index.php?controller=espace&action=list");
        }

        // Crée un tableau pour gérer les erreurs
        $erreurs = [];

        // Si le formulaire est soumis
        if (count($_POST) > 0) {

            // Filtrage des données
            $email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));

            // Test si l'email est dans un format valide
            $emailValide = filter_var($email, FILTER_VALIDATE_EMAIL);

            // Test des données entrées par l'utilisateur
            if (!$email) {
                $erreurs["email"] = "Ce champ est obligatoire";
            }
            else if (!$emailValide) {
                $erreurs["email"] = "Adresse mail invalide";
            }

            if (empty($_POST["mdp"])) {
                $erreurs["mdp"] = "Ce champ est obligatoire";
            }

            // Si aucune erreur -> Connecte l'utilisateur
            if (count($erreurs) == 0) {

                // Crée une instance du modèle Utilisateur et appelle la méthode
                $utilisateurModel = new UtilisateurModel;

                // Récupère les informations de l'utilisateur et le hash de son mot de passe via son email
                $donneesUtilisateur = $utilisateurModel->findByMail($email);
                // TODO Hash MDP : $mdpHash = $donneesUtilisateur["mdp_utilisateur"];

                // Si l'utilisateur existe
                if ($donneesUtilisateur) {
                    // Vérifie que le mot de passe entré via le formulaire correspond à l'utilisateur demandé
                    if ($_POST["mdp"] = $donneesUtilisateur["mdp_utilisateur"]) {
                    // TODO Hash MDP : if (password_verify($_POST["mdp"], $mdpHash["mdp_utilisateur"])) {

                        // Enregistre les données de l'utilisateur en session
                        $_SESSION["utilisateur"] = $donneesUtilisateur;

                        // Redirige l'utilisateur vers la page d'accueil
                        header("Location:index.php");
                    }
                }

                // Si l'utilisateur n'est pas trouvé ou que le mot de passe n'est pas bon
                // Affiche une erreur
                $erreurs["identifiants"] = "Identifiants invalides. Veuillez réessayer";
            }
        }

        // Indique à la vue les variables nécesaires
        $this->_donnees["erreurs"] = $erreurs;
        
        // Affiche la vue Connexion
        $this->_display("utilisateur/Connexion");
    }
}