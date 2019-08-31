<?php $title = "Article | Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

<!--******** FOND DE PAGE ********-->
<div id="blockPage">
    <!--******** NAVBAR ********-->
    <?php include("includes/nav_disconnected.php"); ?>
    <!--******** HEADER ********-->
    <header>
        <h1 class="titleBlog"> <span id="novelTitle"> Billet simple pour l'Alaska </span></h1>
        <h2 class="titleBlog"> <?= htmlspecialchars($post["title"]); ?> </h2>
    </header>
    <!--******** PRESENTATION DU POST CLIQUE ********-->
    <section class="container" id="presentationPost">
        <div class="row">
            <article class="post">
                <h5 class="datePublie"> Publié le <?= $post["creation_date_fr"]; ?> </h5>
                <p class="text-justify textBlog"> <?= nl2br(htmlspecialchars($post["content"])); ?> </p>
            </article>
        </div>
    </section>
    <!--******** PRESENTATION DES COMMENTAIRES ********-->
    <section class="col-lg-8 offset-lg-2" id="comments">
        <div class="col-lg-12 text-center">
            <h3> Commentaires </h3>
        </div>
        <?php
        while ($comment = $comments->fetch()) {
            ?>
        <article class="col-lg-10 offset-lg-1" id="commentsArticle">
            <div class="row">
                <div class="col-lg-3">
                    <p class="commentsPseudo"> <?= htmlspecialchars($comment["pseudo"]); ?> </p>
                    <p class="commentsDate"> Commenté le <?= $comment["creation_date_fr"]; ?> </p>
                </div>
                <div class="col-lg-9">
                    <p class="commentsText text-justify"> <?= nl2br(htmlspecialchars($comment["content"])); ?> </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 offset-lg-10">
                    <button class="signale"> Signalé </button>
                </div>
            </div>
        </article>
        <?php } ?>
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
                    <p> <a href="index.php?action=connection">Connectez vous</a> ou <a href="index.php?action=inscription"> inscrivez vous</a> pour poster des
                        commentaires
                    </p>
                </div>

            </div>
        </div>
    </section>
    <!--******** FOOTER ********-->
    <?php include("includes/footer.php") ?>
    <!--Fin div blocPage-->
</div>

<?php $content = ob_get_clean(); ?>

<?php require('includes/template.php'); ?>