<?php $title = "Interface Admin | Liste commentaires "; ?>

<?php ob_start(); ?>

<?php include("includes/navigation.php"); ?>

<!--******** INTERFACE ADMIN ********-->
<p class="comeBack"> Revenir à l'écran de gestion <a href="index.php?action=homeProfilAdmin"><i class="far fa-times-circle fa-lg"></i> </a> </p>
<section class="col-md-10 offset-md-1" id="interfaceAdmin" id="test">
    <h2> Liste des commentaires </h2>


    <article id="gestionArticle">
        <div class="row" id="ligneArticle">
            <div class="col-md-1 offset-md-1 effetArticle">
                <p> Id </p>
            </div>
            <div class="col-md-2 effetArticle">
                <p> Pseudo </p>
            </div>
            <div class="col-md-2 effetArticle">
                <p> Date de création </p>
            </div>
            <div class="col-md-4 effetArticle text-justify">
                <p> Commentaires </p>
            </div>

            <div class="col-md-1">
                <a href="#"><i class="far fa-eye-slash fa-2x effetIcone"></i> </a>
            </div>
        </div>
    </article>

    <article id="gestionArticle">
        <div class="row" id="ligneArticle">
            <div class="col-md-1 offset-md-1 effetArticle">
                <p> 1 </p>
            </div>
            <div class="col-md-2 effetArticle">
                <p> Tib </p>
            </div>
            <div class="col-md-2 effetArticle">
                <p> 18 juin 2019 </p>
            </div>
            <div class="col-md-4 effetArticle text-justify">
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do
                    eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat</p>
            </div>
            <div class="col-md-1">
                <a href="#"><i class="far fa-eye-slash fa-2x effetIcone"></i> </a>
            </div>
        </div>
    </article>

    <article class="signalComments" id="gestionArticle">
        <div class="row" id="ligneArticle">
            <div class="col-md-1 offset-md-1 effetArticle">
                <p> 2 </p>
            </div>
            <div class="col-md-2 effetArticle">
                <p> Article signalé </p>
            </div>
            <div class="col-md-2 effetArticle">
                <p> 19 juin 2019 </p>
            </div>
            <div class="col-md-4 effetArticle text-justify">
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do
                    eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat</p>
            </div>
            <div class="col-md-1">
                <a href="#"><i class="far fa-eye-slash fa-2x effetIcone signalComments"></i> </a>
            </div>
        </div>
    </article>

</section>

<?php $content = ob_get_clean(); ?>

<?php require("includes/template.php"); ?>