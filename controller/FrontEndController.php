<?php

require("model/FrontEndManager.php");

class FrontEndController
{
    //PAGE D'ACCUEIL
    public function welcomeHome()
    {
        require('view/home.php');
    }
    //PAGE BLOG
    public function listPosts()
    {
        $req = new FrontEndManager;
        $posts = $req->getPosts();
        require('view/blog.php');
    }
    //PAGE ARTICLE SELECTIONNE
    public function post()
    {
        //AFFICHE L'ARTICLE
        $req = new FrontEndManager;
        $post = $req->getPost($_GET['id']);
        //$_SESSION['idPost'] = $post['id'];
        //AFFICHE LES COMMENTAIRES
        $comments = $req->getComments($_GET['id']);
        require('view/post.php');
    }

    public function contact()
    {
        require("view/formContact.php");
    }

    public function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = nl2br($data);
        return $data;
    }

    public function login()
    {
        if (!empty($_POST)) {
            $check = new FrontEndController;
            $mailConnect = $check->checkInput($_POST['mailConnect']);
            $mdpConnect = $check->checkInput($_POST['passwordConnect']);

            if (!empty($mailConnect) && !empty($mdpConnect)) {
                $req = new FrontEndManager;
                $userExist = $req->checkUserDb();
                if ($userExist == 1) {
                    $userInfo = $req->userConnected();
                    $_SESSION['userId'] = $userInfo['id'];
                    $_SESSION['pseudo'] = $userInfo['pseudo'];
                    $_SESSION['email'] = $userInfo['email'];
                    header("Location: index.php?action=homeProfil&id=" . $_SESSION['userId']);
                } else {
                    $erreur = "Echec de l'authentification";
                }
            } else {
                $erreur = "Tous les champs doivent être remplis";
            }
        }
        require("view/formConnection.php");
    }

    public function comeBackProfil()
    {
        header("Location: index.php?action=homeProfil&id=" . $_SESSION['userId']);
    }

    public function inscription()
    {
        if (!empty($_POST)) {
            $erreur = null;
            $check = new FrontEndController;
            $inputPseudo =  $check->checkInput($_POST['inputPseudo']);
            $inputMail = $check->checkInput($_POST['inputMail']);
            $inputPassword = $check->checkInput($_POST['inputPassword']);
            $verifInputPassword = $check->checkInput($_POST['verifInputPassword']);

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
                    $req = new FrontEndManager;
                    $mailexist = $req->verifMailDb();
                    if ($mailexist == 0) {
                        $insertMember = $req->insertUserDb();
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

    public function homeProfil()
    {
        $req = new FrontEndManager;
        $userInfo = $req->viewProfil();
        require("view/gestionProfil.php");
    }

    public function editProfil()
    {
        if (isset($_SESSION['userId'])) {
            $check = new FrontEndController;
            $req = new FrontEndManager;
            $user = $req->checkUser();
            if (isset($_POST['input_NewPseudo']) and !empty($_POST['input_NewPseudo']) and $_POST['input_NewPseudo'] != $user['pseudo']) {
                $newPseudo = $check->checkInput($_POST['input_NewPseudo']);
                $insertPseudo = $req->upPseudo();
                header("Location: index.php?action=homeProfil&id=" . $_SESSION['userId']);
            }
            if (isset($_POST['input_NewMail']) and !empty($_POST['input_NewMail']) and $_POST['input_NewMail'] != $user['mail']) {
                $newMail = $check->checkInput($_POST['input_NewMail']);
                $insertMail = $req->upMail();
                header("Location: index.php?action=homeProfil&id=" . $_SESSION['userId']);
            }
            if (isset($_POST['input_NewPassword']) and !empty($_POST['input_NewPassword']) and isset($_POST['verifInput_NewPassword']) and !empty($_POST['verifInput_NewPassword'])) {
                $input_NewPassword = $check->checkInput($_POST['input_NewPassword']);
                $verifInput_NewPassword = $check->checkInput($_POST['verifInput_NewPassword']);
                if ($input_NewPassword == $verifInput_NewPassword) {
                    $insertPassword = $req->upPassword();
                    header("Location: index.php?action=homeProfil&id=" . $_SESSION['userId']);
                } else {
                    $erreur = "Vos deux mdp ne correspondent pas !";
                }
            }
        }
        require("view/editProfil.php");
    }

    public function deconnectProfil()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        header("Location: index.php?action=welcomeHome");
    }

    public function newComment()
    {
        if (!empty($_POST)) {
            $erreur = null;
            if (empty($_POST['pseudoComment']) && !empty($_POST['textComment'])) {
                $erreur = "Tous les champs doivent être complétés !";
            }
            header("Location: index.php?action=post&id=" . $_SESSION['idPost']);
        }




        /*if (!empty($_POST['pseudoComment']) && !empty($_POST['textComment'])) {
        $erreur = null;
        $pseudoComment = checkInput($_POST['pseudoComment']);
        $textComment = checkInput($_POST['textComment']);
        $comment = postComment($_POST['textComment'], $_SESSION['id'], $_GET['id']);
        $erreur = "Votre commentaire a bien été créé !";
        
    }
    else
    {
        $erreur = "Tous les champs doivent être complétés !";
    }
    header("Location: index.php?action=post&id=" . $_GET['id']);
    */
    }
}
