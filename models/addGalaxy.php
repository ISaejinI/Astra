<?php
if (isset($_POST['galaxyName'])) {
    $req = 'INSERT INTO galaxies (name) VALUES (?)';

    $galaxie = $dbAstra->prepare($req);
    $galaxie->execute(array($_POST['galaxyName']));

    $_SESSION['successGalaxie'] = 'Galaxie ajoutée';
    unset($_POST['galaxyName']);
    header('Location: /createPlanet/');
    exit;
}
else {
    $_SESSION['errorGalaxie'] = 'Veuillez saisir un nom de galaxie';
}