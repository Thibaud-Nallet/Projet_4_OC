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

    public function writePostAdmin() {
        require("view/writePostAdmin.php");
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
}