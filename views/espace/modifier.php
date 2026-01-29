<div class="pageModifierEspace">

    <div class="containerModifierEspace">
        <h1>Modifier un espace</h1>

        <form action="" method="post">
            <div>
                <label for="numero">Numéro :</label>
                <input type="number" name="numero" placeholder="Numéro de l'espace" value="<?=  $espace["num_espace"] ?>" required>
            </div>
            <div>
                <label for="capacite">Capacité :</label>
                <input type="number" name="capacite" placeholder="Capacité de l'espace" value="<?=  $espace["capacite_espace"] ?>" required>
            </div>
            <div>
                <label for="type">Type</label>
                <Select name="type" required>
                    <?php foreach($types as $type){ ?>
                        <option value="<?=  $type["id_type"] ?>"<?=  $espace["id_type"] == $type["id_type"] ? " selected" : "" ?>><?=  $type["nom_type"] ?></option>
                    <?php } ?>
                </Select>
            </div>
            <div class="submitForm">
                <input type="submit" name="submit" value="Modifier">
            </div>
        </form>

    </div>
</div>