<?php

namespace CCoworker\CCoworker\Controllers;

use CCoworker\CCoworker\Models\UtilisateurModel;
use CCoworker\CCoworker\Entities\Utilisateur;
use CCoworker\CCoworker\Models\RoleModel;

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
                
                // Si l'utilisateur existe
                if ($donneesUtilisateur) {

                    // Récupère le hash du mot de passe de l'utilisateur
                    $mdpHash = $donneesUtilisateur["mdp_utilisateur"];

                    // Vérifie que le mot de passe entré via le formulaire correspond à l'utilisateur demandé
                    if (password_verify($_POST["mdp"], $mdpHash)) {

                        // Enregistre les données de l'utilisateur en session
                        $_SESSION["utilisateur"] = $donneesUtilisateur;

                        // Redirige l'utilisateur vers la liste des espaces
                        header("Location:index.php?controller=espace&action=list");
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

    public function logout() {

        // Supprime l'utilisateur de la session
        unset($_SESSION["utilisateur"]);

        // Redirige l'utilisateur vers la page d'accueil
         header("Location:index.php");
    }

    public function create_account(){

        if(!isset($_SESSION['utilisateur'])){ // utilisateur non connecté
            header("Location:error_403.php");
            exit;
        }

        $RoleModel = new RoleModel;

        $donneeRoles = $RoleModel->findAll();

        // Crée un tableau pour gérer les erreurs
        $erreurs = [];

        // Si le formulaire est soumis
        if (count($_POST) > 0) {

            // Filtrage des données
            $nom = trim(filter_input(INPUT_POST, "nom", FILTER_SANITIZE_SPECIAL_CHARS));
            $prenom = trim(filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_SPECIAL_CHARS));
            $email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));

            if (!$nom) {
                $erreurs["nom"] = "Le nom est obligatoire";
            } 
            if (!$prenom) {
                $erreurs["prenom"] = "Le prenom est obligatoire";
            }

            // Test si l'email est dans un format valide
            $emailValide = filter_var($email, FILTER_VALIDATE_EMAIL);

            // Test des données entrées par l'utilisateur
            if (!$email) {
                $erreurs["email"] = "Ce champ est obligatoire";
            } else if (!$emailValide) {
                $erreurs["email"] = "Adresse mail invalide";
            }

            if (empty($_POST["password"])) {
                $erreurs["password"] = "Le mot de passe est obligatoire";
            } else if ($_POST["password"] != $_POST["password_repeat"]){
                $erreurs["password"] = "Le mot de passe doit être identique à sa confirmation";
            }

            // Si pas d'erreur => insertion en bdd
            if (count($erreurs) == 0) {
                $utilisateurModel = new UtilisateurModel;
                $objUtilisateur = new utilisateur;
                $objUtilisateur->setNom($nom);
                $objUtilisateur->setPrenom($prenom);
                $objUtilisateur->setEmail($email);
                $objUtilisateur->setMdp($_POST["password"]);
                $objUtilisateur->setRole($_POST["role"]);

                $boolInsert = $utilisateurModel->addUser($objUtilisateur);

                if ($boolInsert) {

                    // Redirige l'utilisateur vers la liste des utilisateurs
                    header("Location:index.php?controller=utilisateur&action=list");
                }
                else {
                    $erreur["insertion"] = "Une erreur s'est produite lors de l'insertion en base de donnée";
                } 
            }
        }
        // Indique à la vue les variables nécesaires
        $this->_donnees["erreurs"] = $erreurs;
        $this->_donnees["roles"] = $donneeRoles;

        // Affiche la vue inscription
        $this->_display("utilisateur/inscription");
    }

    // Liste des utilisateurs
    public function list() {

        // Si l'utilisateur n'est pas connecté
        if (!isset($_SESSION["utilisateur"])) {

            // Redirige l'utilisateur vers la page de connexion
            header("Location:index.php");
        }

        // Récupère la liste des utilisateurs
        $utilisateurModel = new UtilisateurModel;
        $utilisateurs = $utilisateurModel->findAll();

        // Indique à la vue les variables nécesaires
        $this->_donnees["utilisateurs"] = $utilisateurs;
        $this->_donnees["scripts"] = ["utilisateurs.js"];

        // Affiche la vue Liste Espaces
        $this->_display(("utilisateur/liste"));
    }

    // Modifier un utilisateur
    public function edit() {

        if(!isset($_SESSION['utilisateur'])){ // utilisateur non connecté
            header("Location:error_403.php");
            exit;
        }

        // Récupère les rôles
        $RoleModel = new RoleModel;
        $donneeRoles = $RoleModel->findAll();

        // Récupère les données de l'utilisateur
        $utilisateurModel = new UtilisateurModel;
        $donneesUtilisateur = $utilisateurModel->findById($_GET["id"]);

        // Crée un tableau pour gérer les erreurs
        $erreurs = [];

        // Si le formulaire est soumis
        if (count($_POST) > 0) {

            // Filtrage des données
            $nom = trim(filter_input(INPUT_POST, "nom", FILTER_SANITIZE_SPECIAL_CHARS));
            $prenom = trim(filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_SPECIAL_CHARS));
            $email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));

            if (!$nom) {
                $erreurs["nom"] = "Le nom est obligatoire";
            } 
            if (!$prenom) {
                $erreurs["prenom"] = "Le prenom est obligatoire";
            }

            // Test si l'email est dans un format valide
            $emailValide = filter_var($email, FILTER_VALIDATE_EMAIL);

            // Test des données entrées par l'utilisateur
            if (!$email) {
                $erreurs["email"] = "Ce champ est obligatoire";
            } else if (!$emailValide) {
                $erreurs["email"] = "Adresse mail invalide";
            }

            if (!empty($_POST["password"])) {
                if ($_POST["password"] != $_POST["password_repeat"]){
                    $erreurs["password"] = "Le mot de passe doit être identique à sa confirmation";
                }
            }

            // Si pas d'erreur => insertion en bdd
            if (count($erreurs) == 0) {

                // Crée un objet utilisateur
                $objUtilisateur = new Utilisateur;
                $objUtilisateur->hydrate($donneesUtilisateur);
                
                // Modifie l'utilisateur
                $objUtilisateur->setNom($nom);
                $objUtilisateur->setPrenom($prenom);
                $objUtilisateur->setEmail($email);
                if (!empty($_POST["password"])) {
                    $objUtilisateur->setMdp($_POST["password"]);
                }
                $objUtilisateur->setRole($_POST["role"]);

                $boolInsert = $utilisateurModel->edit($objUtilisateur);

                if ($boolInsert) {
                    // Redirige l'utilisateur vers la liste des utilisateurs
                    header("Location:index.php?controller=utilisateur&action=list");
                }
                else {
                    $erreur["insertion"] = "Une erreur s'est produite lors de l'insertion en base de donnée";
                }
            }
        }
        // Indique à la vue les variables nécesaires
        $this->_donnees["erreurs"] = $erreurs;
        $this->_donnees["roles"] = $donneeRoles;
        $this->_donnees["utilisateur"] = $donneesUtilisateur;

        // Affiche la vue inscription
        $this->_display("utilisateur/modifier");
    }

    // Suppression d'un utilisateur
    public function delete() {

        // Si l'utilisateur n'est pas connecté
        if (!isset($_SESSION["utilisateur"])) {

            // Redirige l'utilisateur vers la page de connexion
            header("Location:index.php");
        }

        // Instancie le modèle Espace et supprime l'espace
        $utilisateurModel = new UtilisateurModel;
        $utilisateurModel->delete($_GET["id"]);
    }
}