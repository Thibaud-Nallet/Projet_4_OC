<?php $title = "Interface Admin | Liste articles"; ?>

<?php ob_start(); ?>

<?php include("includes/navigation.php"); ?>
<!--******** INTERFACE ADMIN ********-->
<p class="comeBack"> Revenir à l'écran de gestion <a href="index.php?action=homeProfilAdmin"><i class="far fa-times-circle fa-lg"></i> </a> </p>
<section class="col-md-10 offset-md-1" id="interfaceAdmin" id="test">
    <h2> Liste des articles </h2>


    <article id="gestionArticle">
        <div class="row" id="ligneArticle">
            <div class="col-md-1 offset-md-1 effetArticle">
                <p> Id </p>
            </div>
            <div class="col-md-2 effetArticle">
                <p> Auteur </p>
            </div>
            <div class="col-md-3 effetArticle">
                <p> Titre article </p>
            </div>
            <div class="col-md-2 effetArticle">
                <p> Date de création </p>
            </div>
            <div class="col-md-1">
                <a href="editPost.php"><i class="far fa-edit fa-2x effetIcone"></i> </a>
            </div>
            <div class="col-md-1">
                <a href="#"><i class="far fa-trash-alt fa-2x effetIcone"></i> </a>
            </div>
        </div>
    </article>

    <article id="gestionArticle">
        <div class="row" id="ligneArticle">
            <div class="col-md-1 offset-md-1 effetArticle">
                <p> 1 </p>
            </div>
            <div class="col-md-2 effetArticle">
                <p> Jean </p>
            </div>
            <div class="col-md-3 effetArticle">
                <p> Test </p>
            </div>
            <div class="col-md-2 effetArticle">
                <p> 18 aout 2019 </p>
            </div>
            <div class="col-md-1">
                <a href="editPost.php"><i class="far fa-edit fa-2x effetIcone"></i> </a>
            </div>
            <div class="col-md-1">
                <a href="#"><i class="far fa-trash-alt fa-2x effetIcone"></i> </a>
            </div>
        </div>
    </article>
</section>
<?php $content = ob_get_clean(); ?>

<?php require("includes/template.php"); ?>