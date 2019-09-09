<div id="navigation">
    <!--Navigation Bootstrap-->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" id="backgroundNavbar">
        <!-- Avec logo -->
        <a class="navbar-brand" href="index.php?action=welcomeHome"> <span class="textLogo"> Jean </span> <br /> <span class="textLogo">
                FORTEROCHE </span> </a>
        <!-- Bouton responsive -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"> <i class="fas fa-bars"></i> </span>
        </button>
        <!-- Conteneur des liens -->
        <div class="collapse navbar-collapse" id="mainNav">
            <!-- Liens -->
            <ul class="navbar-nav nav-tabs">
                <li class="nav-item"> <a class="nav-link" href="index.php?action=welcomeHome"> <i class="fas fa-home"></i> Accueil</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="index.php?action=listPosts"> <i class="fas fa-blog"></i> Blog </a></li>
            </ul>
            <?php
            if (isset($_SESSION['userId']) != true) {
                ?>
                <ul class="navbar-nav nav-tabs ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=login"> <i class="fas fa-sign-in-alt"> </i> Connexion </a>
                    </li>
                </ul>
            <?php
            } else {
                ?>
                <ul class="navbar-nav nav-tabs ml-auto">
                    <li class="nav-item dropdown" id="navConnect">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"> Bienvenue <span class="pseudoNav">
                                <?= $_SESSION['pseudo'] ?> </span>
                        </a>
                        <div class="dropdown-menu">
                            <?php
                                if ($_SESSION['statut'] == "admin") {
                                    ?>
                                <a class="dropdown-item" href="index.php?action=comeBackProfilAdmin"> Gestion </a>
                            <?php } ?>
                            <a class="dropdown-item" href='index.php?action=comeBackProfil'> Profil </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php?action=deconnectProfil"> <i class="fas fa-sign-in-alt"> Deconnexion</i> </a>
                        </div>
                    </li>
                </ul>
            <?php } ?>
        </div>
    </nav>
</div>