<h1>Modifier une réservation</h1>

<?php
    $debut = explode(' ', $reservation["debut_reservation"]);
    $fin = explode(' ', $reservation["fin_reservation"]);
    $dateDebut = $debut[0];
    $heureDebut = $debut[1];
    $dateFin = $fin[0];
    $heureFin = $fin[1];
?>

<form action="" method="post">
    <div>
        <label for="nom">Nom client :</label>
        <input type="text" name="nom" placeholder="Nom du client" value="<?= $reservation["nom_client"] ?>" required>
    </div>
    <div>
        <label for="prenom">Prenom client :</label>
        <input type="text" name="prenom" placeholder="Prenom du client" value="<?= $reservation["prenom_client"] ?>" required>
    </div>
    <div>
        <label for="debut">Date de début :</label>
        <input type="date" name="debut" value="<?= $dateDebut ?>" required> à <input type="time" name="debut-heure" step="1800" value="<?= $heureDebut ?>" required>
    </div>
    <div>
        <label for="fin">Date de fin :</label>
        <input type="date" name="fin" value="<?= $dateFin ?>" required> à <input type="time" name="fin-heure" step="1800" value="<?= $heureFin ?>" required>
    </div>
    <div>
        <label for="espace">Espace</label>
        <Select name="espace" required>
            <?php foreach($espaces as $espace){ ?>
                <option value="<?=  $espace["id_espace"] ?>"<?=  $espace["num_espace"] == $espace["id_espace"] ? " selected" : "" ?>><?=  $espace["num_espace"] ?></option>
            <?php } ?>
        </Select>
    </div>
    <div>
        <input type="submit" name="submit" value="Modifier">
    </div>
</form>