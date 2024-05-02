<?php 

$req = 'SELECT * FROM planets WHERE id=?';
$reqenv = 'SELECT name FROM environnements JOIN `planet-environnement` ON idEnvironnement=environnements.id WHERE idPlanet=?';
$reqpop = 'SELECT name FROM populations JOIN `planet-population` ON idPopulation=populations.id WHERE idPlanet=?';

$planet = $dbAstra->prepare($req);
$planet->execute(array($_GET['id']));
$laplanete = $planet->fetch();

echo '<pre>';
var_dump($laplanete);
echo '</pre>';

$env = $dbAstra->prepare($reqenv);
$env->execute(array($_GET['id']));
$envts = $env->fetchAll();

echo '<pre>';
var_dump($envts);
echo '</pre>';

$pop = $dbAstra->prepare($reqpop);
$pop->execute(array($_GET['id']));
$pops = $pop->fetchAll();

echo '<pre>';
var_dump($pops);
echo '</pre>';
?>