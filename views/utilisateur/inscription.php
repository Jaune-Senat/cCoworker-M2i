<div class="pageInscription">
    <div class="containerInscription">
        <h1>Ajouter un utilisateur</h1>
 
        <form action="" method="post">
            <div id="subContainer">
                <div>
                    <label>Prénom :</label>
                    <input type="text" name="prenom" placeholder="Indiquez le prénom...">
                </div>
                <div>
                    <label>Nom :</label>
                    <input type="text" name="nom" placeholder="Indiquez le nom...">
                </div>
                <div>
                    <label>Email :</label>
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
                    <label>Mot de passe :</label>
                    <input type="password" name="password" placeholder="Indiquez le mot de passe...">
                </div>
                <div>
                    <label>Répéter mot de passe :</label>
                    <input type="password" name="password_repeat" placeholder="Répétez le mot de passe...">
                </div>
            </div>
            <div class="submitForm">
                <input type="submit" name="submit" value="Ajouter l'employé">
            </div>
        </form>
    </div>
</div>