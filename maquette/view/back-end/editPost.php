<?php $title = "Interface Admin | Ecrire un article"; ?>

<?php ob_start(); ?>

<?php include("../includes/nav_connected_admin.php"); ?>

<!--******** ECRIRE UN ARTICLE ********-->
<p class="comeBack"> Revenir à l'écran de gestion <a href="gestionPost.php"><i class="far fa-times-circle fa-lg"></i> </a> </p>
<section class="col-md-10 offset-md-1" id="interfaceAdmin" id="test">
    <h2> Modifiez un article </h2>

    Voir Tiny


</section>
<?php $content = ob_get_clean(); ?>

<?php require("../template.php"); ?>