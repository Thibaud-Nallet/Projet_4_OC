<?php

require("model/BackEndManager.php");

class BackEndController
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

    public function homeProfilAdmin()
    {
        require("view/backend/admin/homeAdmin.php");
    }

    /* ---------------- REVENIR A LA PAGE D'ACCUEIL -------------------- */
    public function comeBackProfilAdmin()
    {
        header("Location: index.php?action=homeProfilAdmin");
    }

    /* ----------------------------------------------------------------- */
    /* --               LISTE DE TOUS LES ARTICLES                    -- */
    /* ----------------------------------------------------------------- */

    public function listPostAdmin()
    {
        $req = new BackEndManager;
        $postsAdmin = $req->getPostsAdmin();
        require("view/backend/post/listPostAdmin.php");
    }

    /* --------------- SELECTIONNE LE POST DESIRE -------------------- */
    public function deletePostAdmin()
    {
        $req = new BackEndManager;
        $check = new BackEndController;
        $check->checkInput($_GET['id']);
        $postAdmin = $req->getPostAdmin($_GET["id"]);
        require("view/backend/post/deletePostAdmin.php");
    }

    /* ---------------- SUPPRIME LE POST DESIRE --------------------- */
    public function delete()
    {
        if (isset($_POST)) {
            $req = new BackEndManager;
            $check = new BackEndController;
            $check->checkInput($_GET['id']);
            $delete_post_comments = $req->deleteCommentsPost($_GET["id"]);
            $delete_post = $req->deletePost($_GET["id"]);
        }
        header("Location: index.php?action=listPostAdmin");
    }

    /* --------------- EDITER LE POST DESIRE ----------------------- */
    public function editPostAdmin()
    {
        if (isset($_GET['id'])) {
            $check = new BackEndController;
            $req = new BackEndManager;
            if (isset($_POST['input_NewTitle']) && !empty($_POST['input_NewTitle']) && isset($_POST['input_NewContent']) && !empty($_POST['input_NewContent'])) {
                $check->checkInput($_POST["input_NewTitle"]);
                $check->checkInput($_POST["input_NewContent"]);
                $check->checkInput($_GET['id']);
                $new_title = $req->editPost($_POST['input_NewTitle'], $_POST['input_NewContent'], $_GET['id']);
                header("Location: index.php?action=listPostAdmin");
            }
        }
        $postAdmin = $req->getPostAdmin($_GET["id"]);
        require("view/backend/post/editPost.php");
    }

    /* ----------------------------------------------------------------- */
    /* --               REDIGER UN NOUVEAU ARTICLE                    -- */
    /* ----------------------------------------------------------------- */

    public function writePostAdmin()
    {
        if (!empty($_POST)) {
            $erreur = null;
            if (!empty($_POST["input_Title"])) {
                if (!empty($_POST["input_Content"])) {
                    $req = new BackEndManager;
                    $check = new BackEndController;
                    $check->checkInput($_POST["input_Title"]);
                    $check->checkInput($_POST["input_Content"]);
                    $write_post = $req->writePost($_SESSION["userId"], $_POST["input_Title"], $_POST["input_Content"]);
                    $erreur = "Votre article a été publié !";
                } else {
                    $erreur = "Et un article !";
                }
            } else {
                $erreur = "Il faut un titre";
            }
        }
        require("view/backend/post/writePostAdmin.php");
    }

    /* ----------------------------------------------------------------- */
    /* --             LISTE DE TOUS LES COMMENTAIRES                  -- */
    /* ----------------------------------------------------------------- */

    /* -------------- PAGINE ET LISTE LES COMMENTAIRES ------------------ */
    public function listCommentsAdmin()
    {
        $req = new BackEndManager;
        $check = new BackEndController;
        $messagesParPage = 5;
        $total = $req->totalComment();
        $nombreDePages = ceil($total / $messagesParPage);
        if (isset($_GET['page'])) {
            $pageActuelle = intval($_GET['page']);
            if ($pageActuelle > $nombreDePages) {
                $pageActuelle = $nombreDePages;
            }
        } else {
            $pageActuelle = 1;
        }
        $premiereEntree = ($pageActuelle - 1) * $messagesParPage;
        $pseudoCommentAdmin = $req->getCommentsAdmin($premiereEntree, $messagesParPage);
        require("view/backend/comment/listCommentsAdmin.php");
    }

    /* -------------- SUPPRIME UN COMMENTAIRE SIGNALE -------------------- */
    public function deleteComments()
    {
        if (isset($_POST)) {
            $req = new BackEndManager;
            $check = new BackEndController;
            $check->checkInput($_GET['id']);
            $delete_comment = $req->deleteComment($_GET['id']);
        }
        header("Location: index.php?action=listCommentsAdmin");
    }
}
