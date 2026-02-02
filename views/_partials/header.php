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
            <?php if (isset($_SESSION["utilisateur"])) {?>
                <ul>
                    <a href="index.php?controller=reservation&action=planning"><li>Planning</li></a>
                    <a href="index.php?controller=espace&action=list"><li>Espaces</li></a>
                    <a href="index.php?controller=utilisateur&action=findAll"><li>Utilisateurs</li></a>
                </ul>
                <div class="utilisateur">
                    <a><?= $_SESSION["utilisateur"]["prenom_utilisateur"]?><i class="icon-user"></i></a>
                    <a href="index.php?action=logout"><i class="icon-signout"></i></a>
                </div>
            <?php } ?>
        </nav>
    </header>
    <main>