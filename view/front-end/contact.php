<?php $title = "Contact | Blog de Jean Forteroche"; ?>

<?php ob_start() ?>

<!--******** FOND DE PAGE ********-->
<div id="blockPage">
    <?php include("../includes/nav_disconnected.php") ?>
    <!--******** HEADER ********-->
    <header>
        <h1 class="underline titleContact1"> Contactez moi </h1>
        <h2 class="titleContact2"> Adressez votre demande via le formulaire de contact ci-dessous <br />et je vous
            répondrai
            dans les plus brefs délais ! </h2>
    </header>
    <!--******** PRESENTATION DU ROMAN ********-->
    <section class="container" id="formContact">
        <div class="row">
            <div class="col-lg-12">
                <h3 class> Formulaire de contact </h3>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form action="#" method="post">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label class="labelForm" for="inputFirstName"> Votre prénom </label>
                            <input type="text" class="formInput" id="inputFirstName">
                        </div>
                        <div class="col-md-6">
                            <label class="labelForm" for="inputName">Votre nom </label>
                            <input type="text" class="formInput" id="inputName">
                        </div>
                    </div>
                    <div>
                        <label class="labelForm" for="inputEmail">Votre adresse e-mail </label>
                        <input type="email" class="formInput" id="inputEmail">
                    </div>
                    <div>
                        <label class="labelForm" for="inputObject">Objet du message (en moins de 255 caractères)
                        </label>
                        <input type="text" class="formInput" id="inputObject">
                    </div>
                    <div>
                        <label class="labelForm" for="inputMessage">Votre message </label>
                        <textarea class="formInput" id="inputMessage" rows="3"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Je ne suis pas un robot
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <button class="submit"> Envoyer </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php include("../includes/footer.php") ?>
</div>
<?php $content = ob_get_clean() ?>

<?php require("../template.php") ?>