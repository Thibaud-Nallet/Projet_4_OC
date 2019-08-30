<?php $title = "Profil | Blog de Jean Forteroche"; ?>

<?php ob_start() ?>

<!--******** FOND DE PAGE ********-->

    <?php include("../includes/nav_connected_user.php") ?>

    <!--******** PROFIL ********-->
    <section class="col-lg-6 offset-lg-3" id="infoProfil">
        <h2> Profil de <a> Pseudo </a> </h2>
        <p> Email : </p>
        <p> Date d'inscription : </p>
        <p> Statut : </p>
        <p> <a href="editProfil.php"> Editer mon profil </a></p>
    </section>



<?php $content = ob_get_clean(); ?>

<?php require("../template.php"); ?>