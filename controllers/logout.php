<?php 
    $_SESSION = array(); //nettoie le tableau de session
    session_destroy();
    header('Location: '.BASE_URL.'accueil/');
    exit;