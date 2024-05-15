<?php

/* Récupère toutes les galaxies */
function getGalaxies()
{
    global $dbAstra;
    $req = 'SELECT * FROM galaxies';
    $galaxies = $dbAstra->prepare($req);
    $galaxies->execute();
    $lines = $galaxies->fetchAll();

    return $lines;
}

/* Récupère tous les environnements */
function getEnvironnements()
{
    global $dbAstra;
    $req = 'SELECT * FROM environnements';
    $envts = $dbAstra->prepare($req);
    $envts->execute();
    $lines = $envts->fetchAll();

    return $lines;
}

/* Récupère tous les types de populations */
function getPopulations()
{
    global $dbAstra;
    $req = 'SELECT * FROM populations';
    $pops = $dbAstra->prepare($req);
    $pops->execute();
    $lines = $pops->fetchAll();

    return $lines;
}