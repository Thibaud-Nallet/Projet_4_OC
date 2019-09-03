<?php $title = 'Accueil | Blog de Jean Forteroche'; ?>

<?php ob_start(); ?>

<!--******** FOND DE PAGE ********-->
<div id="blockPage">
    <!--******** NAVBAR ********-->
    <?php include("includes/navigation.php"); ?>
    <!--******** HEADER ********-->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="underline">Bienvenue sur mon blog</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2 headerTitle">
                    <h2>Découvrez mon nouveau roman policier :<br /> <span id="novelTitle">Billet simple pour
                            l'Alaska</span></h2>
                </div>
                <div class="col-lg-6 offset-lg-3 headerButton">
                    <a href="#presentation" id="headerButtonDiscover" class="btn" role="button"> Découvrir le projet
                    </a>
                    <a href="index.php?action=listPosts" id="headerButtonRead" class="btn" role="button"> Lire le roman </a>
                </div>
            </div>
        </div>
    </header>
    <!--******** PRESENTATION ********-->
    <section id="presentation">
        <div class="container" id="bio">
            <div class="row">
                <div class="col-md-8 align-middle">
                    <h3 class="underline"> Bonjour, </h3>
                    <p class="text-justify biographie">
                        Je me présente, je m'appelle Jean Forteroche, jeune écrivain de roman
                        policier. <br />
                        Au cours de mon enfance, j'ai fait de fréquents séjours aux États-Unis : ma
                        première destination en 1987 est Anchorage dans l'Alaska, ville qui inspire mon premier
                        roman : "La bête d'Alaska" ainsi que les suivants. <br />
                        J'ai effectué ma scolarité au lycée Montesquieu à Herblay puis à l'Université
                        Paris XIII-Nord ou j'étudie les lettres modernes.<br />
                        Après mon deuxième roman, inspiré de Stephen King : "Le Coma des mortels", qui raconte un
                        mois
                        dans la peau d’un jeune homme plongé dans le coma, à la suite d'un accident qui s’avère être
                        une tentative de meurtre au Québec.<br />
                        Je suis une formation en criminologie pendant un an à l'université de
                        Saint-Denis. Durant cette année, j'apprends les rudiments de la psychologie criminelle, de
                        la police technique et scientifique et de la médecine légale.<br />
                        Cette formation me permets d'acquérir des connaissances afin de me lancer dans mon
                        troisième roman. <br />Mais pourquoi avoir choisi un blog ?
                    </p>
                </div>
                <div class="col-md-4">
                    <figure id="portrait">
                        <img src="assets/images/auteur.jpg" alt="photo de Jean Forteroche">
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <!--******** PRESENTATION BLOG ********-->
    <section id="whyBlog">
        <div class="container" id="blogProject">
            <div class="row">
                <div class="col-md-6 offset-md-6">
                    <h3 class="underline"> Le choix d'un roman en ligne </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <figure class="liseuse">
                        <img src="assets/images/liseuse.png" alt="personne lisant sur une liseuse">
                    </figure>
                </div>
                <div class="col-md-6">
                    <p class="text-justify biographie">
                        À l'heure du tout connecté et de l'omniprésence des réseaux sociaux, j'ai décidé de
                        transposer mon nouveau récit en ligne, sous la forme de chapitres périodiques et
                        interactifs, afin
                        d'établir une communication bilatérale qu'empêche le support papier.
                        Ce roman est un cadeau pour vous, la communauté de lecteurs qui s'est constituée au fil des
                        histoires abracadabrantesques. Un cadeau pour
                        faire entendre votre voix, et pour vous récompenser de votre indéfectible loyauté.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--******** COMMENTS ********-->
    <section id="howComments">
        <div class="container" id="commentsProject">
            <div class="row">
                <h3 class="underline"> Interagissez en direct </h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p class="text-justify biographie">
                        Chaque publication périodique qui composera le roman "Billet simple pour l'Alaska" sera
                        l'occasion de faire entendre
                        votre voix. Exprimez votre ressenti sur la progression de l'histoire, réagissez sur les
                        décisions des personnages,
                        proposez vos interprétations, échangez vos idées.
                        Au gré de la pertinence de votre commentaire, je vous répondrai !
                    </p>
                </div>
                <div class="col-md-6">
                    <figure class="interaction">
                        <img src="assets/images/interaction.png" alt="Deux personnes sur une table regardant leur smartphone">
                    </figure>
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