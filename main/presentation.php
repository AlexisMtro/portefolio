<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body id="main_div">

<?php
include 'menu.html';
?>

<div id="presentation" class="container white-text">
    <div class="row">

        <h3 id="title_presentation" class="center-align">
            <i class="small material-icons">account_circle</i>
            Présentation
        </h3>

        <div class="col s12 m12 l4 contenu">
            <i class="medium material-icons contenu2" id="school">school</i>
            <p>
                Après avoir obtenu mon Baccalauréat avec mention
                j'ai trouvé un intérêt important pour l'informatique.
                Je suis actuellement étudiant en troisième année au sein
                de l'EPSI Paris où j'apprends à maîtriser les langages
                de programmation dans le but de devenir un développeur WEB.
            </p>
        </div>

        <div class="col s12 m12 l4 contenu">
            <i class="medium material-icons contenu2" id="favorite">favorite</i>
            <p>
                Passionné par l'informatique, en quête de nouvelles connaissances,
                je suis interessé par les nouvelles technologies,
                je suis polyvalent, motivé et détérminé dans mes projets.
                Je suis perfectionniste et capable de travailler en groupe ou individuellement.
            </p>
        </div>

        <div class="col s12 m12 l4 contenu">
            <i class="medium material-icons contenu2" id="library">local_library</i>
            <p>
                Jeune et autodidacte, pratiquant le développement web lors de mes temps libres,
                je développe notamment mes compétences grâces aux outils tels que: PHP, MySQL,
                JavaScript, HTML, CSS et certains framework comme Symfony, Materialize et Bootstrap.
            </p>
        </div>

    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="../js/index.js"></script>

</body>
</html>