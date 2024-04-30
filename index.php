<?php
    //Le début de tout
    session_start();
    require "./config.php";
    global $dbAstra;

    if (isset($_POST['create'])) {
        require "./models/form.php";
    } elseif (isset($_POST['login'])) {
        require "./models/users.php";
    }

    //Affichage des pages
    require './template/header.php';

    // var_dump($_GET['url']);
    // var_dump("./views/{$_GET['url']}.php");

    //Affichage et chargement de la page demandée
    if (!isset($_GET['url'])) {
        require "./views/accueil.php";
    }
    else {
        require "./views/{$_GET['url']}.php";
    }

    require './template/footer.html';
