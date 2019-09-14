<!DOCTYPE html>

<html lang="fr-FR">

<head>
    <!--***** META *****-->
    <meta charset="utf-8">
    <meta name="description" content="Bienvenue sur le site web de Jean Forteroche, écrivain. Découvrez son nouveau roman 'Billet simple
        pour l'Alaska', publié en ligne.">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">
    <link rel="icon" type="image/png" href="#" />
    <!--***** LINK *****-->
    <!-- Style sheet Material Design -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <!-- Feuille de style Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Style sheet Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <!-- Style sheet Perso -->
    <link rel="stylesheet" href="/Projet_4_OC/assets/css/style.css">
    <!--***** TITLE *****-->
    <title> <?= $title ?> </title>
    
</head>

<body>
    <?= $content ?>
</body>

<!--***** SCRIPT *****-->
<!-- Script Material Design -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous">
</script>
<script>
    $(document).ready(function() {
        $('body').bootstrapMaterialDesign();
    });
</script>
<script src='https://cdn.tiny.cloud/1/b8x3q3ok9xunrv08y5thgsudar2lodb9fn6to6dz8pprgn5f/tinymce/5/tinymce.min.js'></script>
<script>
    tinymce.init({
        selector: '#mytextarea',
        language: 'fr',
    });
</script>
<!-- File js -->
<script <?= $script ?>> </script>
</body>

</html>