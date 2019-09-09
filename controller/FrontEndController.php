<?php

require("model/FrontEndManager.php");

class FrontEndController
{
    public function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = nl2br($data);
        return $data;
    }

    /* ----------------------------------------------------------------- */
    /* --                     PAGE D'ACCUEIL                          -- */
    /* ----------------------------------------------------------------- */

    public function welcomeHome()
    {
        require('view/home.php');
    }

    /* ----------------------------------------------------------------- */
    /* --                     PAGE DU BLOG                            -- */
    /* ----------------------------------------------------------------- */

    public function listPosts()
    {
        $req = new FrontEndManager;
        $posts = $req->getPosts();
        require('view/blog.php');
    }

    /* ------------------ PAGE ARTICLE SELECTIONNE -------------------- */

    public function post()
    {
        $req = new FrontEndManager;
        //Verif de l'url
        $maxPost = $req->maxPost();
        if ($_GET["id"] <= $maxPost) {
            $post = $req->getPost($_GET['id']);
        } else {
            throw new Exception("Cet id n'existe pas");
        }
        //Pagination des commentaires
        $messagesParPage = 3;
        $total = $req->totalComment($_GET['id']);
        $result = $total["nb_lignes"];
        $nombreDePages = intval(ceil($result / $messagesParPage));
        if (isset($_GET['page'])) {
            $pageActuelle = intval($_GET['page']);
            if ($pageActuelle > $nombreDePages) {
                $pageActuelle = $nombreDePages;
            }
        } else {
            $pageActuelle = 1;
        }
        $premiereEntree = ($pageActuelle - 1) * $messagesParPage;
        $retour_messages = $req->retourMessages($premiereEntree, $messagesParPage);
        $comments = $req->getComments($_GET['id'], $premiereEntree, $messagesParPage);
        require('view/post.php');
    }

    /* ------------------ PAGE DES COMMENTAIRES-------------------- */

    public function newComment()
    {
        if (!empty($_POST['pseudoComment']) && !empty($_POST['textComment'])) {
            $check = new FrontEndController;
            $req = new FrontEndManager;
            $erreur = null;
            $pseudoComment = $check->checkInput($_POST['pseudoComment']);
            $textComment = $check->checkInput($_POST['textComment']);
            $idPost = $check->checkInput($_POST['idPost']);
            $comment = $req->postComment($_POST['textComment'], $_SESSION['userId'], $idPost);
            $erreur = "code0";
        } else {
            $erreur = "code1";
        }
        header("Location: index.php?action=post&id=" . $_POST['idPost'] . "&erreur=" . $erreur . "#postComments");
    }

    public function signalComment()
    {
        $req = new FrontEndManager;
        $check = new FrontEndController;
        $check->checkInput($_POST['idSignal']);
        $check->checkInput($_POST['idPost']);
        $commentAlert = $req->signalComment($_POST["idSignal"]);
        header("Location:index.php?action=post&id=" . $_POST['idPost']);
    }

    /* ----------------------------------------------------------------- */
    /* --                     PAGE CONNEXION                          -- */
    /* ----------------------------------------------------------------- */

    public function login()
    {
        if (!empty($_POST)) {
            $check = new FrontEndController;
            $mailConnect = $check->checkInput($_POST['mailConnect']);
            $mdpConnect = $check->checkInput($_POST['passwordConnect']);
            if (!empty($mailConnect) && !empty($mdpConnect)) {
                $req = new FrontEndManager;
                $userExist = $req->checkUserDb($_POST["mailConnect"], $_POST["passwordConnect"]);
                if ($userExist == 1) {
                    $userInfo = $req->userConnected($_POST["mailConnect"], $_POST["passwordConnect"]);
                    $_SESSION['userId'] = $userInfo['id'];
                    $_SESSION['pseudo'] = $userInfo['pseudo'];
                    $_SESSION['email'] = $userInfo['email'];
                    $_SESSION['statut'] = $userInfo['statut'];
                    if ($_SESSION['statut'] == "admin") {
                        header("Location: index.php?action=homeProfilAdmin");
                    } else {
                        header("Location: index.php?action=homeProfil&id=" . $_SESSION['userId']);
                    }
                } else {
                    $erreur = "Echec de l'authentification";
                }
            } else {
                $erreur = "Tous les champs doivent être remplis";
            }
        }
        require("view/formConnection.php");
    }

    /* ----------------------------------------------------------------- */
    /* --                    PAGE INSCRIPTION                         -- */
    /* ----------------------------------------------------------------- */

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
                    $mailexist = $req->verifMailDb($_POST["inputMail"]);
                    if ($mailexist == 0) {
                        $insertMember = $req->insertUserDb($_POST["inputPseudo"], $_POST["inputMail"], $_POST["inputPassword"]);
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

    /* ----------------------------------------------------------------- */
    /* --                     PAGE DU PROFIL                          -- */
    /* ----------------------------------------------------------------- */

    public function homeProfil()
    {
        $req = new FrontEndManager;
        $maxProfil = $req->maxProfil();
        if ($_GET["id"] <= $maxProfil) {
            $userInfo = $req->viewProfil();
        } else {
            throw new Exception("Cet id n'existe pas");
        }
        require("view/homeProfil.php");
    }

    public function editProfil()
    {
        if (isset($_SESSION['userId'])) {
            $check = new FrontEndController;
            $req = new FrontEndManager;
            $user = $req->checkUser($_SESSION['userId']);
            if (isset($_POST['input_NewPseudo']) and !empty($_POST['input_NewPseudo']) and $_POST['input_NewPseudo'] != $user['pseudo']) {
                $newPseudo = $check->checkInput($_POST['input_NewPseudo']);
                $insertPseudo = $req->upPseudo($_POST['input_NewPseudo'], $_SESSION['userId']);
                header("Location: index.php?action=homeProfil&id=" . $_SESSION['userId']);
            }
            if (isset($_POST['input_NewMail']) and !empty($_POST['input_NewMail']) and $_POST['input_NewMail'] != $user['mail']) {
                $newMail = $check->checkInput($_POST['input_NewMail']);
                $insertMail = $req->upMail($_POST['input_NewMail'], $_SESSION['userId']);
                header("Location: index.php?action=homeProfil&id=" . $_SESSION['userId']);
            }
            if (isset($_POST['input_NewPassword']) and !empty($_POST['input_NewPassword']) and isset($_POST['verifInput_NewPassword']) and !empty($_POST['verifInput_NewPassword'])) {
                $input_NewPassword = $check->checkInput($_POST['input_NewPassword']);
                $verifInput_NewPassword = $check->checkInput($_POST['verifInput_NewPassword']);
                if ($input_NewPassword == $verifInput_NewPassword) {
                    $insertPassword = $req->upPassword($_POST['input_NewPassword'], $_SESSION['userId']);
                    header("Location: index.php?action=homeProfil&id=" . $_SESSION['userId']);
                } else {
                    $erreur = "Vos deux mdp ne correspondent pas !";
                }
            }
        }
        require("view/editProfil.php");
    }

    public function comeBackProfil()
    {
        header("Location: index.php?action=homeProfil&id=" . $_SESSION['userId']);
    }

    public function deconnectProfil()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        header("Location: index.php?action=welcomeHome");
    }

    /* ----------------------------------------------------------------- */
    /* --                       PAGE ERREUR                           -- */
    /* ----------------------------------------------------------------- */

    public function error()
    {
        $_SESSION = array();
        session_destroy();
        $_GET["action"] = "error";
        require("view/error.php");
    }
}
