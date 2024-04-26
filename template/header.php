<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astra</title>
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>

<body>

    <header>
        <a href="../views/index.php" class="logo">Astra</a>
        <nav>
            <a href="../views/planets.php">Explorer les planètes</a>
            <?php
            if (isset($_SESSION['id'])) {
                echo '<a href="../views/createPlanet.php">Créer une planète</a>
                <a href="../models/logout.php" class="bu-head">Déconnexion</a>';
            } else {
                echo '<a href="../views/login.php">Connexion</a>
                      <a href="../views/register.php" class="bu-head">Inscription</a>';
            }
            ?>
        </nav>
    </header>

    <main>