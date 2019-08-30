<?php $title = "Connexion | Blog de Jean Forteroche"; ?>

<?php ob_start(); ?>

<div id="blockPage">
    <?php include("../includes/nav_disconnected.php"); ?>
    <section class="col-lg-4 offset-lg-8" id="connect">
        <form action="../back-end/gestionPost.php" method="post">
            <div class="col-lg-10 offset-lg-1">
                <label class="labelForm" for="inputIdentifiant"> Identifiant </label>
                <input type="text" class="formInput" id="inputIdentifiant">
            </div>
            <div class="col-lg-10 offset-lg-1">
                <label class="labelForm" for="inputPassword"> Mot de passe </label>
                <input type="password" class="formInput" id="inputPassword">
            </div>
            <div class="col-lg-12 text-center" id="buttonConnect">
                <button class="submit"> Connexion </button>
            </div>
            <div class="col-lg-12">
                <p> Pas encore inscrit ? </p> <a href="inscription.php"> Inscrivez-vous ici !</a>
            </div>
        </form>
    </section>
    <?php include("../includes/footer.php"); ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require("../template.php"); ?>