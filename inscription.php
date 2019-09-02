<?php
$title = "Article | Billet simple pour l'Alaska";
?>


<?php ob_start(); ?>

<!--******** FOND DE PAGE ********-->
<div id="blockPage">
   <!--******** NAVBAR ********-->
   <?php include("includes/nav_disconnected.php"); ?>

   <section class="col-lg-6 offset-lg-6" id="connect">
      <h3> Inscrivez-vous </h3>
<div class="error text-center">
         <?php
         if (isset($erreur)) {
            echo $erreur;
         }
         ?>
      </div>
      <form action="" method="post">
         <div class="col-lg-8 offset-lg-2">
            <label class="labelForm" for="inputPseudo"> Pseudo </label>
            <input type="text" class="formInput" id="inputPseudo" name="inputPseudo" value="<?php if (isset($_POST['inputPseudo'])) {
                                                                                                echo $_POST['inputPseudo'];
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
            <button class="submit" name="formInscription"> Inscription </button>
         </div>
         <div class="col-lg-12 text-center">
            <p> Déjà inscrit ? </p> <a href='index.php?action=login'> Me connecter !</a>
         </div>
      </form>
      
   </section>


   <!--******** FOOTER ********-->
   <?php include("includes/footer.php") ?>
   <!--Fin div blocPage-->
</div>


<?php $content = ob_get_clean(); ?>

<?php require('includes/template.php'); ?>