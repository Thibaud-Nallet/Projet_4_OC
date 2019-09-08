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

    public function homeProfilAdmin()
    {
        require("view/homeAdmin.php");
    }

    public function comeBackProfilAdmin()
    {
        header("Location: index.php?action=homeProfilAdmin");
    }

    public function listPostAdmin()
    {
        $req = new BackEndManager;
        $postsAdmin = $req->getPostsAdmin();
        require("view/listPostAdmin.php");
    }

    public function listCommentsAdmin()
    {
        $req = new BackEndManager;
        $check = new BackEndController;

        $messagesParPage = 5;
        $total = $req->totalComment(); //Donne le nombre total de commentaires : soit 13

        $nombreDePages = ceil($total / $messagesParPage); //Donne le nombre de pages à créer : soit 3 

        if (isset($_GET['page'])) // Si la variable $_GET['page'] existe...
        {
            $pageActuelle = intval($_GET['page']);

            if ($pageActuelle > $nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
            {
                $pageActuelle = $nombreDePages;
            }
        } else // Sinon
        {
            $pageActuelle = 1; // La page actuelle est la n°1    
        }
        $premiereEntree = ($pageActuelle - 1) * $messagesParPage; // On calcul la première entrée à lire

        $pseudoCommentAdmin = $req->getCommentsAdmin($premiereEntree, $messagesParPage);
        $titleCommentAdmin = $req->regetCommentsAdmin();

        require("view/listCommentsAdmin.php");
    }

    public function deletePostAdmin()
    {
        $req = new BackEndManager;
        $check = new BackEndController;
        $check->checkInput($_GET['id']);
        $postAdmin = $req->getPostAdmin($_GET["id"]);
        require("view/deletePostAdmin.php");
    }

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
        require("view/editPost.php");
    }

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
        require("view/writePostAdmin.php");
    }
}
