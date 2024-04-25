<?php

$host="localhost";

$db="astra";

$user="root";
$passwd="";

try {
    $dbAstra = new PDO("mysql:host=$host;dbname=$db", $user, $passwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $dbAstra->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Erreur : ".$e->getMessage()."<br>";
}

?>