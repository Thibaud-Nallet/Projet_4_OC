<?php
session_start();

//Connexion BDD
$bdd = new PDO('mysql:host=localhost;dbname=jeanForteroche;charset=utf8', 'root', 'root');

if (isset($_GET['id']) and $_GET['id'] > 0) {
    $getId = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM user WHERE id = ?');
    $requser->execute(array($getId));
    $userInfo = $requser->fetch();
}
?>

<?php $title = "Profil | Blog de Jean Forteroche"; ?>

<?php ob_start() ?>

<!--******** FOND DE PAGE ********-->

<?php /*include("includes/nav_connected_user.php") */ ?>

<!--******** PROFIL ********-->
<section class="col-lg-6 offset-lg-3" id="infoProfil">
    <h2> Profil de <?= $userInfo['pseudo'] ?> </h2>
    <p> Email : <?= $userInfo['email'] ?> </p>
    <p> Date d'inscription : <?= $userInfo['date_inscription'] ?> </p>
    <p> Statut : <?= $userInfo['statut'] ?> </p>

    <?php
    if (isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id']) {
        ?>
        <p> <a href="editProfil.php"> Editer mon profil </a></p>
        <p> <a href="deconnection.php"> Se déconnecter </a></p>
    <?php
    }
    ?>

</section>

<?php $content = ob_get_clean(); ?>

<?php require("includes/template.php"); ?>