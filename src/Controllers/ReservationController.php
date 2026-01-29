<?php

namespace CCoworker\CCoworker\Controllers;

use CCoworker\CCoworker\Entities\Reservation;

class ReservationController extends Controller {


    public function planning(){
        
        // Si l'utilisateur n'est pas connecté
        if (!isset($_SESSION["utilisateur"])) {

            // Redirige l'utilisateur vers la page de connexion
            header("Location:index.php");
        }

        // Affiche la vue Liste Espaces
        $this->_display("reservation/planning");
    }

    public function add(){

    }
}