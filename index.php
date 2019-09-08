<?php
session_start();

require("controller/FrontEndController.php");
require("controller/BackEndController.php");

$frontEnd = new FrontEndController;
$backEnd = new BackEndController;
try {
    if (isset($_GET["action"])) {
        //Routeur nav_accueil & logo
        if ($_GET["action"] == "welcomeHome") {
            $frontEnd->welcomeHome();
        }
        //Routeur nav_blog
        elseif ($_GET["action"] == "listPosts") {
            $frontEnd->listPosts();
        }
        //Routeur blog_bouton lire la suite
        elseif ($_GET["action"] == "post") {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $frontEnd->post();
            } else {
                throw new Exception("Erreur : cette page n'existe pas");
            }
        } elseif ($_GET["action"] == "signalComment") {
            $frontEnd->signalComment();
        }
        //Routeur nav_contact
        elseif ($_GET["action"] == "contact") {
            $frontEnd->contact();
        }
        //Routeur form_inscription
        elseif ($_GET["action"] == "inscription") {
            $frontEnd->inscription();
        }
        //Routeur form_connection
        elseif ($_GET["action"] == "login") {
            $frontEnd->login();
        }
        //Routeur gestionProfil
        elseif ($_GET["action"] == "homeProfil") {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $frontEnd->homeProfil();
            } else {
                throw new Exception("Erreur : cette page n'existe pas");
            }
        } elseif ($_GET["action"] == "homeProfilAdmin") {
            if (isset($_SESSION['userId']) && $_SESSION['userId'] > 0 && $_SESSION['statut'] == "admin") {
                $backEnd->homeProfilAdmin();
            } else {
                throw new Exception("Erreur : cette page n'existe pas");
            }
        } elseif ($_GET["action"] == "comeBackProfilAdmin") {
            $backEnd->comeBackProfilAdmin();
        }
        //Routeur deconnection du profil
        elseif ($_GET["action"] == "deconnectProfil") {
            $frontEnd->deconnectProfil();
        }
        //Routeur edition du profil
        elseif ($_GET["action"] == "editProfil") {
            if (isset($_SESSION['userId']) && $_SESSION["userId"] > 0) {
                $frontEnd->editProfil();
            } else {
                throw new Exception("Erreur : cette page n'existe pas");
            }
        }
        //Routeur nouveau commentaire page post
        elseif ($_GET["action"] == "newComment") {
            $frontEnd->newComment();
        }
        //Routeur lien pour revenir à la page d'accueil admin
        elseif ($_GET["action"] == "comeBackProfil") {
            $frontEnd->comeBackProfil();
        }
        //Routeur afficher tous les articles
        elseif ($_GET["action"] == "listPostAdmin") {
            $backEnd->listPostAdmin();
        }
        //Routeur de la page pour modifier un article
        elseif ($_GET["action"] == "editPostAdmin") {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $backEnd->editPostAdmin();
            } else {
                throw new Exception("Erreur : cette page n'existe pas");
            }
        }
        //Routeur qui edit le post
        elseif ($_GET["action"] == "editPost") {
            $backEnd->editPost();
        }
        //Routeur pour écrire un nouvel article
        elseif ($_GET["action"] == "writePostAdmin") {
            $backEnd->writePostAdmin();
        }
        //Routeur pour lister tous les commentaires 
        elseif ($_GET["action"] == "listCommentsAdmin") {
            $backEnd->listCommentsAdmin();
        }
        //Routeur pour la suppression d'un commentaires
        elseif ($_GET["action"] == "deleteComments") {
            $backEnd->deleteComments();
        }
        //Routeur pour la suppression d'un post et de tous ses commentaires
        elseif ($_GET["action"] == "deletePostAdmin") {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $backEnd->deletePostAdmin();
            }
        }
        //Routeur pour l'action de la supression du post (page confirmation)
        elseif ($_GET["action"] == "delete") {
            $backEnd->delete();
        } 
        // Sinon les actions ne sont pas connues envoye une erreur
        else {
            throw new Exception("Erreur : cette page n'existe pas");
        }
    }
    //Lancement de la page d'accueil si aucune action
    else {
        $frontEnd->welcomeHome();
    }
} //-- try --
catch (Exception $e) {
    $frontEnd->error();
    echo $e->getMessage();
}

//throw new Exception
