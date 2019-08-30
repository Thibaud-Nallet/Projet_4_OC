<!--******** NAVBAR ********-->
<div id="navigation">
    <!--Navigation Bootstrap-->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" id="backgroundNavbar">
        <ul class="navbar-nav nav-tabs">
            <li class="nav-item"> <a class="nav-link" href="../front-end/welcome.php"> <i class="fas fa-home"></i> Accueil du Blog</a>
            </li>
        </ul>
        <ul class="navbar-nav nav-tabs ml-auto">
            <li class="nav-item dropdown" id="navConnect">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"> Bienvenue <span class="pseudoNav">
                        Pseudo </span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="../back-end/gestionPost.php">Gestion</a>
                    <a class="dropdown-item" href="../back-end/gestionProfil.php">Profil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../front-end/welcome.php"> <i class="fas fa-sign-in-alt"> Deconnexion</i> </a>
                </div>
            </li>
        </ul>
    </nav>
</div>