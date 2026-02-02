<h1>Liste des espaces</h1>

<a href="index.php?controller=espace&action=add">Ajouter un espace</a>

<?php foreach ($espaces as $espace) { ?>
    <p>
        Espace numéro : <?=  $espace["num_espace"] ?> - Capacité : <?=  $espace["capacite_espace"] ?> - Type : <?=  $espace["nom_type"] ?>
        - <a href="index.php?controller=espace&action=edit&id=<?= $espace["id_espace"] ?>">Modifier</a>
        <span id="supprimer-espace-<?=  $espace["num_espace"] ?>" class="btn-supprimer">Supprimer</span></p>
<?php } ?>

<!-- Ceci est un popup qui devra s'afficher quand on clique sur le bouton supprimer correspondant à un espace précis -->
<div id="supprimer_espace" class="popup">
    <h2>Supprimer l'espace numéro</h2>
    <p>Êtes-vous sûr de vouloir supprimer cet espace ?</p>
    <div>Oui</div>
    <div>Non</div>
</div>