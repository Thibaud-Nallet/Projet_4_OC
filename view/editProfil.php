<?php $title = "Edition du Profil | Blog de Jean Forteroche"; ?>

<?php ob_start(); ?>

<?php include("includes/navigation.php"); ?>
<p class="comeBack"> Revenir à l'écran de gestion <a href="index.php?action=comeBackProfil"><i class="far fa-times-circle fa-lg"></i> </a> </p>
<section class="col-lg-6 offset-lg-6" id="connect">
    <h3> Editez votre profil </h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col-lg-8 offset-lg-2">
            <label class="labelForm" for="input_NewPseudo"> Votre pseudo </label>
            <input type="text" class="formInput" id="input_NewPseudo" name="input_NewPseudo" value="<?= $_SESSION['pseudo']; ?>">
        </div>
        <div class="col-lg-8 offset-lg-2">
            <label class="labelForm" for="input_NewMail"> Votre adresse e-mail </label>
            <input type="email" class="formInput" id="inputMail" name="input_NewMail" value="<?= $_SESSION['email']; ?>">
        </div>
        <div class="col-lg-8 offset-lg-2">
            <label class="labelForm" for="input_NewPassword"> Changez de mot de passe </label>
            <input type="password" class="formInput" id="inputPassword" name="input_NewPassword">
        </div>
        <div class="col-lg-8 offset-lg-2">
            <label class="labelForm" for="verifInput_NewPassword"> Confirmez votre nouveau mot de passe </label>
            <input type="password" class="formInput" id="verifInput_NewPassword" name="verifInput_NewPassword">
        </div>

        <div class="col-lg-12 text-center" id="buttonConnect">
            <button class="submit"> Modifier </button>
        </div>
    </form>
    <div class="error text-center">
        <?php
        if (isset($erreur)) {
            echo $erreur;
        }
        ?>
    </div>
</section>

<?php include("includes/footer.php"); ?>

<?php $content = ob_get_clean(); ?>

<?php require("includes/template.php"); ?>