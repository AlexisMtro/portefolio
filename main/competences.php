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

<div id="competences" class="container white-text">
    <div class="row">

        <h3 id="title_competences" class="center-align">
            <i class="small material-icons">local_library</i>
            Mes Compétences
        </h3>

        <div class="col s12 m12 l12">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title center-align">Programmation</span>

                    <div class="skillbar clearfix" data-percent="90%">
                        <div class="skillbar-title programmation_title"><span>HTML5</span></div>
                        <div class="skillbar-bar programmation_bar"></div>
                    </div>

                    <div class="skillbar clearfix" data-percent="90%">
                        <div class="skillbar-title programmation_title"><span>CSS</span></div>
                        <div class="skillbar-bar programmation_bar"></div>
                    </div>

                    <div class="skillbar clearfix" data-percent="80%">
                        <div class="skillbar-title programmation_title"><span>JavaScript</span></div>
                        <div class="skillbar-bar programmation_bar"></div>
                    </div>

                    <div class="skillbar clearfix" data-percent="70%">
                        <div class="skillbar-title programmation_title"><span>PHP</span></div>
                        <div class="skillbar-bar programmation_bar"></div>
                    </div>

                    <div class="skillbar clearfix" data-percent="60%">
                        <div class="skillbar-title programmation_title"><span>MySQL</span></div>
                        <div class="skillbar-bar programmation_bar"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col s12 m12 l12">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title center-align">Frameworks</span>

                    <div class="skillbar clearfix" data-percent="90%">
                        <div class="skillbar-title frameworks_title"><span>Materialize</span></div>
                        <div class="skillbar-bar frameworks_bar"></div>
                    </div>

                    <div class="skillbar clearfix" data-percent="80%">
                        <div class="skillbar-title frameworks_title"><span>Jquery</span></div>
                        <div class="skillbar-bar frameworks_bar"></div>
                    </div>

                    <div class="skillbar clearfix" data-percent="80%">
                        <div class="skillbar-title frameworks_title"><span>Bootstrap</span></div>
                        <div class="skillbar-bar frameworks_bar"></div>
                    </div>

                    <div class="skillbar clearfix" data-percent="70%">
                        <div class="skillbar-title frameworks_title"><span>Highcharts</span></div>
                        <div class="skillbar-bar frameworks_bar"></div>
                    </div>

                    <div class="skillbar clearfix" data-percent="55%">
                        <div class="skillbar-title frameworks_title"><span>Symfony</span></div>
                        <div class="skillbar-bar frameworks_bar"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col s12 m12 l12">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title center-align">Langue</span>

                    <div class="skillbar clearfix" data-percent="85%">
                        <div class="skillbar-title langues_title"><span>Anglais</span></div>
                        <div class="skillbar-bar langues_bar"></div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="../js/index.js"></script>

</body>
</html>