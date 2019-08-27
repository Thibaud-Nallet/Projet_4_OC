<?php $title = "Roman | Billet simple pour l'Alaska"; ?>

<?php ob_start() ?>

<!--******** FOND DE PAGE ********-->
<div id="blockPage">
    <?php include("../includes/nav_disconnected.php") ?>
    <!--******** HEADER ********-->
    <header>
        <h1 class="titleBlog"> <span id="novelTitle">Billet simple pour l'Alaska</span></h1>
        <h2 class="titleBlog"> Les chapitres </h2>
    </header>
    <!--******** PRESENTATION DU ROMAN ********-->
    <section class="container" id="presentationRoman">
        <div class="row">
            <p class="text-justify textBlog"> Retrouvez l'ensemble des chapitres qui compose le roman " Billet
                simple
                pour
                l'Alaska", par ordre
                de publication.</p>
        </div>
        <div class="row">
            <p class="text-justify textBlog"> <span class="resume"> Le résumé :</span> Samantha Hollis n'aurait
                jamais cru passer une nuit de passion dans ce train avec un amant comme
                Nick Brodie. Mais cet homme aussi fort que fruste cache un ancien policier brisé par toutes les
                horreurs auxquelles il a dû assister. Et c'est pour retrouver un peu de paix qu'il a quitté son
                poste à Anchorage, en Alaska. Lorsqu'il se décide à retourner au pays, Nick invite Samantha, qui
                accepte son offre. Mais, plus que la rudesse du Grand Nord ou les tempêtes de neige, une affaire
                de kidnapping et de meurtre va menacer d'entraîner le couple dans le chaos.</p>
        </div>
        <div class="row">
            <p class="text-justify textBlog"> Bonne lecture !</p>
        </div>
    </section>
    <!--******** PRESENTATION DE LA LISTE DES POSTS ********-->
    <section class="container" id="listPostBlog">
        <hr>
        <article class="posts">
            <h3> Titre </h3>
            <h5 class="datePublie"> Publié le Date de création </h5>
            <p class="text-justify textBlog"> Texte de l'article </p>
            <button> <a href="post_disconnected.php" class="nav-link"> Lire la suite </a> </button>
        </article>

        <article class="posts">
            <h3> Test d'un article </h3>
            <h5 class="datePublie"> Publié le 15 aout 2019 </h4>
                <p class="text-justify textBlog"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat ... </p>
                <button> <a href="post_disconnected.php" class="nav-link"> Lire la suite </a> </button>
        </article>
    </section>

    <?php include("../includes/footer.php") ?>

</div>

<?php $content = ob_get_clean(); ?>

<?php require("../template.php"); ?>