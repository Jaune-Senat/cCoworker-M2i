<h1>Liste des espaces</h1>

<a href="index.php?controller=utilisateur&action=createaccount">Ajouter un espace</a>

<?php foreach ($users as $user) { ?>
    <p>
        Prénom : <?=  $user["prenom_utilisateur"] ?> - Nom : <?=  $user["nom_utilisateur"] ?> - Email : <?=  $user["email_utilisateur"] ?>
        - <a href="index.php?controller=utilisateur&action=edit&id=<?=  $user["id_utilisateur"] ?>">Modifier les informations</a>
        <span id="supprimer-utilisateur-<?=  $user["num_espace"] ?>" class="btn-supprimer">Supprimer l'employé</span></p>
<?php } ?>

<!-- Ceci est un popup qui devra s'afficher quand on clique sur le bouton supprimer correspondant à un espace précis -->
<div id="supprimer_utilisateur" class="popup">
    <h2>Supprimer l'utilisateur</h2>
    <p>Êtes-vous sûr de vouloir supprimer cet employé ?</p>
    <div>Oui</div>
    <div>Non</div>
</div>