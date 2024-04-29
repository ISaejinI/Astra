<?php
//Traiter l'image envoyée
var_dump($_FILES);

//Changer le nom de l'image envoyée
$imgname = date("YmdHis") . ".png";

//Déplacer le stockage de l'image
$stockage = "./src/";
$upfile = $stockage . $imgname;
var_dump($upfile);
move_uploaded_file($_FILES['img']['tmp_name'], $upfile);

var_dump($_POST);

exit;


//Toutes les requêtes et les variables
$reqenv = 'INSERT INTO planet-environnement (idPlanet, idEnvironnement) VALUES (?,?)';
$reqpop = 'INSERT INTO planet-population (idPlanet, idPopulation) VALUES (?,?)';
$reqall = 'INSERT INTO planets (name, idUser, taille, idGalaxie, description, nbHab, urlImg, habitable, climat) VALUES (:planetName,:planetUser,:planetSize,:planetGalaxie,:planetDesc,:planetHabs,:planetImg,:planetHab,:planetClimat)';


//Tableau de toutes les données à fournir quand on ajoute la table
$valeurs = [
    ':planetName' => $_POST['name'],
    ':planetUser' => $_SESSION['id'],
    ':planetSize' => $_POST['taille'],
    ':planetGalaxie' => $_POST['galaxie'],
    ':planetDesc' => $_POST['desc'],
    ':planetHabs' => $_POST['nbhab'],
    ':planetImg' => $imgname,
    ':planetHab' => $_POST['habitable'],
    ':planetClimat' => $_POST['climat']
];



//Fonction d'insertion dans les tables pivots
function pivot($info, $requete, $db)
{
    foreach ($info as $k) {
        $idplanet = $db->lastInsertId();
        $piv = $db->prepare($requete);
        $piv->execute(array($idplanet, $k));
    }
}


//Si tous les champs ne sont pas remplis on sort de la fonction
if (!(isset($_POST['name']) && isset($_POST['taille']) && isset($_POST['galaxie']) && isset($_POST['env']) && isset($_POST['desc']) && isset($_POST['habitable']))) {
    return $_SESSION['formerror'] = "Tous les champs ne sont pas remplis";
}


//Si la planète est habitable
if ($_POST['habitable'] == true) {
    //Vérifier si il y a tous les champs
    if (isset($_POST['nbhab']) && isset($_POST['pop'])) {
        //faire toute la requête
        //Utiliser reqall

        $planet = $dbAstra->prepare($reqall);
        $planet->execute(array(
            ':planetName' => $_POST['name'],
            $_SESSION['id'],
            $_POST['taille'],
            $_POST['galaxie'],
            $_POST['desc'],
            $_POST['nbHab'],
            $_POST['urlImg'],
        ));


        //Insertion dans la table pivot des environnements
        pivot($_POST['env'], $reqenv, $dbAstra);

        //Insertion dans la table pivot des populations
        pivot($_POST['pop'], $reqpop, $dbAstra);
    } else {
        $_SESSION['formerror'] = "Merci de remplir le nombre d'habitants et la population";
    }
} else {
    //Faire la requête sans les champs hab et pop -> reqtt

}
