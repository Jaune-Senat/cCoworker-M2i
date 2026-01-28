<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/app.css">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <title>Titre de la page</title>
</head>
<body id="wrapper">
        <header>
        <nav>
            <img src="public/img/logo-CCoworker.png">
            <?php if (isset($_SESSION["Utilisateur"])) {?>
                <ul>
                    <a href="#"><li>Planning</li></a>
                    <a href="#"><li>Espaces</li></a>
                    <a href="#"><li>Utilisateurs</li></a>
                </ul>
                <div>
                    <a><?php $_SESSION["Utilisateur"]["prenom_utilisateur"]?><i class="icon-user"></i></a>
                </div>
            <?php } ?>
        </nav>
    </header>