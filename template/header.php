<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astra</title>
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
            if (isset($_SESSION['id'])) {
                echo '<a href="createPlanet/">Créer une planète</a>
                <a href="controllers/logout.php" class="bu-head">Déconnexion</a>';
            } else {
                echo '<a href="login/">Connexion</a>
                      <a href="register/" class="bu-head">Inscription</a>';
            }
            ?>
        </nav>
    </header>

    <main>