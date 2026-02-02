<?php

namespace CCoworker\CCoworker\Controllers;

use DateTime;
use CCoworker\CCoworker\Models\EspaceModel;
use CCoworker\CCoworker\Entities\Reservation;
use CCoworker\CCoworker\Models\ReservationModel;

class ReservationController extends Controller {


    public function planning(){
        
        // Si l'utilisateur n'est pas connecté
        if (!isset($_SESSION["utilisateur"])) {

            // Redirige l'utilisateur vers la page de connexion
            header("Location:index.php");
        }

        // Récupère la liste des réservations
        $reservationModel = new ReservationModel;
        $donneesReservations = $reservationModel->findAll();

        // Indique à la vue les variables nécesaires
        $this->_donnees["reservations"] = $donneesReservations;
        $this->_donnees["scripts"] = ["reservations.js"];

        // Affiche la vue Liste Espaces
        $this->_display("reservation/planning");
    }

    public function add(){

        // Si l'utilisateur n'est pas connecté
        if (!isset($_SESSION["utilisateur"])) {

            // Redirige l'utilisateur vers la page de connexion
            header("Location:index.php");
        }

        // Récupère la liste des espaces
        $espaceModel = new EspaceModel;
        $donneesEspaces = $espaceModel->findAll();

        // Crée un tableau pour gérer les erreurs
        $erreurs = [];

        // Si le formulaire est soumis
        if (count($_POST) > 0) {

            // Filtrage des données
            $nom = trim(filter_input(INPUT_POST, "nom", FILTER_SANITIZE_SPECIAL_CHARS));
            $prenom = trim(filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_SPECIAL_CHARS));
            $dateDebut = trim(filter_input(INPUT_POST, "debut", FILTER_SANITIZE_SPECIAL_CHARS));
            $heureDebut = trim(filter_input(INPUT_POST, "debut-heure", FILTER_SANITIZE_SPECIAL_CHARS));
            $dateFin = trim(filter_input(INPUT_POST, "fin", FILTER_SANITIZE_SPECIAL_CHARS));
            $heureFin = trim(filter_input(INPUT_POST, "fin-heure", FILTER_SANITIZE_SPECIAL_CHARS));

            if (!$nom) {
                $erreurs["nom"] = "Le nom est obligatoire";
            } 
            if (!$prenom) {
                $erreurs["prenom"] = "Le prenom est obligatoire";
            }
            if (!$dateDebut) {
                $erreurs["dateDebut"] = "La date de début est obligatoire";
            }
            if (!$heureDebut) {
                $erreurs["heureDebut"] = "L'heure de début est obligatoire";
            }
            if (!$dateFin) {
                $erreurs["dateFin"] = "La date de fin est obligatoire";
            } 
            else if ($dateDebut > $dateFin) {
                $erreurs["dateDebutInvalide"] = "La date de début doit précéder celle de fin est obligatoire";
            }
            if (!$heureFin) {
                $erreurs["heureFin"] = "L'heure de fin est obligatoire";
            }

            // Si pas d'erreur => insertion en bdd
            if (count($erreurs) == 0) {
                
                $reservationModel = new ReservationModel;
                $objReservation = new Reservation;

                $objReservation->setUtilisateur($_SESSION["utilisateur"]["id_utilisateur"]);

                $objReservation->setNom_client($nom);
                $objReservation->setPrenom_client($prenom);
                $objReservation->setDebut($dateDebut . ' ' . $heureDebut . ':00');
                $objReservation->setFin($dateFin . ' ' . $heureFin . ':00');
                $objReservation->setEspace($_POST["espace"]);

                $boolInsert = $reservationModel->add($objReservation);

                if (!$boolInsert) {
                    $erreur["insertion"] = "Une erreur s'est produite lors de l'insertion en base de donnée";
                } 
                else {
                    // Redirige l'utilisateur vers le planning
                    header("Location:index.php?controller=reservation&action=planning");
                }
            }
        }

        // Indique à la vue les variables nécesaires
        $this->_donnees["erreurs"] = $erreurs;
        $this->_donnees["espaces"] = $donneesEspaces;

