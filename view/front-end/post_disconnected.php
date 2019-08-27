<?php $title = "Article | Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

<!--******** FOND DE PAGE ********-->
<div id="blockPage">
    <!--******** NAVBAR ********-->
    <?php include("../includes/nav_disconnected.php"); ?>
    <!--******** HEADER ********-->
    <header>
        <h1 class="titleBlog"> <span id="novelTitle">Billet simple pour l'Alaska</span></h1>
        <h2 class="titleBlog"> Titre du post cliqué </h2>
    </header>

    <!--******** PRESENTATION DU POST CLIQUE ********-->
    <section class="container" id="presentationPost">
        <div class="row">
            <article class="post">
                <h5 class="datePublie"> Publié le Date de création </h5>
                <p class="text-justify textBlog">
                    <span id="premiereLettrePost">L</span>orem ipsum dolor sit amet, consectetur adipiscing elit.
                    Nam sed ante non velit pharetra
                    vestibulum et id diam. Nam tincidunt, neque a tempor faucibus, magna magna varius dui, sed
                    tincidunt quam lectus vel justo. Pellentesque malesuada pulvinar urna, in dapibus nisi. Donec a
                    imperdiet tellus, vel feugiat massa. Duis vulputate cursus arcu. Integer diam quam, fringilla
                    vel nisi imperdiet, malesuada viverra risus. Donec dui mauris, sodales id ullamcorper ut,
                    volutpat et neque. Quisque efficitur est ac massa placerat fermentum. Integer pellentesque nec
                    ligula non laoreet. Nullam urna massa, feugiat sed dignissim nec, porttitor lacinia nunc.
                    Pellentesque et consectetur turpis, vitae gravida sapien. Maecenas lobortis sagittis quam. Nulla
                    sem dolor, blandit id nulla in, finibus tristique dui. Aliquam sed erat et lectus luctus
                    faucibus nec nec neque.<br />

                    Sed interdum mi eget metus lobortis porta a in risus. Suspendisse lobortis egestas nulla, nec
                    fringilla mi maximus pretium. Donec non tempor diam. Vestibulum gravida quis est quis convallis.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et auctor nulla. Nullam
                    auctor, lacus vitae ornare pharetra, lectus eros porta sapien, eu condimentum lacus libero sed
                    neque. Nunc et ante ac sem tempor pretium. Phasellus ultrices risus et ornare gravida. Lorem
                    ipsum dolor sit amet, consectetur adipiscing elit. Quisque id faucibus massa, sit amet
                    sollicitudin arcu.<br />

                    Vestibulum quis elit augue. Morbi aliquam eget lacus in vehicula. Quisque sagittis egestas
                    felis, sit amet fermentum mauris pharetra ac. Nam et sollicitudin ligula. Vestibulum ante ipsum
                    primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas nec elementum nibh,
                    sed vehicula diam. Maecenas interdum tempus leo, id fermentum dui porttitor sed. Curabitur
                    ultricies tellus erat, vitae iaculis leo cursus ut. Pellentesque at venenatis eros. Nullam
                    lobortis, ex eleifend eleifend semper, risus massa laoreet ipsum, scelerisque convallis urna
                    massa ut lorem. Etiam semper arcu vel consequat ullamcorper. Nunc hendrerit sodales magna at
                    porttitor. Donec vel lectus sollicitudin, facilisis massa a, dignissim ex.<br />

                    Vivamus non faucibus libero. Nunc luctus aliquam nibh. Vivamus porta ex at commodo aliquet.
                    Suspendisse magna metus, elementum sed lorem in, ultricies pulvinar nibh. Fusce ultricies metus
                    nec rutrum facilisis. Nam aliquam semper diam, id tempus eros molestie non. Etiam sed porttitor
                    leo. Phasellus ut neque a elit volutpat tincidunt in nec leo. Morbi ornare justo enim, eget
                    euismod tellus sodales sit amet. Quisque dapibus neque in eros bibendum, at cursus mauris
                    semper.<br />

                    In nec mi nec enim hendrerit fermentum non a enim. Integer quis purus vitae eros pulvinar
                    blandit. Sed dictum libero nec massa tristique, congue volutpat ante dignissim. Morbi sed turpis
                    a massa tempus imperdiet vitae euismod velit. Etiam scelerisque tempor nibh sit amet tempor.
                    Donec velit enim, aliquet id facilisis vitae, placerat non justo. Donec pretium egestas gravida.
                    Quisque in enim tempus, convallis quam ut, viverra dui. Cras dignissim a risus non rutrum.
                    Quisque et purus tristique, mollis risus vitae, pulvinar nulla.<br />
                </p>
            </article>
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