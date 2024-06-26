<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astra</title>
    <link rel="shortcut icon" href="src/astra-logo.png" type="image/png">
    <base href="<?= BASE_URL ?>">
    <link rel="stylesheet" href="CSS/main.css"/>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>

<body>

    <header>
        <a href="accueil/" class="logo">Astra</a>
        <nav>
            <a href="planets/">Explorer les planètes</a>
            <?php
            if (isset($_SESSION['id'])) { ?>
                <a href="createPlanet/">Créer une planète</a>
                <form method="post">
                    <input type="hidden" name="logout">
                    <input type="submit" value="Déconnexion" id="deco" class="bu-head">
                </form>

            <?php } else { ?>
                <a href="login/">Connexion</a>
                <a href="register/" class="bu-head">Inscription</a>
            <?php }
            ?>
        </nav>
    </header>

    <main>