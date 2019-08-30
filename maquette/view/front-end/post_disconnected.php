<?php $title = "Article | Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

<!--******** FOND DE PAGE ********-->
<div id="blockPage">
    <!--******** NAVBAR ********-->
    <?php include("../includes/nav_disconnected.php"); ?>
    <!--******** HEADER ********-->
    <?php
    require("../index.php");
    if (!empty($_GET['id'])) {
        $id = checkInput($_GET['id']);
    }
    function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    }
    $database = Database::connect();
    $statement = $database->prepare("SELECT * FROM post WHERE id = ?");
    $statement->execute(array($id));
    $article = $statement->fetch(); ?>
    <header>
        <h1 class="titleBlog"> <span id="novelTitle"> Billet simple pour l'Alaska </span></h1>
        <h2 class="titleBlog"> <?= $article["title"] ?> </h2>
    </header>
    <!--******** PRESENTATION DU POST CLIQUE ********-->
    <section class="container" id="presentationPost">
        <div class="row">
            <article class="post">
                <h5 class="datePublie"> Publié le <?= $article["date_creation"]; ?> </h5>
                <p class="text-justify textBlog"> <?= $article["content"] ?> </p>
            </article>
            <?php
            Database::disconnect();
            ?>
        </div>
    </section>
    <!--******** PRESENTATION DES COMMENTAIRES ********-->
    <section class="col-lg-8 offset-lg-2" id="comments">
        <div class="col-lg-12 text-center">
            <h3> Commentaires </h3>
        </div>
        <article class="col-lg-10 offset-lg-1" id="commentsArticle">
            <div class="row">
                <div class="col-lg-3">
                    <p class="commentsPseudo"> Pseudo </p>
                    <p class="commentsDate"> Publié le Date de création </p>
                </div>
                <div class="col-lg-9">
                    <p class="commentsText text-justify"> Texte du commentaire </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 offset-lg-10">
                    <button class="signale"> Signalé </button>
                </div>
            </div>
        </article>
        <article class="col-lg-10 offset-lg-1" id="commentsArticle">
            <div class="row">
                <div class="col-lg-3">
                    <p class="commentsPseudo"> Test </p>
                    <p class="commentsDate"> Publié le 15 mai 1991 </p>
                </div>
                <div class="col-lg-9">
                    <p class="commentsText text-justify"> Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do
                        eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat ... </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 offset-lg-10">
                    <button class="signale"> Signalé </button>
                </div>
            </div>
        </article>
    </section>
    <!--******** POSTER DES COMMENTAIRES ********-->
    <section class="col-lg-8 offset-lg-2" id="postComments">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h3> Laisser un commentaire </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1" id="writeComments">
                <div class="col-lg-12 text-center">
                    <p> <a href="connection.php">Connectez vous</a> ou <a href="inscription.php"> inscrivez vous</a> pour poster des
                        commentaires
                    </p>
                </div>

            </div>
        </div>
    </section>
    <!--******** FOOTER ********-->
    <?php include("../includes/footer.php") ?>
    <!--Fin div blocPage-->
</div>

<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>