<h1>Liste des utilisateurs</h1>

<a href="index.php?controller=utilisateur&action=create_account">Ajouter un utilisateur</a>

<?php foreach ($utilisateurs as $utilisateur) { ?>
    <p>
        Prénom : <?=  $utilisateur["prenom_utilisateur"] ?> - Nom : <?=  $utilisateur["nom_utilisateur"] ?> - Email : <?=  $utilisateur["email_utilisateur"] ?>
        - <a href="index.php?controller=utilisateur&action=edit&id=<?=  $utilisateur["id_utilisateur"] ?>">Modifier les informations</a>
        <span id="supprimer-utilisateur-<?=  $utilisateur["id_utilisateur"] ?>" class="btn-supprimer">Supprimer l'utilisateur</span></p>
<?php } ?>

<!-- Ceci est un popup qui devra s'afficher quand on clique sur le bouton supprimer correspondant à un utilisateur précis -->
<div id="supprimer_utilisateur" class="popup">
    <h2>Supprimer l'utilisateur</h2>
    <p>Êtes-vous sûr de vouloir supprimer cet utilisateur ?</p>
    <div>Oui</div>
    <div>Non</div>
</div>