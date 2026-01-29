<div class="pageConnexion">
    <div class="">
        <h1>Ajouter un utilisateur</h1>

        <form action="" method="post">
            <div>
                <label for="">Nom :</label>
                <input type="text" name="nom" placeholder="Indiquez le nom">
            </div>
            <div>
                <label for="">Prénom :</label>
                <input type="text" name="prenom" placeholder="Indiquez le prénom">
            </div>
            <div>
                <label for="">Mot de passe :</label>
                <input type="password" name="password" placeholder="Indiquez le mot de passe">
            </div>
            <div>
                <label for="">Email :</label>
                <input type="email" name="email" placeholder="Indiquez l'email">
            </div>
            <div>
                <label for="">Répéter mot de passe :</label>
                <input type="password" name="password_repeat" placeholder="Répétez le mot de passe">
            </div>
            <div>
                <label for="">Role</label>
                <Select name="role">
                    <?php foreach($roles as $role){
                        ?>
                    <option value="<?=  $role["id_role"] ?>"><?=  $role["nom_role"] ?> </option>
                    <?php } ?>
                </Select>
            </div>
            <div>
                <input type="submit" name="submit" value="Ajouter l'employé">
            </div>
        </form>
    </div>
</div>
