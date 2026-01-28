<form action="" method="post">
    <p>
        <label for="">Nom :</label>
        <input type="text" name="nom" placeholder="Indiquez le nom">
    </p>
    <p>
        <label for="">Prénom :</label>
        <input type="text" name="prenom" placeholder="Indiquez le prénom">
    </p>
    <p>
        <label for="">Mot de passe :</label>
        <input type="text" name="password" placeholder="Indiquez le mot de passe">
    </p>
    <p>
        <label for="">Email :</label>
        <input type="text" name="email" placeholder="Indiquez l'email">
    </p>
    <p>
        <label for="">Répéter mot de passe :</label>
        <input type="text" name="password_repeat" placeholder="Répétez le mot de passe">
    </p>
    <p>
        <label for=""> Role : </label>
        <select name="role" id="role">
            <?php 
                foreach ($roles as $role){
                    ?>
                    <option value="<?= $role["id_role"] ?>" ><?= $role["nom_role"] ?></option>
                    <?php
                }
             ?>
        </select>
    </p>
    <p>
        <input type="submit" name="submit" value="Ajouter l'employé">
    </p>
</form>