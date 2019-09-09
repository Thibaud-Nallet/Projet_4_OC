<?php
session_start();

require("controller/FrontEndController.php");
require("controller/BackEndController.php");

$frontEnd = new FrontEndController;
$backEnd = new BackEndController;

try {
    if (isset($_GET["action"])) {
        /* ------------------------------------------------------- */
        /* --                 PARTIE FRONT-END                  -- */
        /* ------------------------------------------------------- */
        if ($_GET["action"] == "welcomeHome") {
            $frontEnd->welcomeHome();
        } elseif ($_GET["action"] == "listPosts") {
            $frontEnd->listPosts();
        } elseif ($_GET["action"] == "post") {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $frontEnd->post();
            } else {
                throw new Exception("Erreur : cette page n'existe pas");
            }
        } elseif ($_GET["action"] == "newComment") {
            $frontEnd->newComment();
        } elseif ($_GET["action"] == "signalComment") {
            $frontEnd->signalComment();
            /* ------------------------------------------------------- */
            /* --          PARTIE INSCRIPTION/CONNEXION             -- */
            /* ------------------------------------------------------- */
        } elseif ($_GET["action"] == "inscription") {
            $frontEnd->inscription();
        } elseif ($_GET["action"] == "login") {
            $frontEnd->login();
        } elseif ($_GET["action"] == "deconnectProfil") {
            $frontEnd->deconnectProfil();
        } elseif ($_GET["action"] == "homeProfil") {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $frontEnd->homeProfil();
            } else {
                throw new Exception("Erreur : cette page n'existe pas");
            }
        } elseif ($_GET["action"] == "editProfil") {
            if (isset($_SESSION['userId']) && $_SESSION["userId"] > 0) {
                $frontEnd->editProfil();
            } else {
                throw new Exception("Erreur : cette page n'existe pas");
            }
        } elseif ($_GET["action"] == "comeBackProfil") {
            $frontEnd->comeBackProfil();
            /* ------------------------------------------------------- */
            /* --              PARTIE ADMIN - ACCUEIL               -- */
            /* ------------------------------------------------------- */
        } elseif ($_GET["action"] == "homeProfilAdmin") {
            if (isset($_SESSION['userId']) && $_SESSION['userId'] > 0 && $_SESSION['statut'] == "admin") {
                $backEnd->homeProfilAdmin();
            } else {
                throw new Exception("Erreur : cette page n'existe pas");
            }
        } elseif ($_GET["action"] == "comeBackProfilAdmin") {
            $backEnd->comeBackProfilAdmin();
            /* ------------------------------------------------------- */
            /* --          PARTIE ADMIN - GESTION DES POSTS         -- */
            /* ------------------------------------------------------- */
        } elseif ($_GET["action"] == "listPostAdmin") {
            $backEnd->listPostAdmin();
        } elseif ($_GET["action"] == "editPostAdmin") {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $backEnd->editPostAdmin();
            } else {
                throw new Exception("Erreur : cette page n'existe pas");
            }
        } elseif ($_GET["action"] == "editPost") {
            $backEnd->editPost();
        } elseif ($_GET["action"] == "deletePostAdmin") {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $backEnd->deletePostAdmin();
            }
        } elseif ($_GET["action"] == "delete") {
            //Page confirmation
            $backEnd->delete();
            /* ------------------------------------------------------- */
            /* --           PARTIE ADMIN - ECRIRE ARTICLE           -- */
            /* ------------------------------------------------------- */
        } elseif ($_GET["action"] == "writePostAdmin") {
            $backEnd->writePostAdmin();
            /* ------------------------------------------------------- */
            /* --          PARTIE ADMIN - GESTION DES COMS          -- */
            /* ------------------------------------------------------- */
        } elseif ($_GET["action"] == "listCommentsAdmin") {
            $backEnd->listCommentsAdmin();
        } elseif ($_GET["action"] == "deleteComments") {
            $backEnd->deleteComments();
        } else {
            throw new Exception("Erreur : cette page n'existe pas");
        }
    } else {
        $frontEnd->welcomeHome();
    }
} catch (Exception $e) {
    $frontEnd->error();
    echo $e->getMessage();
}
