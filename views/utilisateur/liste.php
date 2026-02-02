<div class="ListeEspaces">

    <div class="topListe">
        <h1>Liste des utilisateurs :</h1>
        <a href="index.php?controller=utilisateur&action=create_account">Ajouter un utilisateur</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($utilisateurs as $utilisateur) { ?>
                <tr>
                    <th><?=  $utilisateur["prenom_utilisateur"] ?></th>
                    <th><?=  $utilisateur["nom_utilisateur"] ?></th>
                    <th><?=  $utilisateur["email_utilisateur"] ?></th>
                    <th><?=  $utilisateur["nom_role"] ?></th>
                    <th class="options">
                        <a href="index.php?controller=utilisateur&action=edit&id=<?=  $utilisateur["id_utilisateur"] ?>"><i class="icon-edit"></i></a>
                        <?php if (count($utilisateurs) > 1) { ?>
                        <span id="supprimer-utilisateur-<?=  $utilisateur["id_utilisateur"] ?>" class="btn-supprimer"><i class="icon-trash"></i></span>
                        <?php } ?>
                    </th>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Ceci est un popup qui devra s'afficher quand on clique sur le bouton supprimer correspondant à un espace précis -->
    <div id="supprimer_utilisateur" class="popup">
        <div class="containerSupprimer">
            <h2>Supprimer l'utilisateur</h2>
            <p>Êtes-vous sûr de vouloir supprimer cet utilisateur ?</p>
            <span class="boutonRouge">Oui</span>
            <span>Non</span>
        </div>
    </div>
</div>