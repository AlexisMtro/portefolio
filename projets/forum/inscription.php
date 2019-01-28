<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <?php
    session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=workshop2;charset=utf8','root','');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
} 
    ?>

    <nav>
        <div class="nav-wrapper light-blue darken-4">
            <a class="brand-logo center">Workshop</a>
            <ul class="left hide-on-med-and-down">
            <li><a href="#" onclick="history.go(-1);"><i class="material-icons">arrow_back</i></a></li>
            </ul>
        </div>
    </nav>

    <br>

    <div class="center">
        <h3>Inscription</h3>
    </div>

    <br>

    <?php


    if (isset($_POST['createVisiteur'])) {

        if (isset($_POST['nom'])) {
            $nom = $_POST['nom'];
        } else {
            $nom = "";
        }

        if (isset($_POST['prenom'])) {
            $prenom = $_POST['prenom'];
        } else {
            $prenom = "";
        }

        if (isset($_POST['passwd'])) {
            $passwd = $_POST['passwd'];
        } else {
            $passwd = "";
        }

        if (isset($_POST['confirm'])) {
            $confirm = $_POST['confirm'];
        } else {
            $confirm = "";
        }

        if (isset($_POST['poste'])) {
            $poste = $_POST['poste'];
        } else {
            $poste = "";
        }

        if (isset($_POST['tel'])) {
            $tel = $_POST['tel'];
        } else {
            $tel = "";
        }

        if (isset($_POST['mail'])) {
            $mail = $_POST['mail'];
        } else {
            $mail = "";
        }

        if (isset($_POST['lieu'])) {
            $lieu = $_POST['lieu'];
        } else {
            $lieu = "";
        }

        if (isset($_POST['experience'])) {
            $experience = $_POST['experience'];
        } else {
            $experience = "";
        }

        $query=$bdd->prepare('SELECT COUNT(*) FROM utilisateur WHERE mail =:mail');
        $query->bindValue(':mail',$mail, PDO::PARAM_STR);
        $query->execute();
        $mail_free=($query->fetchColumn()==0)?1:0;
        $query->CloseCursor();


        if (!preg_match("#^[a-z0-9A-Z._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail))
        {
            echo "<script>alert(\"Votre adresse email n'a pas un format valide !\")</script>";
        } else {
            if ($passwd != $confirm)
            {
                echo "<script>alert(\"Vos mot de passe sont différents !\")</script>";
            } else {
                if(!$mail_free)
                {
                    echo "<script>alert(\"Votre adresse email est déjà utilisée par un membre !\")</script>";
                } else {
                    if (!empty($_POST['nom'])
                        && !empty($_POST['prenom'])
                        && !empty($_POST['passwd'])
                        && !empty($_POST['confirm'])
                        && !empty($_POST['poste'])
                        && !empty($_POST['tel'])
                        && !empty($_POST['mail'])
                        && !empty($_POST['lieu'])
                        && !empty($_POST['experience'])) {

                        $req = $bdd->prepare('INSERT INTO utilisateur(nom,
                            prenom,
                            passwd,
                            poste,
                            tel,
                            mail,
                            lieu,
                            experience)
                            VALUES(:nom,
                            :prenom,
                            :passwd,
                            :poste,
                            :tel,
                            :mail,
                            :lieu,
                            :experience)');

                    $req->execute(array('nom' => $nom,
                        'prenom' => $prenom,
                        'passwd' => $passwd,
                        'poste' => $poste,
                        'tel' => $tel,
                        'mail' => $mail,
                        'lieu' => $lieu,
                        'experience' => $experience));

                    header('Location: connexion.php');
                } else {
                    echo "<script>alert(\"Veuillez remplir tous les champs!\")</script>";
                }
            }
        }
    }
}
?>

<div class="container">
    <form method="POST" action="">

        <div class="input-field col s12">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom"/>
        </div>

        <div class="input-field col s12">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom"/>
        </div>

        <div class="input-field col s12">
            <label for="passwd">Mot de passe</label>
            <input type="password" id="passwd" name="passwd"/>
        </div>

        <div class="input-field col s12">
            <label for="confirm">Confirmer le mot de passe</label>
            <input type="password" id="confirm" name="confirm"/>
        </div>

        <div class="input-field col s12">
            <label for="poste">Poste</label>
            <input type="text" id="poste" name="poste"/>
        </div>

        <div class="input-field col s12">
            <label for="tel">Téléphone</label>
            <input type="text" id="tel" name="tel"/>
        </div>

        <div class="input-field col s12">
            <label for="mail">Adresse email</label>
            <input type="text" id="mail" name="mail">
        </div>

        <div class="input-field col s12">
            <label for="lieu">Lieu de travail</label>
            <input type="text" id="lieu" name="lieu"/>
        </div>

        <div class="input-field col s12">
            <label for="experience">Expérience</label>
            <input type="text" id="experience" name="experience"/>
        </div>

        <br>

        <div id="button" class="center">
            <input id="inscription" class="waves-effect waves-light btn form-control add_btn light-blue darken-4" type="submit" name="createVisiteur" value="Valider"/>
        </div>

    </form>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="js/index.js"></script>

</body>

</html>