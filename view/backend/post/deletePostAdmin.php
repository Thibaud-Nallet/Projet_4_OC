<?php $title = "Interface Admin | Liste articles"; ?>

<?php ob_start(); ?>

<?php include("./view/includes/navigation.php"); ?>

<!--******** DELETE POST ********-->
<p class="comeBack"> Revenir à l'écran de gestion <a href="index.php?action=listPostAdmin"><i class="far fa-times-circle fa-lg"></i> </a> </p>
<section class="col-md-10 offset-md-1" id="interfaceAdmin">
    <h2> Supprimer un article </h2>
    <div class="col-md-8 offset-md-2 text-left" id="gestionArticleDelete">
        <br />
        <p> Vous avez séléctionné l'article : <span class="yellow"><?= htmlspecialchars($postAdmin["title"]); ?> </span> </p>
        <p class="alert alert-warning"> Etes vous certain de vouloir supprimer cet article ? </p>
        <form action="#" method="post">
            <input type="hidden" name="deleteId" value="<?= $postAdmin["id"] ?>">
            <div class="row">
                <a href="index.php?action=delete&amp;id=<?= $postAdmin["id"] ?>" class="nav-link submitYellow text-center"> Oui </a>
                <a href="index.php?action=listPostAdmin" class="nav-link submitYellow text-center"> Non </a>
            </div>
        </form>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require("./view/includes/template.php"); ?>