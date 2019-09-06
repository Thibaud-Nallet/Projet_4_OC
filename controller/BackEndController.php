<?php

require("model/BackEndManager.php");



class BackEndController
{
    
    public function homeProfilAdmin()
    {
        require("view/homeAdmin.php");
    }

    public function comeBackProfilAdmin()
    {
        header("Location: index.php?action=homeProfilAdmin");
    }

    public function listPostAdmin(){
        $req = new BackEndManager;
        $postsAdmin = $req->getPostsAdmin();
        require("view/listPostAdmin.php");
    }

    

    public function listCommentsAdmin() {
        $req = new BackEndManager;

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

        //$retour_messages = $req->retourMessages($premiereEntree, $messagesParPage);
        $pseudoCommentAdmin = $req->getCommentsAdmin($premiereEntree, $messagesParPage);
        $titleCommentAdmin = $req->regetCommentsAdmin();

        require("view/listCommentsAdmin.php");
    }

    public function deletePostAdmin(){
        $req = new BackEndManager;
        $postAdmin = $req->getPostAdmin($_GET["id"]);
        require("view/deletePostAdmin.php");
    }

    public function delete() {
       if(isset($_POST)) {
            $req = new BackEndManager;
            $delete_post= $req->deletePost($_GET["id"]);
            $delete_post_comments = $req->deleteCommentsPost($_GET["id"]);
       }
        header("Location: index.php?action=listPostAdmin");
    }
    public function editPostAdmin() {
        if (isset($_GET['id'])) {
            $req = new BackEndManager;
            if (isset($_POST['input_NewTitle']) && !empty($_POST['input_NewTitle']) && isset($_POST['input_NewContent']) && !empty($_POST['input_NewContent'])) {
                $new_title = /*check*/ $_POST["input_NewTitle"];
                $new_title = $req->editPost($_POST['input_NewTitle'], $_POST['input_NewContent'], $_GET['id']);
                header("Location: index.php?action=listPostAdmin");
            }
        }
        $req = new BackEndManager;
        $postAdmin = $req->getPostAdmin($_GET["id"]);
        require("view/editPost.php");
    }

    public function editPost()
    {
        if (isset($_GET['id'])) {
        $req = new BackEndManager;
          
        if(isset($_POST["input_NewTitle"])) {
                
            $new_title = /*check*/ $_POST["input_NewTitle"];
            echo $new_title;
            die();
        }
    }
        //$upddate_post = $req->editPost($input_NewTitle, $input_NewContent, $id)
        header("Location:index.php?action=listPostAdmin");
    }
    public function deleteComments() {
       
        if(isset($_POST)){
            $req = new BackEndManager;
            $delete_comment = $req->deleteComment($_GET['id']);
        }
        header("Location: index.php?action=listCommentsAdmin");
    }

    public function writePostAdmin()
    {
        if(($_POST)) {
            $erreur = null;
            if (empty($_POST["input_Title"])) {
                $erreur = "Il faut un titre";
                
            }
            header("Location: index.php?action=comeBackProfilAdmin");
        }
        
        require("view/writePostAdmin.php");
    }

    
}
