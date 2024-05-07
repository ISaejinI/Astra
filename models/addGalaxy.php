<?php
if (isset($_POST['galaxyName'])) {
    $req = 'INSERT INTO galaxies (name) VALUES (?)';

    $galaxie = $dbAstra->prepare($req);
    $galaxie->execute(array($_POST['galaxyName']));

    $lastid = $dbAstra->lastInsertId();

    $reqlast = 'SELECT * FROM galaxies WHERE id = ?';
    $stmt_lastgalaxie = $dbAstra->prepare($reqlast);
    $stmt_lastgalaxie->execute(array($lastid));
    $lastgalaxie = $stmt_lastgalaxie->fetch();

    echo json_encode(["status" => "Galaxie ajoutée", "galaxieInfo" => $lastgalaxie]);
}
else {
    $_SESSION['errorGalaxie'] = 'Veuillez saisir un nom de galaxie';
}

exit;