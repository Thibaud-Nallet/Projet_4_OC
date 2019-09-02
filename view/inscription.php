<?php $title = "Article | Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

<!--******** FOND DE PAGE ********-->
<div id="blockPage">
    <!--******** NAVBAR ********-->
    <?php include("includes/nav_disconnected.php"); ?>

    <section class="col-lg-6 offset-lg-6" id="connect">
        <h3> Inscrivez-vous </h3>

        <form action="" method="post">
            <div class="col-lg-8 offset-lg-2">
                <label class="labelForm" for="inputIdentifiant"> Pseudo </label>
                <input type="text" class="formInput" id="inputIdentifiant" name="inputIdentifiant" value="<?php if (isset($_POST['inputIdentifiant'])) {
                                                                                                                echo $_POST['inputIdentifiant'];
                                                                                                            }  ?>">
            </div>
            <div class="col-lg-8 offset-lg-2">
                <label class="labelForm" for="inputMail"> Veuillez saisir votre adresse e-mail </label>
                <input type="email" class="formInput" id="inputMail" name="inputMail" value="<?php if (isset($_POST['inputMail'])) {
                                                                                                    echo $_POST['inputMail'];
                                                                                                }  ?>">
            </div>
            <div class="col-lg-8 offset-lg-2">
                <label class="labelForm" for="inputPassword"> Mot de passe </label>
                <input type="password" class="formInput" id="inputPassword" name="inputPassword">
            </div>
            <div class="col-lg-8 offset-lg-2">
                <label class="labelForm" for="verifInputPassword"> Veuillez retaper votre mot de passe </label>
                <input type="password" class="formInput" id="verifInputPassword" name="verifInputPassword">
            </div>

            <div class="col-lg-12 text-center" id="buttonConnect">
                <button class="submit" name="inscription"> Inscription </button>
            </div>
        </form>
        <p class="error">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            Message d'erreur
        </p>
    </section>

    <!--******** FOOTER ********-->
    <?php include("includes/footer.php") ?>
    <!--Fin div blocPage-->
</div>


<?php $content = ob_get_clean(); ?>

<?php require('includes/template.php');  ?>