<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=jeanForteroche;charset=utf8', 'root', 'root');

function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM user WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();

    if (isset($_POST['input_NewPseudo']) and !empty($_POST['input_NewPseudo']) and $_POST['input_NewPseudo'] != $user['pseudo']) {
        $newPseudo = checkInput($_POST['input_NewPseudo']);
        $insertPseudo = $bdd->prepare("UPDATE user SET pseudo = ? WHERE id = ?");
        $insertPseudo->execute(array($newPseudo, $_SESSION['id']));
        header('Location: gestionProfil.php?id=' . $_SESSION['id']);
    }
    if (isset($_POST['input_NewMail']) and !empty($_POST['input_NewMail']) and $_POST['input_NewMail'] != $user['mail']) {
        $newMail = checkInput($_POST['input_NewMail']);
        $insertMail = $bdd->prepare("UPDATE user SET mail = ? WHERE id = ?");
        $insertMail->execute(array($newMail, $_SESSION['id']));
        header('Location: gestionProfil.php?id=' . $_SESSION['id']);
    }
    if (isset($_POST['input_NewPassword']) and !empty($_POST['input_NewPassword']) and isset($_POST['verifInput_NewPassword']) and !empty($_POST['verifInput_NewPassword'])) {
        $input_NewPassword = $_POST['input_NewPassword'];
        $verifInput_NewPassword = $_POST['verifInput_NewPassword'];
        if ($input_NewPassword == $verifInput_NewPassword) {
            $insertPassword = $bdd->prepare("UPDATE user SET motdepasse = ? WHERE id = ?");
            $insertPassword->execute(array($input_NewPassword, $_SESSION['id']));
            header('Location: gestionProfil.php?id=' . $_SESSION['id']);
        } else {
            $erreur = "Vos deux mdp ne correspondent pas !";
        }
    }
    ?>

    <?php $title = "Edition du Profil | Blog de Jean Forteroche"; ?>

    <?php ob_start(); ?>

    <?php include("includes/nav_disconnected.php"); ?>

    <section class="col-lg-6 offset-lg-6" id="connect">
        <h3> Editez votre profil </h3>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="col-lg-8 offset-lg-2">
                <label class="labelForm" for="input_NewPseudo"> Votre pseudo </label>
                <input type="text" class="formInput" id="input_NewPseudo" name="input_NewPseudo" value="<?= $user['pseudo']; ?>">
            </div>
            <div class="col-lg-8 offset-lg-2">
                <label class="labelForm" for="input_NewMail"> Votre adresse e-mail </label>
                <input type="email" class="formInput" id="inputMail" name="input_NewMail" value="<?= $user['email']; ?>">
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


<?php
} else {
    header("Location: connection.php");
}
?>