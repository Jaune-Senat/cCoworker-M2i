<?php

namespace CCoworker\CCoworker\Controllers;

class EspaceController extends Controller {

    // Liste des espaces
    public function list() {

        // Si l'utilisateur n'est pas connecté
        if (!isset($_SESSION["utilisateur"])) {

            // Redirige l'utilisateur vers la liste des espaces
            header("Location:index.php");
        }

        // Affiche la vue Liste Espaces
        $this->_display(("espace/liste"));
    }
}