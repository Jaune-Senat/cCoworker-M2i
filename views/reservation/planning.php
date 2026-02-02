<h1>Planning</h1>

<a href="index.php?controller=reservation&action=add">Ajouter une réservation</a>
<?php foreach ($reservations as $reservation) { ?>
    <p>
        Réservation espace <?=  $reservation["num_espace"] ?>
        - Client : <?= $reservation["nom_client"] ?> <?= $reservation["prenom_client"] ?>
        - Début : <?=  $reservation["debut_reservation"] ?>
        - Fin : <?=  $reservation["fin_reservation"] ?>
        - <a href="index.php?controller=reservation&action=edit&id=<?=  $reservation["id_reservation"] ?>">Modifer</a>
        <span id="supprimer-reservation-<?=  $reservation["id_reservation"] ?>" class="btn-supprimer">Supprimer</span></p>
<?php } ?>

<!-- Ceci est un popup qui devra s'afficher quand on clique sur le bouton supprimer correspondant à une réservation précise -->
    <div id="supprimer_reservation" class="popup">
        <div class="containerSupprimer">
            <h2>Supprimer la réservation ?</h2>
            <p>Êtes-vous sûr de vouloir supprimer cette réservation ?</p>
            <span class="boutonRouge">Oui</span>
            <span>Non</span>
        </div>
    </div>