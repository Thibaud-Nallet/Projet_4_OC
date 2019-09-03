<?php
session_start();

require("controller/controller.php");

if (isset($_GET["action"])) {
    //Routeur nav_accueil & logo
    if ($_GET["action"] == "welcomeHome") {
        welcomeHome();
    }
    //Routeur nav_blog
    elseif ($_GET["action"] == "listPosts") {
        listPosts();
    }
    //Routeur blog_bouton lire la suite
    elseif ($_GET["action"] == "post") {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        } else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    //Routeur nav_contact
    elseif ($_GET["action"] == "contact") {
        contact();
    }
    //Routeur form_inscription
    elseif ($_GET["action"] == "inscription") {
        inscription();
    } 
    //Routeur form_connection
    elseif ($_GET["action"] == "login") {
        login();
    } 
    //Routeur gestionProfil
    elseif ($_GET["action"] == "homeProfil") {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            homeProfil();
        }
    } 
    //Routeur deconnection du profil
    elseif ($_GET["action"] == "deconnectProfil") {
        deconnectProfil();
    } 
    //Routeur edition du profil
    elseif ($_GET["action"] == "editProfil") {
        editProfil();
    }
    elseif ($_GET["action"] == "newComment") {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            newComment();
        }
    }
} 
//Lancement de la page d'accueil si aucune action
else {
    welcomeHome();
}
