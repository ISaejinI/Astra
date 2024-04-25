<?php
require "./config.php";

if (isset($_POST["logmail"]) && isset($_POST["logpwd"])) {
    login($_POST["logmail"], $_POST["logpwd"]);
}
elseif (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["pwd"])) {
    register($_POST["username"], $_POST["email"], $_POST["pwd"]);
}
else {
    $_SESSION['error'] = "Tous les champs ne sont pas remplis";
}

function login($mail, $pwd)
{
    global $dbAstra;
    $req = 'SELECT * FROM users WHERE email=?';

    $users = $dbAstra->prepare($req);
    $users->execute(array($mail));
    $line = $users->fetch();


    //D'abord vérifier si ça retourne une ligne
    //Si retourne une ligne -> 
                            //Je vérifie si mail & password ok
                                    //Si ok -> connexion
                                    //Si pas ok -> dire que c'est NUL
    //Si retourne pas ligne -> dire que pas de compte à cette adresse

    if ($line === false) {
        //Un compte existe avec ce mail
        if ($line['password'] == sha1($pwd)) {
            //Le couple mdp et mail est OK
            $_SESSION['id'] = $line['id'];
            header("Location: ../views/index.php");
            exit;
        } else {
            $_SESSION['error'] = "Mot de passe incorrect";
            header("Location: ../views/login.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "Aucun compte existant à cette adresse";
        header("Location: ../views/login.php");
        exit;
    }

};

function register($username, $email, $passwd) {
    global $dbAstra;

    //Je vérifie qu'il n'y a pas de compte déjà créé avec le mail
            //Si non -> créer compte
            //Si oui -> dire que déjà un compte existe
    
    $req = 'SELECT * FROM users WHERE email=?';
    $users = $dbAstra->prepare($req);
    $users->execute(array($email));
    $line = $users->fetch();

    if ($line === false) {
        //pas de compte existant -> créer le compte

        $req = 'INSERT INTO users (username, email, password) VALUES (?,?,PASSWORD(?))';
        $user = $dbAstra->prepare($req);
        $user->execute(array($username, $email, $passwd));

        $_SESSION['error'] = "Compte créé";
        $_SESSION['id'] = $dbAstra -> lastInsertId();

        header("Location: ../views/index.php");
        exit;


    } else {
        //compte déjà existant
        $_SESSION['error'] = "Un compte existe déjà pour cette adresse mail";
        header("Location: ../views/register.php");
        exit;
    }
}


?>