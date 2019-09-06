<?php $title = "Interface Admin | Ecrire un article"; ?>

<?php ob_start(); ?>

<?php include("includes/navigation.php"); ?>
<!--******** ECRIRE UN ARTICLE ********-->
<p class="comeBack"> Revenir à l'écran de gestion <a href="index.php?action=comeBackProfilAdmin"><i class="far fa-times-circle fa-lg"></i> </a> </p>
<section class="col-md-10 offset-md-1" id="interfaceAdmin" id="test">
    <h2> Ecrivez un article </h2>


    <div class="col-md-10 offset-md-1 text-left" id="gestionArticleDelete">
        <form action="" method="post">
            <div class="error text-center">
                <?php
                if (isset($erreur)) {
                    echo $erreur;
                }
                ?>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <label for="input_Title"> Votre titre </label>
                    <input type="text" class="formInput" id="input_NewTitle" name="input_NewTitle">
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <label for="input_Content"> Votre article </label>
                    <textarea id="textComment" name="input_NewContent" class="formInput" rows="20"> </textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <button class="submitYellow"> Poster </button>
                </div>
            </div>
        </form>
    </div>


</section>
<?php $content = ob_get_clean(); ?>

<?php require("includes/template.php"); ?>