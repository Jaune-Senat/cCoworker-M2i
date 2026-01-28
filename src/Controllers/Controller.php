<?php

namespace CCoworker\CCoworker\Controllers;

abstract class Controller {

    protected array $_donnees = [];

    // Appelle la vue demandée
    protected function _display($vue) {

        // Pour chaque variable stockée dans le tableau $donnes,
        // déclare une variable avec la valeur correspondante
        foreach ($this->_donnees as $variable => $valeur){
            $$variable = $valeur;
        }

        // Appelle les partials et la vue
        require_once("views/_partials/header.php");
        include("views/" . $vue . ".php");
        require_once("views/_partials/footer.php");
    }
}