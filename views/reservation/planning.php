<div class="ListeEspaces">

    <div class="topListe">
        <h1>Planning :</h1>
        <a href="index.php?controller=reservation&action=add">Ajouter une réservation</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Réservation Espace</th>
                <th>Client</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation) { ?>
                <tr>
                    <th><?=  $reservation["num_espace"] ?></th>
                    <th><?= $reservation["nom_client"] ?> <?= $reservation["prenom_client"] ?></th>
                    <th><?=  (new DateTime($reservation["debut_reservation"]))->format('d/m/Y H:i')?></th>
                    <th><?=  (new DateTime($reservation["fin_reservation"]))->format('d/m/Y H:i')?></th>
                    <th class="options">
                        <a href="index.php?controller=reservation&action=edit&id=<?=  $reservation["id_reservation"] ?>"><i class="icon-edit"></i></a>
                        <?php if (count($reservation) > 1) { ?>
                        <span id="supprimer-reservation-<?=  $reservation["id_reservation"] ?>" class="btn-supprimer"><i class="icon-trash"></i></span>
                        <?php } ?>
                    </th>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Ceci est un popup qui devra s'afficher quand on clique sur le bouton supprimer correspondant à un espace précis -->
    <div id="supprimer_reservation" class="popup">
        <div class="containerSupprimer">
            <h2>Supprimer la réservation ?</h2>
            <p>Êtes-vous sûr de vouloir supprimer cette réservation ?</p>
            <span class="boutonRouge">Oui</span>
            <span>Non</span>
        </div>
    </div>
</div>