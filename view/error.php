<?php $title = "Erreur | Billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

<!--******** FOND DE PAGE ********-->
<div id="blockPage">
    <!--******** NAVBAR ********-->
    <?php include("includes/navigation.php"); ?>

    <header id="error_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1> Oups ! <br /> Impossible de trouver cette page</h1>
                </div>
                <div class="col-lg-8 offset-lg-2 text-center">
                    <p> La page que vous souhaitez voir n'existe pas.<br />
                    </p>
                    <div class="col-lg-12 text-center" id="buttonConnect">
                        <input type="button" class="submit" value="ACCUEIL"> <a href="index.php?action=welcomeHome"></a> 
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--******** FOOTER ********-->
    <?php include("includes/footer.php") ?>

    <!--Fin div blocPage-->
</div>

<?php $content = ob_get_clean(); ?>

<?php require('includes/template.php'); ?>