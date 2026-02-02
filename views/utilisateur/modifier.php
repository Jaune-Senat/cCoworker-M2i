<div class="pageInscription">
    <div class="containerInscription">
        <h1>Modifier un utilisateur</h1>
 
        <form action="" method="post">
            <div id="subContainer">
                <div>
                    <label>Prénom :</label>
                    <input type="text" name="prenom" placeholder="Indiquez le prénom..." value="<?= $utilisateur["prenom_utilisateur"] ?>" required>
                </div>
                <div>
                    <label>Nom :</label>
                    <input type="text" name="nom" placeholder="Indiquez le nom..." value="<?= $utilisateur["nom_utilisateur"] ?>" required>
                </div>
                <div>
                    <label>Email :</label>
                    <input type="email" name="email" placeholder="Indiquez l'email..." value="<?= $utilisateur["email_utilisateur"] ?>" required>
                </div>
                <div>
                    <label>Role</label>
                    <select name="role">
                        <?php foreach($roles as $role){ ?>
                            <option value="<?= $role["id_role"] ?>"<?= $role["id_role"] == $utilisateur["id_role"] ? " selected" : "" ?>><?= $role["nom_role"] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <label>Mot de passe :</label>
                    <input type="password" name="password" placeholder="Indiquez mot de passe ou laissez vide...">
                </div>
                <div>
                    <label>Répéter mot de passe :</label>
                    <input type="password" name="password_repeat" placeholder="Répétez mot de passe ou laissez vide...">
                </div>
            </div>
            <div class="submitForm">
                <input type="submit" name="submit" value="Modifier l'utilisateur">
            </div>
        </form>
    </div>
</div>