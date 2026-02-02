<div class="pageConnexion">

    <div class="containerConnexion">

        <h1>Connexion</h1>

        <form action="" method="post">
            <div id="subContainer">
                <div>
                    <label>Email : <?php if (isset($erreurs)) { if (isset($erreurs["email"])) { ?> <span class="messageAlerte"> <?php echo $erreurs["email"]; ?> </span> <?php } }?></label>
                    <input type="email" class="textForm" name="email" maxlength="255" cols="100%" placeholder="Entrer votre email...">
                </div>
                <div>
                    <label>Mot de passe : <?php if (isset($erreurs)) { if (isset($erreurs["mdp"])) { ?> <span class="messageAlerte"> <?php echo $erreurs["mdp"]; ?> </span> <?php } }?></label>
                    <input type="password" class="textForm" name="mdp" maxlength="255" cols="100%" placeholder="Entrer votre mot de passe...">
                </div>
            </div>
            <div class="submitForm">
                <input type="submit" name="submit" value="Se connecter">
            </div>
        </form>

        
    </div>

    <?php if (isset($erreurs)) {?>
        <?php if (isset($erreurs["identifiants"])) { ?>
        <div id="backRouge" class="containerConnexion">
            <?php echo $erreurs["identifiants"]; ?>
        </div>
    <?php } } ?>

</div>
