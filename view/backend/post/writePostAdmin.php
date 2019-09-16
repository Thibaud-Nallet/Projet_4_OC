<?php $title = "Interface Admin | Ecrire un article"; ?>

<?php ob_start(); ?>

<?php include("./view/includes/navigation.php"); ?>

<!--******** WRITE ARTICLE ********-->
<p class="comeBack"> Revenir à l'écran de gestion <a href="index.php?action=comeBackProfilAdmin"><i class="far fa-times-circle fa-lg"></i> </a> </p>
<section class="col-md-10 offset-md-1" id="interfaceAdmin" id="test">
    <h2> Ecrivez un article </h2>
    <div class="col-md-10 offset-md-1 text-left" id="editArticle">
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
                    <input type="text" class="formInput" id="input_Title" name="input_Title">
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <label> Votre article </label>
                    <textarea id="mytextarea" name="input_Content" class="formInput" rows="20"> </textarea>
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

<?php require("./view/includes/template.php"); ?>