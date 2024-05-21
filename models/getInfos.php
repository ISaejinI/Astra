<?php

/* ANCHOR Récupère toutes les galaxies */
function getGalaxies()
{
    global $dbAstra;
    $req = 'SELECT * FROM galaxies';
    $galaxies = $dbAstra->prepare($req);
    $galaxies->execute();
    $lines = $galaxies->fetchAll();

    return $lines;
}

/* ANCHOR Récupère tous les environnements */
function getEnvironnements()
{
    global $dbAstra;
    $req = 'SELECT * FROM environnements';
    $envts = $dbAstra->prepare($req);
    $envts->execute();
    $lines = $envts->fetchAll();

    return $lines;
}

/* ANCHOR Récupère tous les types de populations */
function getPopulations()
{
    global $dbAstra;
    $req = 'SELECT * FROM populations';
    $pops = $dbAstra->prepare($req);
    $pops->execute();
    $lines = $pops->fetchAll();

    return $lines;
}

/* ANCHOR Récupère la galaxie qui correspond à l'id */
function getGalaxy($id)
{
    global $dbAstra;
    $req = 'SELECT name FROM galaxies WHERE id=?';
    $gala = $dbAstra->prepare($req);
    $gala->execute(array($id));
    $line = $gala->fetch();
    return $line;
}

/* ANCHOR Récupère toutes les planètes appartenant à la galaxie */
function getPlanetsFromGalaxy ($id)
{
    global $dbAstra;
    $req = 'SELECT name, nbHab, urlImg, id FROM planets WHERE idGalaxie=?';
    $planets = $dbAstra->prepare($req);
    $planets->execute(array($id));
    $lines = $planets->fetchAll();
    return $lines;
}

/* ANCHOR Calcule le nombre d'habitants de la galaxie */
function getHabsNbFromGalaxy ($galaxie)
{
    $nbHab = 0;
    foreach ($galaxie as $planet) {
        $nbHab += $planet['nbHab'];
    }
    return $nbHab;
}