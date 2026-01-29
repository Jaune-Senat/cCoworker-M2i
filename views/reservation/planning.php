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