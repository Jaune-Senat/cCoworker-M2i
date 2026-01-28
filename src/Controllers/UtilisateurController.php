<?php

namespace CCoworker\CCoworker\Controllers;

class UtilisateurController extends Controller {

    // Page de connexion
    public function login() {
        
        // Affiche la vue Connexion
        $this->_display("Connexion");
    }
}