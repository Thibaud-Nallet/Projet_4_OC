<?php $title = "Interface Admin | Liste articles"; ?>

<?php ob_start(); ?>

<?php include("./view/includes/navigation.php"); ?>
<!--******** INTERFACE ADMIN ********-->
<p class="comeBack"> Revenir à l'écran de gestion <a href="index.php?action=comeBackProfilAdmin"><i class="far fa-times-circle fa-lg"></i> </a> </p>
<section class="col-md-10 offset-md-1" id="interfaceAdmin" id="test">
    <h2> Liste des articles </h2>


    <article id="gestionArticle">
        <div class="row" id="ligneArticle">
            <div class="col-md-1 offset-md-1 effetArticle">
                <p> Id </p>
            </div>
            <div class="col-md-2 effetArticle">
                <p> Auteur </p>
            </div>
            <div class="col-md-3 effetArticle">
                <p> Titre article </p>
            </div>
            <div class="col-md-2 effetArticle">
                <p> Date de création </p>
            </div>
            <div class="col-md-1">
                <p> Editer </p>
            </div>
            <div class="col-md-1">
                <p> Supprimer </p>
            </div>
        </div>
    </article>


    <?php
    while ($article = $postsAdmin->fetch()) { ?>
        <article id="gestionArticle">
            <div class="row" id="ligneArticle">
                <div class="col-md-1 offset-md-1 effetArticle">
                    <p> <?= htmlspecialchars($article["id"]); ?> </p>
                </div>
                <div class="col-md-2 effetArticle">
                    <p> <?= htmlspecialchars($article["pseudo"]); ?> </p>
                </div>
                <div class="col-md-3 effetArticle">
                    <p> <?= htmlspecialchars($article["title"]); ?> </p>
                </div>
                <div class="col-md-2 effetArticle">
                    <p> <?= htmlspecialchars($article["creation_date_fr"]); ?> </p>
                </div>
                <div class="col-md-1">
                    <a href="index.php?action=editPostAdmin&amp;id=<?= $article['id'] ?>"><i class="far fa-edit fa-2x effetIcone"></i> </a>
                </div>
                <div class="col-md-1">
                    <a href="index.php?action=deletePostAdmin&amp;id=<?= $article['id'] ?>"><i class="far fa-trash-alt fa-2x effetIcone"></i> </a>
                </div>
            </div>
        </article>
    <?php }
    $postsAdmin->closeCursor();
    ?>
</section>
<?php $content = ob_get_clean(); ?>

<?php require("./view/includes/template.php"); ?>