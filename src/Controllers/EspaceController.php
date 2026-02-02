<?php

namespace CCoworker\CCoworker\Controllers;

use CCoworker\CCoworker\Entities\Espace;
use CCoworker\CCoworker\Models\EspaceModel;
use CCoworker\CCoworker\Models\TypeModel;

class EspaceController extends Controller {

    // Liste des espaces
    public function list() {

        // Si l'utilisateur n'est pas connecté
        if (!isset($_SESSION["utilisateur"])) {

            // Redirige l'utilisateur vers la page de connexion
            header("Location:index.php");
        }
        
        // Si l'utilisateur n'a pas le rôle Super Administrateur
        else if ($_SESSION["utilisateur"]["id_role"] != 2) {

            // Redirige l'utilisateur vers le planning
            header("Location:index.php?controller=reservation&action=planning");
        }

        // Récupère la liste des espaces
        $espaceModel = new EspaceModel;
        $espaces = $espaceModel->findAll();

        // Indique à la vue les variables nécesaires
        $this->_donnees["espaces"] = $espaces;
        $this->_donnees["scripts"] = ["app.js"];

        // Affiche la vue Liste Espaces
        $this->_display(("espace/liste"));
    }

    // Page d'ajout d'un espace
    public function add() {

        // Si l'utilisateur n'est pas connecté
        if (!isset($_SESSION["utilisateur"])) {

            // Redirige l'utilisateur vers la page de connexion
            header("Location:index.php");
        }
        
        // Si l'utilisateur n'a pas le rôle Super Administrateur
        else if ($_SESSION["utilisateur"]["id_role"] != 2) {

            // Redirige l'utilisateur vers le planning
            header("Location:index.php?controller=reservation&action=planning");
        }

        // Récupère la liste des types
        $typeModel = new TypeModel;
        $donneesTypes = $typeModel->findAll();

        // Crée un tableau pour gérer les erreurs
        $erreurs = [];

        // Si le formulaire est soumis
        if (count($_POST) > 0) {

            // Filtrage des données
            $numero = trim(filter_input(INPUT_POST, "numero", FILTER_SANITIZE_SPECIAL_CHARS));
            $capacite = trim(filter_input(INPUT_POST, "capacite", FILTER_SANITIZE_SPECIAL_CHARS));

            // Test des données entrées par l'utilisateur
            if (!$numero) {
                $erreurs["numero"] = "Ce champ est obligatoire";
            }

            if (!$capacite) {
                $erreurs["capacite"] = "Ce champ est obligatoire";
            }

            // S'il n'y a pas d'erreurs
            if (count($erreurs) == 0) {

                // Ajoute l'espace en base de données
                $espaceModel = new EspaceModel;
                $espace = new Espace;
                $espace->setNum($numero);
                $espace->setCapacite($capacite);
                $espace->setType($_POST["type"]);
                $espaceModel->add($espace);

                // Redirige l'utilisateur vers la liste des espaces
                header("Location:index.php?controller=espace&action=list");
            }
        }

        // Indique à la vue les variables nécesaires
        $this->_donnees["erreurs"] = $erreurs;
        $this->_donnees["types"] = $donneesTypes;

        // Affiche la vue Ajout Espaces
        $this->_display(("espace/ajouter"));
    }

    // Page de modification d'un espace
    public function edit() {

        // Si l'utilisateur n'est pas connecté
        if (!isset($_SESSION["utilisateur"])) {

            // Redirige l'utilisateur vers la page de connexion
            header("Location:index.php");
        }
        
        // Si l'utilisateur n'a pas le rôle Super Administrateur
        else if ($_SESSION["utilisateur"]["id_role"] != 2) {

            // Redirige l'utilisateur vers le planning
            header("Location:index.php?controller=reservation&action=planning");
        }

        // Récupère la liste des types
        $typeModel = new TypeModel;
        $donneesTypes = $typeModel->findAll();

        // Récupère les données de l'espace en base de données
        $espaceModel = new EspaceModel;
        $donnesEspace = $espaceModel->findById($_GET["id"]);

        // Crée un tableau pour gérer les erreurs
        $erreurs = [];

        // Si le formulaire est soumis
        if (count($_POST) > 0) {

            // Filtrage des données
            $numero = trim(filter_input(INPUT_POST, "numero", FILTER_SANITIZE_SPECIAL_CHARS));
            $capacite = trim(filter_input(INPUT_POST, "capacite", FILTER_SANITIZE_SPECIAL_CHARS));

            // Test des données entrées par l'utilisateur
            if (!$numero) {
                $erreurs["numero"] = "Ce champ est obligatoire";
            }

            if (!$capacite) {
                $erreurs["capacite"] = "Ce champ est obligatoire";
            }

            // S'il n'y a pas d'erreurs
            if (count($erreurs) == 0) {

                // Récupère l'espace en base de données
                $espace = new Espace;
                $espace->hydrate($donnesEspace);
                
                // Ajoute l'espace en base de données
                $espace->setNum($numero);
                $espace->setCapacite($capacite);
                $espace->setType($_POST["type"]);
                $espaceModel->edit($espace);
                
                // Redirige l'utilisateur vers la liste des espaces
                header("Location:index.php?controller=espace&action=list");
            }
        }

        // Indique à la vue les variables nécesaires
        $this->_donnees["erreurs"] = $erreurs;
        $this->_donnees["types"] = $donneesTypes;
        $this->_donnees["espace"] = $donnesEspace;

        // Affiche la vue Modifier Espaces
        $this->_display(("espace/modifier"));
    }

    // Suppression d'un espace
    public function delete() {

        // Si l'utilisateur n'est pas connecté
        if (!isset($_SESSION["utilisateur"])) {

            // Redirige l'utilisateur vers la page de connexion
            header("Location:index.php");
        }
        
        // Si l'utilisateur n'a pas le rôle Super Administrateur
        else if ($_SESSION["utilisateur"]["id_role"] != 2) {

            // Redirige l'utilisateur vers le planning
            header("Location:index.php?controller=reservation&action=planning");
        }

        // Instancie le modèle Espace et supprime l'espace
        $espaceModel = new EspaceModel;
        $espaceModel->delete($_GET["id"]);
    }
}