        // Affiche la vue Ajout réservation
        $this->_display("reservation/ajouter");
    }

    // Page de modification d'une réservation
    public function edit() {

        // Si l'utilisateur n'est pas connecté
        if (!isset($_SESSION["utilisateur"])) {

            // Redirige l'utilisateur vers la page de connexion
            header("Location:index.php");
        }

        // Récupère la liste des espaces
        $espaceModel = new EspaceModel;
        $donneesEspaces = $espaceModel->findAll();

        // Crée un tableau pour gérer les erreurs
        $erreurs = [];

        // Récupère la réservation en base de données
        $reservationModel = new ReservationModel;
        $donnesReservation = $reservationModel->findById($_GET["id"]);

        // Si le formulaire est soumis
        if (count($_POST) > 0) {

            // Filtrage des données
            $nom = trim(filter_input(INPUT_POST, "nom", FILTER_SANITIZE_SPECIAL_CHARS));
            $prenom = trim(filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_SPECIAL_CHARS));
            $dateDebut = trim(filter_input(INPUT_POST, "debut", FILTER_SANITIZE_SPECIAL_CHARS));
            $heureDebut = trim(filter_input(INPUT_POST, "debut-heure", FILTER_SANITIZE_SPECIAL_CHARS));
            $dateFin = trim(filter_input(INPUT_POST, "fin", FILTER_SANITIZE_SPECIAL_CHARS));
            $heureFin = trim(filter_input(INPUT_POST, "fin-heure", FILTER_SANITIZE_SPECIAL_CHARS));

            if (!$nom) {
                $erreurs["nom"] = "Le nom est obligatoire";
            } 
            if (!$prenom) {
                $erreurs["prenom"] = "Le prenom est obligatoire";
            }
            if (!$dateDebut) {
                $erreurs["dateDebut"] = "La date de début est obligatoire";
            }
            if (!$heureDebut) {
                $erreurs["heureDebut"] = "L'heure de début est obligatoire";
            }
            if (!$dateFin) {
                $erreurs["dateFin"] = "La date de fin est obligatoire";
            } 
            else if ($dateDebut > $dateFin) {
                $erreurs["dateDebutInvalide"] = "La date de début doit précéder celle de fin est obligatoire";
            }
            if (!$heureFin) {
                $erreurs["heureFin"] = "L'heure de fin est obligatoire";
            }

            // Si pas d'erreur
            if (count($erreurs) == 0) {

                // Crée un objet Réservation et l'hydrate
                $objReservation = new Reservation;
                $objReservation->hydrate($donnesReservation);

                // Modifie la réservation
                $objReservation->setNom_client($nom);
                $objReservation->setPrenom_client($prenom);
                $objReservation->setDebut($dateDebut . ' ' . $heureDebut . ':00');
                $objReservation->setFin($dateFin . ' ' . $heureFin . ':00');
                $objReservation->setEspace($_POST["espace"]);

                // Met à jour la réservation en base de données
                $boolInsert = $reservationModel->edit($objReservation);

                if (!$boolInsert) {
                    $erreur["insertion"] = "Une erreur s'est produite lors de l'insertion en base de donnée";
                } 
                else {
                    // Redirige l'utilisateur vers le planning
                    header("Location:index.php?controller=reservation&action=planning");
                }
            }
        }

        // Indique à la vue les variables nécesaires
        $this->_donnees["erreurs"] = $erreurs;
        $this->_donnees["espaces"] = $donneesEspaces;
        $this->_donnees["reservation"] = $donnesReservation;

        // Affiche la vue Ajout réservation
        $this->_display("reservation/modifier");
    }

    // Suppression d'une réservation
    public function delete() {

        // Si l'utilisateur n'est pas connecté
        if (!isset($_SESSION["utilisateur"])) {

            // Redirige l'utilisateur vers la page de connexion
            header("Location:index.php");
        }

        // Instancie le modèle Espace et supprime l'espace
        $reservationModel = new ReservationModel;
        $reservationModel->delete($_GET["id"]);
    }
}