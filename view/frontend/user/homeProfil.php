<?php $title = "Profil | Blog de Jean Forteroche"; ?>

<?php ob_start() ?>

<!--******** BACKGROUND ********-->
<?php include("./view/includes/navigation.php") ?>

<!--******** HOME PROFIL ********-->
<section class="col-lg-6 offset-lg-3" id="infoProfil">
    <h2> Profil de <?= $userInfo['pseudo'] ?> </h2>
    <p> Email : <?= $userInfo['email'] ?> </p>
    <p> Date d'inscription : <?= $userInfo['date_inscription'] ?> </p>
    <p> Statut : <?= $userInfo['statut'] ?> </p>
    <?php
    //Sécurité qu'on ne puisse editer que son profil en changeant l'url
    if (isset($_SESSION['userId']) and $userInfo['id'] == $_SESSION['userId']) {
        ?>
        <p> <a href="index.php?action=editProfil"> Editer mon profil </a></p>
    <?php } ?>
</section>

<?php include("./view/includes/footer.php"); ?>

<?php $content = ob_get_clean(); ?>

<?php require("./view/includes/template.php"); ?>