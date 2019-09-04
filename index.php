<?php
session_start();

require("controller/FrontEndController.php");
require("controller/BackEndController.php");

$frontEnd = new FrontEndController;
$backEnd = new BackEndController;

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
            echo 'Erreur : aucun identifiant de billet envoyé';
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
        }
    } elseif ($_GET["action"] == "homeProfilAdmin") {
        if (isset($_SESSION['userId']) && $_SESSION['userId'] > 0 && $_SESSION['statut'] == "admin") {
            $backEnd->homeProfilAdmin();
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
        $frontEnd->editProfil();
    } elseif ($_GET["action"] == "newComment") {
        //if (isset($_GET['id']) && $_GET['id'] > 0) {
        $frontEnd->newComment();
        //}
    } elseif ($_GET["action"] == "comeBackProfil") {
        $frontEnd->comeBackProfil();
    }
}
//Lancement de la page d'accueil si aucune action
else {
    $frontEnd->welcomeHome();
}
