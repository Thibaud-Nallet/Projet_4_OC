<?php $title = "Interface Admin | Ecrire un article"; ?>

<?php ob_start(); ?>

<?php include("includes/navigation.php"); ?>
<!--******** ECRIRE UN ARTICLE ********-->
<p class="comeBack"> Revenir à l'écran de gestion <a href="index.php?action=comeBackProfilAdmin"><i class="far fa-times-circle fa-lg"></i> </a> </p>
<section class="col-md-10 offset-md-1" id="interfaceAdmin" id="test">
    <h2> Ecrivez un article </h2>

    Voir Tiny


</section>
<?php $content = ob_get_clean(); ?>

<?php require("includes/template.php"); ?>