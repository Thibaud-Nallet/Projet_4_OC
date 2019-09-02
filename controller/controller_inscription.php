<?php
// Chargement des classes
require_once('model/InscriptionManager.php');
function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function verifInscription()
{
    if (isset($_POST['inscription'])) {
        //Faille XSS du formulaire d'inscription
        $pseudo = checkInput($_POST['inputIdentifiant']);
        $email = checkInput($_POST['inputMail']);
        $pass = checkInput($_POST['inputPassword']);
        $passVerif = checkInput($_POST['verifInputPassword']);
        // Verification de l'existance du pseudo dans la BDD
        //$nb_pseudo = check_pseudo($_POST['pseudo']);

        // Regex pour vérifier l'email
        if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {
            $email_valide = true;
        }

        //Vérifie les données de l'inscription 
        //Vérifie le pseudo : si le pseudo est déjà déclaré ou qu'il est vide => message d'erreur
        if (!isset($pseudo) or empty($pseudo)) {
            $message = 'Veuillez saisir un nouveau pseudo, il est soit vide soit déjà existant.';
        } //if pseudo
        //Vérifie le mdp : mdp déjà délaré, nul ou différent de la vérif => message d'erreur
        elseif (
            !isset($pass) or !isset($passVerif) or empty($pass) or empty($passVerif)
            or $pass != $passVerif) 
            {
            echo "<script> alert('Les deux mots de passes ne sont pas identiques, veuillez les saisir à nouveau !')</script>";
        } //elseif mdp
        //Vérifie l'email
        elseif (!isset($email) or empty($email)) {
            echo "<script> alert('L'adresse e-mail n'est pas valide !')</script>";
        } //elseif email
        else {
            // Hachage du mot de passe
            //$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            //Enregistre le membre dans la bdd
            $incription = new Inscription();
            $newUser = $incription->newUser($pseudo, $pass, $email);
            echo ' <script> alert("Vous avez été inscrit" </script> ';
    //Fait appel à la gestion du profil
    /*require('view/gestionProfil.php');*/
    //Changer le bandeau de navigation
    //Demarre une session ??
        }
    } //if isset
}