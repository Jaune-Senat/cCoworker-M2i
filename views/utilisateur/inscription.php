<div class="pageInscription">
    <div class="containerInscription">
        <h1>Ajouter un utilisateur</h1>
 
        <form action="" method="post">
            <div id="subContainer">
                <div>
                    <label>Prénom : <?php if (isset($erreurs)) { if (isset($erreurs["prenom"])) { ?> <span class="messageAlerte"> <?php echo $erreurs["prenom"]; ?> </span> <?php } }?></label>
                    <input type="text" name="prenom" placeholder="Indiquez le prénom...">
                </div>
                <div>
                    <label>Nom : <?php if (isset($erreurs)) { if (isset($erreurs["nom"])) { ?> <span class="messageAlerte"> <?php echo $erreurs["nom"]; ?> </span> <?php } }?></label>
                    <input type="text" name="nom" placeholder="Indiquez le nom...">
                </div>
                <div>
                    <label>Email : <?php if (isset($erreurs)) { if (isset($erreurs["email"])) { ?> <span class="messageAlerte"> <?php echo $erreurs["email"]; ?> </span> <?php } }?></label>
                    <input type="email" name="email" placeholder="Indiquez l'email...">
                </div>
                <div>
                    <label>Role</label>
                    <select name="role">
                        <?php foreach($roles as $role){
                            ?>
                        <option value="<?=  $role["id_role"] ?>"><?=  $role["nom_role"] ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <label>Mot de passe : <?php if (isset($erreurs)) { if (isset($erreurs["password"])) { ?> <span class="messageAlerte"> <?php echo $erreurs["password"]; ?> </span> <?php } }?></label>
                    <input type="password" name="password" placeholder="Indiquez le mot de passe...">
                </div>
                <div>
                    <label>Répéter mot de passe :</label>
                    <input type="password" name="password_repeat" placeholder="Répétez le mot de passe..." required>
                </div>
            </div>
            <div class="submitForm">
                <input type="submit" name="submit" value="Ajouter l'utilisateur">
            </div>
        </form>
    </div>

    <?php if (isset($erreurs)) {?>
        <?php if (isset($erreurs["insertion"])) { ?>
        <div id="backRouge" class="containerConnexion">
            <?php echo $erreurs["insertion"]; ?>
        </div>
        <?php } if (isset($erreurs["password_repeat"])) { ?>
        <div id="backRouge" class="containerInscription">
            <?php echo $erreurs["password_repeat"]; ?>
        </div>
    <?php } } ?>

</div>