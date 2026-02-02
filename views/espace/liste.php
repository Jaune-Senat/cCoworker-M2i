<div class="ListeEspaces">

    <div class="topListe">
        <h1>Liste des espaces :</h1>
        <a href="index.php?controller=espace&action=add">Ajouter un espace</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Num.salle</th>
                <th>Capacité</th>
                <th>Type</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($espaces as $espace) { ?>
                <tr>
                    <th><?=  $espace["num_espace"] ?></th>
                    <th><?=  $espace["capacite_espace"] ?></th>
                    <th><?=  $espace["nom_type"] ?></th>
                    <th class="options">
                        <a href="index.php?controller=espace&action=edit&id=<?=  $espace["id_espace"] ?>"><i class="icon-edit"></i></a>
                        <span id="supprimer-espace-<?=  $espace["num_espace"] ?>" class="btn-supprimer"><i class="icon-trash"></i></span>
                    </th>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Ceci est un popup qui devra s'afficher quand on clique sur le bouton supprimer correspondant à un espace précis -->
    <div id="supprimer_espace" class="popup">
        <div class="containerSupprimer">
            <h2>Supprimer l'espace numéro</h2>
            <p>Êtes-vous sûr de vouloir supprimer cet espace ?</p>
            <span class="boutonRouge">Oui</span>
            <span>Non</span>
        </div>
    </div>

<?php foreach ($espaces as $espace) { ?>
    <p>
        Espace numéro : <?=  $espace["num_espace"] ?> - Capacité : <?=  $espace["capacite_espace"] ?> - Type : <?=  $espace["nom_type"] ?>
        - <a href="index.php?controller=espace&action=edit&id=<?= $espace["id_espace"] ?>">Modifier</a>
        <span id="supprimer-espace-<?=  $espace["num_espace"] ?>" class="btn-supprimer">Supprimer</span></p>
<?php } ?>

</div>