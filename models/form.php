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



//Toutes les requêtes et les variables
$reqenv = "INSERT INTO `planet-environnement` (idPlanet, idEnvironnement) VALUES (?,?)";
$reqpop = "INSERT INTO `planet-population` (idPlanet, idPopulation) VALUES (?,?)";
$reqplanet = "INSERT INTO planets (name, idUser, taille, idGalaxie, description, urlImg, habitable, climat) VALUES (:planetName,:planetUser,:planetSize,:planetGalaxie,:planetDesc,:planetImg,:planetHab,:planetClimat)";
$reqhab = "UPDATE planet SET `nbHab=:planetHabs` WHERE id=:idPlanet";


//Tableau de toutes les données à fournir quand on ajoute la table
$infos = [
    ':planetName' => $_POST['name'],
    ':planetUser' => $_SESSION['id'],
    ':planetSize' => $_POST['taille'],
    ':planetGalaxie' => $_POST['galaxie'],
    ':planetDesc' => $_POST['desc'],
    ':planetImg' => $imgname,
    ':planetHab' => $_POST['habitable'],
    ':planetClimat' => $_POST['climat']
];


//Fonction d'insertion dans les tables pivots
function pivot($info, $requete, $db, $idplanet)
{
    foreach ($info as $k) {
        $piv = $db->prepare($requete);
        $piv->execute(array($idplanet, $k));
    }
}


//Si tous les champs ne sont pas remplis on sort de la fonction
if (!(isset($_POST['name']) && isset($_POST['taille']) && isset($_POST['galaxie']) && isset($_POST['env']) && isset($_POST['desc']) && isset($_POST['habitable']))) {
    return $_SESSION['formerror'] = "Tous les champs ne sont pas remplis";
}

else {
    //Sinon exécution de la requête sans les champs nombre d'habitants et 
    $planet = $dbAstra->prepare($reqplanet);
    $planet->execute($infos);

    //Définition de l'id de la planète
    $planetId = $dbAstra->lastInsertId();

    //Insertion dans la table pivot des environnements
    pivot($_POST['env'], $reqenv, $dbAstra, $planetId);

    //Si la planète n'est pas habitable, sortir du formulaire
    if ($_POST['habitable'] == false) {
        return $_SESSION['formsuccess'] = "La planète a bien été créée";
    } else {
        //Si la planète est habitable on vérifie si elle a tous les champs nécessaire
        //Si il n'y a pas tous les champs, on sort du formulaire
        if (!(isset($_POST['nbhab']) && isset($_POST['pop']))) {
            return $_SESSION['formerror'] = "Tous les champs ne sont pas remplis";
        } else {
            $infos2 = [
                ':planetHabs' => $_POST['nbhab'],
                ':idPlanet' => $planetId,
            ];

            $update = $dbAstra->prepare($reqhab);
            $update->execute($infos2);
            
            pivot($_POST['pop'], $reqpop, $dbAstra, $planetId);
        }
    }


}