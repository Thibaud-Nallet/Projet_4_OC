<?php
session_start();
//Connexion BDD
$bdd = new PDO('mysql:host=localhost;dbname=jeanForteroche;charset=utf8', 'root', 'root');

function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['formConnection'])) {
    $mailConnect = checkInput($_POST['mailConnect']);
    $mdpConnect = checkInput($_POST['passwordConnect']);
    if (!empty($mailConnect) and !empty($mdpConnect)) {
        $reqUser = $bdd->prepare("SELECT * FROM user WHERE email = ? AND pass = ?");
        $reqUser->execute(array($mailConnect, $mdpConnect));
        $userExist = $reqUser->rowCount();
        if ($userExist == 1) {
            $userInfo = $reqUser->fetch();
            $_SESSION['id'] = $userInfo['id'];
            $_SESSION['pseudo'] = $userInfo['pseudo'];
            $_SESSION['email'] = $userInfo['email'];
            header("Location: gestionProfil.php?id=" . $_SESSION['id']);
        } else {
            $erreur = "Mauvais mail ou password";
        }
    } else {
        $erreur = "Tous les champs doivent être remplis";
    }
}

?>

<?php $title = "Connexion | Blog de Jean Forteroche"; ?>

<?php ob_start(); ?>

<div id="blockPage">
    <?php include("includes/nav_disconnected.php"); ?>
    <section class="col-lg-4 offset-lg-8" id="connect">
        <h3> Connexion </h3>
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
            <div class="col-lg-12">
                <p> Pas encore inscrit ? </p> <a href="inscription.php"> Inscrivez-vous ici !</a>
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
</div>

<?php $content = ob_get_clean(); ?>

<?php require("includes/template.php"); ?>