<div class="pageModifierReservation">
    
    <div class="containerModifierReservation">
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
            <div id="subContainer">
                <div>
                    <label for="nom">Nom client :<?php if (isset($erreurs)) { if (isset($erreurs["nom"])) { ?> <span class="messageAlerte"> <?php echo $erreurs["nom"]; ?> </span> <?php } }?></label>
                    <input type="text" name="nom" placeholder="Nom du client" value="<?= $reservation["nom_client"] ?>" required>
                </div>
                <div>
                    <label for="prenom">Prenom client :<?php if (isset($erreurs)) { if (isset($erreurs["prenom"])) { ?> <span class="messageAlerte"> <?php echo $erreurs["prenom"]; ?> </span> <?php } }?></label>
                    <input type="text" name="prenom" placeholder="Prenom du client" value="<?= $reservation["prenom_client"] ?>" required>
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
                    <label for="debut">Date de début :<?php if (isset($erreurs)) { if (isset($erreurs["dateDebut"])) { ?> <span class="messageAlerte"> <?php echo $erreurs["dateDebut"]; ?> </span> <?php } }?></label>
                    <input type="date" name="debut" value="<?= $dateDebut ?>" required>
                    <label>Heure de début :<?php if (isset($erreurs)) { if (isset($erreurs["heureDebut"])) { ?> <span class="messageAlerte"> <?php echo $erreurs["heureDebut"]; ?> </span> <?php } }?></label>
                    <select name="debut-heure" required>
                        <option <?= $heureDebut == "09:00:00" ? "selected" : "" ?>>09:00</option>
                        <option <?= $heureDebut == "09:30:00" ? "selected" : "" ?>>09:30</option>
                        <option <?= $heureDebut == "10:00:00" ? "selected" : "" ?>>10:00</option>
                        <option <?= $heureDebut == "10:30:00" ? "selected" : "" ?>>10:30</option>
                        <option <?= $heureDebut == "11:00:00" ? "selected" : "" ?>>11:00</option>
                        <option <?= $heureDebut == "11:30:00" ? "selected" : "" ?>>11:30</option>
                        <option <?= $heureDebut == "12:00:00" ? "selected" : "" ?>>12:00</option>
                        <option <?= $heureDebut == "12:30:00" ? "selected" : "" ?>>12:30</option>
                        <option <?= $heureDebut == "13:00:00" ? "selected" : "" ?>>13:00</option>
                        <option <?= $heureDebut == "13:30:00" ? "selected" : "" ?>>13:30</option>
                        <option <?= $heureDebut == "14:00:00" ? "selected" : "" ?>>14:00</option>
                        <option <?= $heureDebut == "14:30:00" ? "selected" : "" ?>>14:30</option>
                        <option <?= $heureDebut == "15:00:00" ? "selected" : "" ?>>15:00</option>
                        <option <?= $heureDebut == "15:30:00" ? "selected" : "" ?>>15:30</option>
                        <option <?= $heureDebut == "16:00:00" ? "selected" : "" ?>>16:00</option>
                    </select>
                </div>
                <div>
                    <label for="fin">Date de fin :<?php if (isset($erreurs)) { if (isset($erreurs["dateFin"])) { ?> <span class="messageAlerte"> <?php echo $erreurs["dateFin"]; ?> </span> <?php } }?></label>
                    <input type="date" name="fin" value="<?= $dateFin ?>" required>
                    <label>Heure de fin :<?php if (isset($erreurs)) { if (isset($erreurs["heureFin"])) { ?> <span class="messageAlerte"> <?php echo $erreurs["heureFin"]; ?> </span> <?php } }?></label>
                    <select name="fin-heure" required>
                        <option <?= $heureFin == "09:00:00" ? "selected" : "" ?>>09:00</option>
                        <option <?= $heureFin == "09:30:00" ? "selected" : "" ?>>09:30</option>
                        <option <?= $heureFin == "10:00:00" ? "selected" : "" ?>>10:00</option>
                        <option <?= $heureFin == "10:30:00" ? "selected" : "" ?>>10:30</option>
                        <option <?= $heureFin == "11:00:00" ? "selected" : "" ?>>11:00</option>
                        <option <?= $heureFin == "11:30:00" ? "selected" : "" ?>>11:30</option>
                        <option <?= $heureFin == "12:00:00" ? "selected" : "" ?>>12:00</option>
                        <option <?= $heureFin == "12:30:00" ? "selected" : "" ?>>12:30</option>
                        <option <?= $heureFin == "13:00:00" ? "selected" : "" ?>>13:00</option>
                        <option <?= $heureFin == "13:30:00" ? "selected" : "" ?>>13:30</option>
                        <option <?= $heureFin == "14:00:00" ? "selected" : "" ?>>14:00</option>
                        <option <?= $heureFin == "14:30:00" ? "selected" : "" ?>>14:30</option>
                        <option <?= $heureFin == "15:00:00" ? "selected" : "" ?>>15:00</option>
                        <option <?= $heureFin == "15:30:00" ? "selected" : "" ?>>15:30</option>
                        <option <?= $heureFin == "16:00:00" ? "selected" : "" ?>>16:00</option>
                    </select>
                </div>
            </div>
            <div class="submitForm">
                <input type="submit" name="submit" value="Modifier">
            </div>
        </form>
    </div>

            <?php if (isset($erreurs)) {?>
        <?php if (isset($erreurs["dateDebutInvalide"])) { ?>
        <div id="backRouge" class="containerModifierReservation">
            <?php echo $erreurs["dateDebutInvalide"]; ?>
        </div>
        <?php }; if (isset($erreurs["insertion"])) { ?>
        <div id="backRouge" class="containerModifierReservation">
            <?php echo $erreurs["insertion"]; ?>
        </div>
    <?php } } ?>

</div>