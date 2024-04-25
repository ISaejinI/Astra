<?php

function slide()
{
    global $dbAstra;
    $req = 'SELECT * FROM planets ORDER BY id DESC LIMIT 5';

    $planets = $dbAstra->prepare($req);
    $planets->execute();
    $line = $planets->fetch();

    return $line;
}
?>