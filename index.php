<?php
    //Le début de tout
    session_start();
    require "./models/config.php";
    global $dbAstra;

    //Affichage des pages
    require './template/header.php';

    //Il faut réussir à afficher la page
    
    // var_dump($_GET['url']);
    // var_dump("./views/{$_GET['url']}.php");

    if (!isset($_GET['url'])) {
        require "./views/accueil.php";
    }
    // elseif (condition) {
        
    // }
    else {
        require "./views/{$_GET['url']}.php";
    }
    
    
    

    require './template/footer.html';
