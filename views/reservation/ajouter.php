<div class="pageAjouterReservation">
    
    <div class="containerAjouterReservation">
        <h1>Ajouter une réservation</h1>
        
        <form action="" method="post">
            <div id="subContainer">
                <div>
                    <label for="nom">Nom client :<?php if (isset($erreurs)) { if (isset($erreurs["nom"])) { ?> <span class="messageAlerte"> <?php echo $erreurs["nom"]; ?> </span> <?php } }?></label>
                    <input type="text" name="nom" placeholder="Nom du client" required>
                </div>
                <div>
                    <label for="prenom">Prenom client :<?php if (isset($erreurs)) { if (isset($erreurs["prenom"])) { ?> <span class="messageAlerte"> <?php echo $erreurs["prenom"]; ?> </span> <?php } }?></label>
                    <input type="text" name="prenom" placeholder="Prenom du client" required>
                </div>
                <div>
                    <label for="espace">Espace</label>
                    <Select name="espace" required>
                        <?php foreach($espaces as $espace){ ?>
                            <option value="<?=  $espace["id_espace"] ?>"><?=  $espace["num_espace"] ?> </option>
                        <?php } ?>
                    </Select>
                </div>
                <div>
                    <label for="debut">Date de début :<?php if (isset($erreurs)) { if (isset($erreurs["dateDebut"])) { ?> <span class="messageAlerte"> <?php echo $erreurs["dateDebut"]; ?> </span> <?php } }?></label>
                    <input type="date" name="debut" required>
                    <label> Heure de début :<?php if (isset($erreurs)) { if (isset($erreurs["heureDebut"])) { ?> <span class="messageAlerte"> <?php echo $erreurs["heureDebut"]; ?> </span> <?php } }?></label>
                    <select name="debut-heure" required>
                        <option>09:00</option>
                        <option>09:30</option>
                        <option>10:00</option>
                        <option>10:30</option>
                        <option>11:00</option>
                        <option>11:30</option>
                        <option>12:00</option>
                        <option>12:30</option>
                        <option>13:00</option>
                        <option>13:30</option>
                        <option>14:00</option>
                        <option>14:30</option>
                        <option>15:00</option>
                        <option>15:30</option>
                        <option>16:00</option>
                    </select>
                </div>
                <div>
                    <label for="fin">Date de fin :<?php if (isset($erreurs)) { if (isset($erreurs["dateFin"])) { ?> <span class="messageAlerte"> <?php echo $erreurs["dateFin"]; ?> </span> <?php } }?></label>
                    <input type="date" name="fin" required> 
                    <label> Heure de fin :<?php if (isset($erreurs)) { if (isset($erreurs["heureFin"])) { ?> <span class="messageAlerte"> <?php echo $erreurs["heureFin"]; ?> </span> <?php } }?></label>
                    <select name="fin-heure" required>
                        <option>09:00</option>
                        <option>09:30</option>
                        <option>10:00</option>
                        <option>10:30</option>
                        <option>11:00</option>
                        <option>11:30</option>
                        <option>12:00</option>
                        <option>12:30</option>
                        <option>13:00</option>
                        <option>13:30</option>
                        <option>14:00</option>
                        <option>14:30</option>
                        <option>15:00</option>
                        <option>15:30</option>
                        <option>16:00</option>
                    </select>
                </div>
            </div>
            <div class="submitForm">
                <input type="submit" name="submit" value="Ajouter">
            </div>
        </form>

    </div>

        <?php if (isset($erreurs)) {?>
        <?php if (isset($erreurs["dateDebutInvalide"])) { ?>
        <div id="backRouge" class="containerAjouterReservation">
            <?php echo $erreurs["dateDebutInvalide"]; ?>
        </div>
        <?php }; if (isset($erreurs["insertion"])) { ?>
        <div id="backRouge" class="containerAjouterReservation">
            <?php echo $erreurs["insertion"]; ?>
        </div>
    <?php } } ?>

</div>