<?php
function Date_ConvertSqlTab($date_sql)
{
    $jour = substr($date_sql, 8, 2);
    $mois = substr($date_sql, 5, 2);
    $annee = substr($date_sql, 0, 4);
    $heure = substr($date_sql, 11, 2);
    $minute = substr($date_sql, 14, 2);
    $seconde = substr($date_sql, 17, 2);

    $key = array('annee', 'mois', 'jour', 'heure', 'minute', 'seconde');
    $value = array($annee, $mois, $jour, $heure, $minute, $seconde);

    $tab_retour = array_combine($key, $value);

    return $tab_retour;
}

function DateMoisTxt($mois_brut)
{
    if ($mois_brut == '01') {
        return 'Janvier';
    } elseif ($mois_brut == '02') {
        return 'Février';
    } elseif ($mois_brut == '03') {
        return 'Mars';
    } elseif ($mois_brut == '04') {
        return 'Avril';
    } elseif ($mois_brut == '05') {
        return 'Mai';
    } elseif ($mois_brut == '06') {
        return 'Juin';
    } elseif ($mois_brut == '07') {
        return 'Juillet';
    } elseif ($mois_brut == '08') {
        return 'Août';
    } elseif ($mois_brut == '09') {
        return 'Septembre';
    } elseif ($mois_brut == '10') {
        return 'Octobre';
    } elseif ($mois_brut == '11') {
        return 'Novembre';
    } elseif ($mois_brut == '12') {
        return 'Décembre';
    };
}

function DateJourTxt($jour_brut)
{
    if ($jour_brut == 'Mon') {
        return 'Lundi';
    } elseif ($jour_brut == 'Tue') {
        return 'Mardi';
    } elseif ($jour_brut == 'Wed') {
        return 'Mercredi';
    } elseif ($jour_brut == 'Thu') {
        return 'Jeudi';
    } elseif ($jour_brut == 'Fri') {
        return 'Vendredi';
    } elseif ($jour_brut == 'Sat') {
        return 'Samedi';
    } elseif ($jour_brut == 'Sun') {
        return 'Dimanche';
    };
}

function DateComplete($date_sql)
{
    $tab_date = Date_ConvertSqlTab($date_sql);
    $mktime_brut = mktime(
        $tab_date['heure'],
        $tab_date['minute'],
        $tab_date['seconde'],
        $tab_date['mois'],
        $tab_date['jour'],
        $tab_date['annee']
    );

    return DateJourTxt(date('D', $mktime_brut)) . ' ' . $tab_date['jour'] . ' ' .
        DateMoisTxt(date('m', $mktime_brut)) . ' ' . $tab_date['annee'];
}
?> 
<?php $title = "Roman | Billet simple pour l'Alaska"; ?>

<?php ob_start() ?>

<!--******** FOND DE PAGE ********-->
<div id="blockPage">
    <?php include("../includes/nav_disconnected.php") ?>
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
        while ($article = $statement->fetch()) { ?>
       <article class="posts">
            <h3> <?= $article["title"] ?> </h3>
            <h5 class="datePublie"> Publié le <?= DateComplete($article["date_creation"]); ?> </h5>
            <p class="text-justify textBlog"> <?= substr($article["content"], 0, 255) . " ... " ?> </p>
            <button> <a href="post_disconnected.php?id='<?= $article['id'] ?>' " class="nav-link"> Lire la suite </a> </button>
        </article>
        <?php }  
        /*Database::disconnect();*/
        ?>
        </section>

        <?php include("../includes/footer.php") ?>

</div>

<?php $content = ob_get_clean(); ?>

<?php require("../template.php"); ?>

