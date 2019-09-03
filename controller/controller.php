<?php

require_once("model/model.php");

function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function welcomeHome()
{

    require('view/home.php');
}

function listPosts()
{
    $posts = getPosts();
    require('view/blog.php');
}

function post()
{
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    require('view/post.php');
}

function contact()
{
    require("view/formContact.php");
}

function login()
{
    if (!empty($_POST)) {
        $mailConnect = checkInput($_POST['mailConnect']);
        $mdpConnect = checkInput($_POST['passwordConnect']);

        if (!empty($mailConnect) && !empty($mdpConnect)) {
            $userExist = checkUserDb();
            if ($userExist == 1) {
                $userInfo = userConnected();
                $_SESSION['id'] = $userInfo['id'];
                $_SESSION['pseudo'] = $userInfo['pseudo'];
                $_SESSION['email'] = $userInfo['email'];
                header("Location: index.php?action=homeProfil&id=" . $_SESSION['id']);
            } else {
                $erreur = "Echec de l'authentification";
            }
        } else {
            $erreur = "Tous les champs doivent être remplis";
        }
    }
    require("view/formConnection.php");
}

function inscription()
{
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
    require("view/formInscription.php");
}

function homeProfil()
{
    $userInfo = viewProfil();
    require("view/gestionProfil.php");
}

function editProfil()
{
    if (isset($_SESSION['id'])) {
        $user = checkUser();
        if (isset($_POST['input_NewPseudo']) and !empty($_POST['input_NewPseudo']) and $_POST['input_NewPseudo'] != $user['pseudo']) {
            $newPseudo = checkInput($_POST['input_NewPseudo']);
            $insertPseudo = upPseudo();
            header("Location: index.php?action=homeProfil&id=" . $_SESSION['id']);
        }
        if (isset($_POST['input_NewMail']) and !empty($_POST['input_NewMail']) and $_POST['input_NewMail'] != $user['mail']) {
            $newMail = checkInput($_POST['input_NewMail']);
            $insertMail = upMail();
            header("Location: index.php?action=homeProfil&id=" . $_SESSION['id']);
        }
        if (isset($_POST['input_NewPassword']) and !empty($_POST['input_NewPassword']) and isset($_POST['verifInput_NewPassword']) and !empty($_POST['verifInput_NewPassword'])) {
            $input_NewPassword = checkInput($_POST['input_NewPassword']);
            $verifInput_NewPassword = checkInput($_POST['verifInput_NewPassword']);
            if ($input_NewPassword == $verifInput_NewPassword) {
                $insertPassword = upPassword();
                header("Location: index.php?action=homeProfil&id=" . $_SESSION['id']);
            } else {
                $erreur = "Vos deux mdp ne correspondent pas !";
            }
        }
    }
    require("view/editProfil.php");
}

function deconnectProfil()
{
    session_start();
    $_SESSION = array();
    session_destroy();
    header("Location: index.php?action=welcomeHome");
}

/*function newComment()
{
    if (!empty($_POST)) {
    $affectedLines = postComment();
    
}
    require('view/post.php');
   if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=post&id=' . $postId);
    }
   
   
} */
