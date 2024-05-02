<?php

$req = 'SELECT planets.*, galaxies.name AS galaxy_name FROM planets JOIN galaxies ON planets.idGalaxie=galaxies.id WHERE planets.id=?';

$reqenv = 'SELECT name FROM environnements JOIN `planet-environnement` ON idEnvironnement=environnements.id WHERE idPlanet=?';
$reqpop = 'SELECT name FROM populations JOIN `planet-population` ON idPopulation=populations.id WHERE idPlanet=?';

$planet = $dbAstra->prepare($req);
$planet->execute(array($_GET['id']));
$laplanete = $planet->fetch();

$env = $dbAstra->prepare($reqenv);
$env->execute(array($_GET['id']));
$envts = $env->fetchAll();
?>

<div id="desc">
    <h4>Description</h4>
    <p><?php echo $laplanete['description'] ?></p>
</div>

<div id="visu">
    <img src="/src/<?php echo $laplanete['urlImg'] ?>" alt="">
    <h1 id="planetName"><?php echo $laplanete['name'] ?></h1>
</div>

<div id="infos">
    <h4>Galaxie</h4>
    <p><?php echo $laplanete['galaxy_name'] ?></p>

    <h4>Taille</h4>
    <p><?php echo $laplanete['taille'] ?> km de diamètre</p>

    <h4>Climat</h4>
    <p><?php echo $laplanete['climat'] ?></p>

    <h4>Environnement</h4>
    <ul>
        <?php
        foreach ($envts as $e) {
            echo "<li>" . $e['name'] . "</li>";
        }
        ?>
    </ul>

    <?php
    if (is_null($laplanete['habitable'])) {
        echo "<h4>Population</h4>";
        echo "<p>La planète n'est aps habitable</p>";
    } else {
        echo "<h4>Nopmbre d'habitants</h4>";
        echo "<p>".$laplanete['nbHab']."</p>";

        $pop = $dbAstra->prepare($reqpop);
        $pop->execute(array($_GET['id']));
        $pops = $pop->fetchAll();

        echo "<h4>Population</h4>";
        echo "<ul>";
        foreach ($pops as $p) {
            echo "<li>" . $p['name'] . "</li>";
        }
        echo "</ul>";
    }
    ?>

</div>

<?php
if (is_null($laplanete['idUser'])) {
    echo "";
} else {
    $requsr = 'SELECT id, username FROM users WHERE id=?';
    $usr = $dbAstra->prepare($requsr);
    $usr->execute(array($laplanete['idUser']));
    $usrinfo = $usr->fetch();

    echo "<p>Planète créée par " . $usrinfo['username'] . "</p>";

    // echo "<pre>";
    // var_dump($usrinfo);
    // echo "</pre>"; 
}
?>