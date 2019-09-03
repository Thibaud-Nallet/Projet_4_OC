<?php $title = "Profil | Blog de Jean Forteroche"; ?>

<?php ob_start() ?>

<!--******** FOND DE PAGE ********-->

<?php include("includes/navigation.php") ?>

<!--******** PROFIL ********-->
<section class="col-lg-6 offset-lg-3" id="infoProfil">
    <h2> Profil de <?= $userInfo['pseudo'] ?> </h2>
    <p> Email : <?= $userInfo['email'] ?> </p>
    <p> Date d'inscription : <?= $userInfo['date_inscription'] ?> </p>
    <p> Statut : <?= $userInfo['statut'] ?> </p>

    <?php
    //Sécurité qu'on ne puisse editer que son profil en changeant l'url
    if (isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id']) {
        ?>
        <p> <a href="index.php?action=editProfil"> Editer mon profil </a></p>
    <?php
    }
    ?>

</section>

<?php $content = ob_get_clean(); ?>

<?php require("includes/template.php"); ?>