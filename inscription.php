<?php
$title = "Article | Billet simple pour l'Alaska";

$bdd = new PDO('mysql:host=localhost;dbname=jeanForteroche', 'root', 'root');

function checkInput($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if (isset($_POST['formInscription'])) {
   $inputPseudo = checkInput($_POST['inputPseudo']);
   $inputMail = checkInput($_POST['inputMail']);
   $inputPassword = checkInput($_POST['inputPassword']);
   $verifInputPassword = checkInput($_POST['verifInputPassword']);
   if (!empty($_POST['inputPseudo']) and !empty($_POST['inputMail']) and !empty($_POST['inputPassword']) and !empty($_POST['verifInputPassword'])) {
      $pseudolength = strlen($inputPseudo);
      if ($pseudolength <= 255) {
         //Verifie si le email existe déjà dans la bdd
         if (filter_var($inputMail, FILTER_VALIDATE_EMAIL)) {
            $reqmail = $bdd->prepare("SELECT * FROM user WHERE email = ?");
            $reqmail->execute(array($inputMail));
            $mailexist = $reqmail->rowCount();
            if ($mailexist == 0) {
               if ($inputPassword == $verifInputPassword) {
                  $insertMember = $bdd->prepare("INSERT INTO user(pseudo, email, pass, date_inscription) VALUES(?, ?, ?, CURDATE())");
                  $insertMember->execute(array($inputPseudo, $inputMail, $inputPassword));
                  $erreur = "Votre compte a bien été créé !";
               } else {
                  $erreur = "Vos mots de passes ne correspondent pas !";
               }
            } else {
               $erreur = "Adresse mail déjà utilisée !";
            }
         } else {
            $erreur = "Votre adresse mail n'est pas valide !";
         }
      } else {
         $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
      } //else
   } //if pseudolenght
   else {
      $erreur = "Tous les champs doivent être complétés !";
   } // else
} //if empty
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
         <div class="col-lg-12">
            <p> Déjà inscrit ? </p> <a href="connection.php"> Me connecter !</a>
         </div>
      </form>
      
   </section>


   <!--******** FOOTER ********-->
   <?php include("includes/footer.php") ?>
   <!--Fin div blocPage-->
</div>


<?php $content = ob_get_clean(); ?>

<?php require('includes/template.php'); ?>