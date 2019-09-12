<?php $title = "Roman | Billet simple pour l'Alaska"; ?>

<?php ob_start() ?>

<!--******** FOND DE PAGE ********-->
<div id="blockPage">
    <?php include("./view/includes/navigation.php") ?>
    <!--******** HEADER ********-->
    <header>
        <h1 class="titleBlog"> <span id="novelTitle"> Billet simple pour l'Alaska </span></h1>
        <h2 class="titleBlog"> Les chapitres </h2>
    </header>
    <!--******** PRESENTATION DU ROMAN ********-->
    <section class="container" id="presentationRoman">
        <div class="row">
            <p class="text-center textBlog"> Retrouvez l'ensemble des chapitres qui compose le roman " Billet
                simple pour l'Alaska", par ordre de publication.</p>
        </div>
        <div class="row">
            <p class="text-center textBlog"> <span class="resume"> Le résumé : </span> <br /> 1919. <br /> Guy est une jeune policier à l’aube de sa carrière.<br />
                Harry, son partenaire et confident, est arrivé depuis peu en Alaska. <br /> Tout bascule le jour où ils se retrouvent embarquées
                dans une sombre affaire : le meurtre de l’infirmière Carrie A. Nelson à bord de l’express de 15h20 ...
            </p>
        </div>
        <div class="row">
            <p class="text-center textBlog"> A suivre ! </p>
        </div>
    </section>
    <!--******** PRESENTATION DE LA LISTE DES POSTS ********-->
    <section class="container" id="listPostBlog">
        <hr>
        <?php
        while ($article = $posts->fetch()) { ?>
            <article class="posts">
                <h3> <?= htmlspecialchars($article["title"]); ?> </h3>
                <h5 class="datePublie"> Publié le <?= $article["creation_date_fr"] ?> </h5>
                <p class="text-justify textBlog"> <?= substr($article["content"], 0, 255) . " ... " ?> </p>
                <button> <a href="index.php?action=post&amp;id=<?= $article['id'] ?>" class="nav-link"> Lire la suite </a> </button>
            </article>
        <?php }
        $posts->closeCursor();
        ?>
    </section>

    <?php include("./view/includes/footer.php") ?>

</div>

<?php $content = ob_get_clean(); ?>

<?php require("./view/includes/template.php"); ?>