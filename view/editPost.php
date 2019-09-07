<?php $title = "Interface Admin | Liste articles"; ?>

<?php ob_start(); ?>

<?php include("includes/navigation.php"); ?>
<!--******** INTERFACE ADMIN ********-->
<p class="comeBack"> Revenir à l'écran de gestion <a href="index.php?action=listPostAdmin"><i class="far fa-times-circle fa-lg"></i> </a> </p>
<section class="col-md-10 offset-md-1" id="interfaceAdmin">
    <h2> Editer l'article : <br /><br /> <span class="yellow"> <?= htmlspecialchars($postAdmin["title"]); ?> <span> </h2>


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
                    <label for="input_NewTitle"> Votre titre </label>
                    <input type="text" class="formInput" id="input_NewTitle" name="input_NewTitle" value="<?= htmlspecialchars($postAdmin["title"]); ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <label for="input_NewContent"> Votre article </label>
                    <textarea id="mytextarea" name="input_NewContent" class="formInput" rows="20"><?= nl2br($postAdmin["content"]); ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <button class="submitYellow"> Modifier </button>
                </div>
            </div>
        </form>
    </div>

</section>
<?php $content = ob_get_clean(); ?>

<?php require("includes/template.php"); ?>