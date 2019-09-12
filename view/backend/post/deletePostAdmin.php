<?php $title = "Interface Admin | Liste articles"; ?>

<?php ob_start(); ?>

<?php include("./view/includes/navigation.php"); ?>
<!--******** INTERFACE ADMIN ********-->
<p class="comeBack"> Revenir à l'écran de gestion <a href="index.php?action=listPostAdmin"><i class="far fa-times-circle fa-lg"></i> </a> </p>
<section class="col-md-10 offset-md-1" id="interfaceAdmin">
    <h2> Supprimer un article </h2>


    <div class="col-md-8 offset-md-2 text-left" id="gestionArticleDelete">
        <br />
        <p> Vous avez séléctionné l'article : <span class="yellow"><?= htmlspecialchars($postAdmin["title"]); ?> </span> </p>
        <p class="alert alert-warning"> Etes vous certain de vouloir supprimer cet article ? </p>
        <form action="" method="post">
            <input type="hidden" name="deleteId" value="<?= $postAdmin["id"] ?>">
            <div class="row">
                <button class="submitYellow" name=""> <a href="index.php?action=delete&amp;id=<?= $postAdmin["id"] ?>" class="nav-link"> Oui </a> </button>
                <button class="submitYellow" name=""> <a href="index.php?action=listPostAdmin" class="nav-link"> Non </a> </button>
            </div>
        </form>
    </div>

</section>
<?php $content = ob_get_clean(); ?>

<?php require("./view/includes/template.php"); ?>