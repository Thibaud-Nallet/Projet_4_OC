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
            if (isset($_GET['userId']) && $_GET["userId"] > 0) {
                $frontEnd->editProfil();
            } else {
                echo "Erreur : cette page n'existe pas";
            }
        } elseif ($_GET["action"] == "newComment") {
            //if (isset($_GET['id']) && $_GET['id'] > 0) {
            $frontEnd->newComment();
            //}
        } elseif ($_GET["action"] == "comeBackProfil") {
            $frontEnd->comeBackProfil();
        } elseif ($_GET["action"] == "listPostAdmin") {
            $backEnd->listPostAdmin();
        } elseif ($_GET["action"] == "writePostAdmin") {
            $backEnd->writePostAdmin();
        } elseif ($_GET["action"] == "listCommentsAdmin") {
            $backEnd->listCommentsAdmin();
        } else {
            throw new Exception("Erreur : cette page n'existe pas");
            $frontEnd->error();
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
