<?php $title = "Connexion | Blog de Jean Forteroche"; ?>

<?php ob_start(); ?>

<div id="blockPage">
    <?php include("includes/nav_disconnected.php"); ?>
    <section class="col-lg-4 offset-lg-8" id="connect">
        <h3> Connexion </h3>
        <div class="error text-center">
            <?php
            if (isset($erreur)) {
                echo $erreur;
            }
            ?>
        </div>
        <form action="" method="post">
            <div class="col-lg-10 offset-lg-1">
                <label class="labelForm" for="mailConnect"> Identifiant </label>
                <input type="email" class="formInput" id="mailConnect" name="mailConnect" placeholder="Votre adresse e-mail">
            </div>
            <div class="col-lg-10 offset-lg-1">
                <label class="labelForm" for="passwordConnect"> Mot de passe </label>
                <input type="password" class="formInput" id="passwordConnect" name="passwordConnect">
            </div>
            <div class="col-lg-12 text-center" id="buttonConnect">
                <button class="submit" name="formConnection"> Connexion </button>
            </div>
            <div class="col-lg-12 text-center">
                <p> Pas encore inscrit ? </p> <a href="index.php?action=inscription"> Inscrivez-vous ici !</a>
            </div>
        </form>
    </section>
    <?php include("includes/footer.php"); ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require("includes/template.php"); ?>