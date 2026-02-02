<div class="ajoutEsp">
  <div class="containerAjoutEsp">
      <h1>Ajouter un espace</h1>

<form action="" method="post">
    <div>
        <label for="numero">Numéro : <?php if (isset($erreurs)) { if (isset($erreurs["numero"])) { ?> <span class="messageAlerte"> <?php echo $erreurs["numero"]; ?> </span> <?php } }?></label>
        <input type="number" name="numero" placeholder="Numéro de l'espace" required>
    </div>
    <div>
        <label for="capacite">Capacité :<?php if (isset($erreurs)) { if (isset($erreurs["capacite"])) { ?> <span class="messageAlerte"> <?php echo $erreurs["capacite"]; ?> </span> <?php } }?></label>
        <input type="number" name="capacite" placeholder="Capacité de l'espace" required>
    </div>
    <div>
        <label for="type">Type</label>
        <Select name="type" required>
            <?php foreach($types as $type){ ?>
                <option value="<?=  $type["id_type"] ?>"><?=  $type["nom_type"] ?> </option>
            <?php } ?>
        </Select>
    </div>
    <div class="submitForm">
        <input type="submit" name="submit" value="Ajouter">
    </div>
</form>
