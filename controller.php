<?php

function login()
{
    require("connection.php");
}

function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function inscription()
{
    require("model.php");

    if (!empty($_POST)) {
        $erreur = null;
        $inputPseudo = checkInput($_POST['inputPseudo']);
        $inputMail = checkInput($_POST['inputMail']);
        $inputPassword = checkInput($_POST['inputPassword']);
        $verifInputPassword = checkInput($_POST['verifInputPassword']);

        $validation = "true";
        if (empty($_POST['inputPseudo']) || empty($_POST['inputMail']) || empty($_POST['inputPassword']) || empty($_POST['verifInputPassword'])) {
            $validation = "false";
            $erreur = "Tous les champs doivent être complétés !";
        }
        if (strlen($_POST['inputMail']) > 100 || strlen($_POST['inputPseudo']) > 100) {
            $validation = "false";
            $erreur = "Votre pseudo ne doit pas dépasser 100 caractères";
        }
        if ($inputPassword !== $verifInputPassword) {
            $validation = "false";
            $erreur = "Vos mots de passes ne correspondent pas";
        }
        if (!(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $inputMail))) {
            $validation = "false";
            $erreur = "Cette adresse mail n'est pas valide";
        }
        if ($validation == "true") {
            //Verifie si le email existe déjà dans la bdd
            if (filter_var($inputMail, FILTER_VALIDATE_EMAIL)) {
                $mailexist = verifMailDb();
                if ($mailexist == 0) {
                    $insertMember = insertUserDb();
                    $erreur = "Votre compte a bien été créé !";
                    // redirection vers la page de connexion
                    header('Location: index.php?action=login');
                } else {
                    $erreur = "Cette adresse email n'est plus disponible";
                }
            } 
        }
    }
    require("inscription.php");
}

/*
    connectDb();
    $reqmail = $bdd->prepare("SELECT email FROM user WHERE email = ?");
    $reqmail->execute(array($inputMail));
    $mailexist = $reqmail->rowCount();
    if ($mailexist == 0) {
        if ($inputPassword == $verifInputPassword) {
            $insertMember = $bdd->prepare("INSERT INTO user(pseudo, email, pass, date_inscription) VALUES(?, ?, ?, CURDATE())");
            $insertMember->execute(array($inputPseudo, $inputMail, $inputPassword));
            $erreur = "Votre compte a bien été créé !";
        }
    }
}*/
