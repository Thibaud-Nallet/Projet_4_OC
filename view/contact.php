<?php $title = "Contact | Blog de Jean Forteroche"; ?>
<?php $script = "/Projet_4_OC/public/js/script.js"; ?>

<?php ob_start() ?>

<!--******** FOND DE PAGE ********-->
<div id="blockPage">
    <?php include("includes/nav_disconnected.php") ?>


    <!--******** HEADER ********-->
    <header>
        <h1 class="underline titleContact1"> Contactez moi </h1>
        <h2 class="titleContact2"> Adressez votre demande via le formulaire de contact ci-dessous <br />et je vous
            répondrai
            dans les plus brefs délais ! </h2>
    </header>

    <!--******** FORMULAIRE DE CONTACT ********-->
    <section class="container" id="formContact">
        <div class="row">
            <div class="col-lg-12">
                <h3 class> Formulaire de contact </h3>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div id="msgEnvoi">
                    <p> Votre message a bien été envoyé. <br /> Merci de m'avoir contacté :)</p>
                </div>
                <form id="contact-form" method="post" action="" role="form">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="firstname" class="labelForm"> Votre prénom <span class="etoileNoir">*</span></label>
                            <input id="firstname" type="text" name="firstname" class="formInput">
                            <span class="comments"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="labelForm"> Votre nom <span class="etoileNoir">*</span></label>
                            <input id="name" type="text" name="name" class="formInput">
                            <span class="comments"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="labelForm"> Email <span class="etoileNoir">*</span></label>
                            <input id="email" type="text" name="email" class="formInput">
                            <span class="comments"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="labelForm"> Téléphone </label>
                            <input id="phone" type="tel" name="phone" class="formInput">
                            <span class="comments"></span>
                        </div>
                        <div class="col-md-12">
                            <label class="labelForm"> Objet du message (en moins de 255 caractères)
                            </label>
                            <input id="object" type="text" name="object" class="formInput">
                        </div>
                        <div class="col-md-12">
                            <label for="message" class="labelForm"> Message <span class="etoileNoir">*</span></label>
                            <textarea id="message" name="message" class="formInput" rows="4"></textarea>
                            <span class="comments"></span>
                        </div>
                        <div class="col-md-12">
                            <p> <span class="etoileNoir">*</span> Ces informations sont requises.</p>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    Je ne suis pas un robot
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <input type="submit" class="submit text-center" value="Envoyer">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php include("includes/footer.php") ?>
</div>
<?php $content = ob_get_clean() ?>

<?php require("includes/template.php") ?>