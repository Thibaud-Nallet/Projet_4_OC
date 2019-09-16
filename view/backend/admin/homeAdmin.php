<?php $title = "Interface Admin | Blog de Jean Forteroche"; ?>

<?php ob_start() ?>

<?php include("./view/includes/navigation.php") ?>

<!--******** LIST OF ARTICLES ********-->
<section class="col-md-10 offset-md-1" id="interfaceAdmin">
    <h2> Bienvenue sur l'interface administrateur</h2>
    <p class="whiteText"> De cette page, vous pouvez voir la liste des articles publiés, modifier un article, publier un nouvel
        article, gérer les commentaires. <br />
        Cliquez sur un item pour lancer la fonctionnalitée voulue.
    </p>
    <div class="row">
        <div class="col-md-4">
            <div class="col-lg-8 offset-lg-2 blockAdmin">
                <p> Liste d'articles </p>
                <hr>

                <a href="index.php?action=listPostAdmin">
                    <i class="fas fa-list-ul fa-2x"></i>
                </a>

            </div>
        </div>
        <div class="col-md-4">
            <div class="col-lg-8 offset-lg-2 blockAdmin">
                <p> Rédiger un article </p>
                <hr>
                <a href="index.php?action=writePostAdmin">
                    <i class="fas fa-pen-nib fa-2x"></i>
                </a>

            </div>
        </div>
        <div class="col-md-4">
            <div class="col-lg-8 offset-lg-2 blockAdmin">
                <p> Gérer les commentaires </p>
                <hr>
                <a href="index.php?action=listCommentsAdmin">
                    <i class="far fa-comments fa-2x"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require("./view/includes/template.php"); ?>