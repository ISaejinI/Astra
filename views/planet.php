<?php 

$req = 'SELECT * FROM planets WHERE id=?';

$planet = $dbAstra->prepare($req);
$planet->execute(array($_GET['id']));
$line = $planet->fetch();

var_dump($line);

?>