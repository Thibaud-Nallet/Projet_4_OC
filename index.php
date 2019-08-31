<?php
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
    //Routeur post_inscrivez-vous & connexion_inscrivez-vous
    elseif($_GET["action"] == "inscription") {
        inscription();
    }
    //Routeur nav_contact
    elseif($_GET["action"] == "formContact") {
        formContact();
    }
    //Routeur nav_connexion & post_connexion & footer_connexion
    elseif($_GET["action"] == "connection") {
        connection();
    }
} 
//Entrée première fois
else {
    welcomeHome();
}
