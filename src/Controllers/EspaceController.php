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
}