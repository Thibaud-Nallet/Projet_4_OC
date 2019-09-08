<?php $title = "Interface Admin | Liste commentaires "; ?>

<?php ob_start(); ?>

<?php include("includes/navigation.php"); ?>

<!--******** INTERFACE ADMIN ********-->
<p class="comeBack"> Revenir à l'écran de gestion <a href="index.php?action=comeBackProfilAdmin"><i class="far fa-times-circle fa-lg"></i> </a> </p>
<section class="col-md-12" id="interfaceAdmin" id="test">
    <h2> Liste des commentaires </h2>


    <article id="gestionArticle">
        <div class="row" id="ligneArticle">
            <div class="col-md-2 effetArticle">
                <p> Titre </p>
            </div>
            <div class="col-md-2 effetArticle">
                <p> Pseudo </p>
            </div>
            <div class="col-md-2 effetArticle">
                <p> Date de création </p>
            </div>
            <div class="col-md-5 effetArticle">
                <p> Commentaires </p>
            </div>
            <div class="col-md-1">
                <p> Supprimer </p>
            </div>
        </div>
    </article>

    <?php
    while($comments = $pseudoCommentAdmin->fetch() and $comment = $titleCommentAdmin->fetch()) {
        if($comment['alert'] ==  "true") {  ?>
            <article class="signalComments" id="signalComments">
                <div class="row" id="ligneArticle">
                    <div class="col-md-2 effetArticle">
                        <p> <?= htmlspecialchars($comment['title']); ?> </p>
                    </div>
                    <div class="col-md-2 effetArticle">
                        <p> <?= htmlspecialchars($comments['pseudo']); ?> </p>
                    </div>
                    <div class="col-md-2 effetArticle">
                        <p> <?= htmlspecialchars($comments['creation_date_fr']); ?> </p>
                    </div>
                    <div class="col-md-5 effetArticle text-justify">
                        <p> <?= htmlspecialchars($comments['content']); ?></p>
                    </div>
                    <div class="col-md-1">
                        <a href="index.php?action=deleteComments&amp;id=<?= $comments["id"] ?>"><i class=" far fa-eye-slash fa-2x effetIcone"></i> </a>
                    </div>
                </div>
            </article>
        <?php } else { ?>
            <article id="gestionArticle">
                <div class="row" id="ligneArticle">
                    <div class="col-md-2  effetArticle">
                        <p> <?= htmlspecialchars($comment['title']); ?> </p>
                    </div>
                    <div class="col-md-2 effetArticle">
                        <p> <?= htmlspecialchars($comments['pseudo']); ?> </p>
                    </div>
                    <div class="col-md-2 effetArticle">
                        <p> <?= htmlspecialchars($comments['creation_date_fr']); ?> </p>
                    </div>
                    <div class="col-md-5 effetArticle text-justify">
                        <p> <?= htmlspecialchars($comments['content']); ?></p>
                    </div>
                </div>
            </article>
    <?php }
    } ?>
    <div class="row pagination">
        <div class="col-lg-12 text-center">
            <p> Page :
                <?php for ($i = 1; $i <= $nombreDePages; $i++) //On fait notre boucle
                {
                    //On va faire notre condition
                    if ($i == $pageActuelle) //Si il s'agit de la page actuelle...
                    { ?>
                        [ <?= $i ?> ]
                    <?php } else //Sinon...
                        { ?>
                        <a href="index.php?action=listCommentsAdmin&page=<?= $i ?>"> <span class="crochet"> <?= $i ?> </span></a>
                <?php }
                } ?>
            </p>
        </div>
    </div>
    <!--
    <article class="signalComments" id="gestionArticle">
        <div class="row" id="ligneArticle">
            <div class="col-md-1 offset-md-1 effetArticle">
                <p> 2 </p>
            </div>
            <div class="col-md-2 effetArticle">
                <p> Article signalé </p>
            </div>
            <div class="col-md-2 effetArticle">
                <p> 19 juin 2019 </p>
            </div>
            <div class="col-md-4 effetArticle text-justify">
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do
                    eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat</p>
            </div>
            <div class="col-md-1">
                <a href="#"><i class="far fa-eye-slash fa-2x effetIcone signalComments"></i> </a>
            </div>
        </div>
    </article>
    -->
</section>

<?php $content = ob_get_clean(); ?>

<?php require("includes/template.php"); ?>