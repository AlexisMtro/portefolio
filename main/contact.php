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
<div class="container white-text">
    <div class="row">

        <h3 id="title_presentation" class="center-align">
            <i class="small material-icons">contact_mail</i>
            Contact
        </h3>

        <form id="contact" method="post" action="traitement.php" class="col s12">

                <div class="input-field col s12">
                    <input id="nom" type="text" class="validate" name="nom" tabindex="1">
                    <label for="nom">Nom</label>
                </div>

                <div class="input-field col s12">
                    <input id="email" type="email" class="validate" name="email" tabindex="2">
                    <label for="email" data-error="wrong" data-success="right">Email</label>
                </div>

                <div class="input-field col s12">
                    <input id="objet" type="text" class="validate" name="objet" tabindex="3">
                    <label for="objet">Objet</label>
                </div>

                <div class="input-field col s12">
                    <textarea id="message" class="materialize-textarea" name="message" tabindex="4"></textarea>
                    <label for="message">Message</label>
                </div>

            <div style="text-align:center;">
                <input class="waves-effect waves-light btn" type="submit" name="envoi" value="Envoyer" />
            </div>

        </form>
    </div>
</div>

<script src="../http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="../https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="../js/index.js"></script>

</body>
</html>
