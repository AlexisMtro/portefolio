<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Création d'un topic</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">

</head>

<body>

    <?php
    include "redirectConnexion.php" ; 
    ?>

    <nav>
        <div class="nav-wrapper light-blue darken-4">
            <a class="brand-logo center">Workshop</a>
            <ul class="right">
                <li><a href="user.php?idUser=<?php echo $_SESSION['id_utilisateur']?>"><i class="material-icons">account_circle</i></a></li>
                <li><a href="traitementDeconnexion.php"><i class="material-icons">settings_power</i></a></li>
            </ul>
            <ul class="left">
                <li><a href="#" onclick="history.go(-2);"><i class="material-icons">arrow_back</i></a></li>
            </ul>
        </div>
    </nav>
    
    <br>

    <div class="center">
        <h3>Créer un nouveau topic</h3>
    </div>

    <br>

    <?php 

    if(isset($_POST['createTopic'])) {   

        if(isset($_POST['id_utilisateur']))
            $id_utilisateur=$_POST['id_utilisateur'];
        else
            $id_utilisateur="";

        if(isset($_POST['date_topic']))
            $date_topic=$_POST['date_topic'];
        else
            $date_topic="";

        if(isset($_POST['id_categorie']))
            $id_categorie=$_POST['id_categorie'];
        else
            $id_categorie="";

        if(isset($_POST['titre_topic']))
            $titre_topic=$_POST['titre_topic'];
        else
            $titre_topic="";

        if(isset($_POST['champ_topic']))
            $champ_topic=$_POST['champ_topic'];
        else
            $champ_topic="";


        if(!empty($_POST['id_utilisateur'])
            &&!empty($_POST['date_topic'])
            &&!empty($_POST['id_categorie'])
            &&!empty($_POST['titre_topic'])
            &&!empty($_POST['champ_topic'])) { 
        // Test si les champs ne sont pas vides     

            $req = $bdd->prepare('INSERT INTO topic(id_utilisateur, 
                date_topic, 
                id_categorie, 
                titre_topic, 
                champ_topic) 
                VALUES(:id_utilisateur, 
                :date_topic, 
                :id_categorie, 
                :titre_topic, 
                :champ_topic)'); 
            // Inserer valeurs dans la table rapport_visite

        $req ->execute(array('id_utilisateur' => $id_utilisateur, 
            'date_topic' => $date_topic,
            'id_categorie' => $id_categorie, 
            'titre_topic' => $titre_topic, 
            'champ_topic' => $champ_topic));
            ?>
            <div class="center col s12">
                <span class="red-text">Vous avez bien changé votre mot de passe</span> 
            </div>
            <?php
        }
        else {
            echo "<script>alert(\"Veuillez remplir tous les champs!\")</script>";
        }
    } 

    ?>

    <div class="container">
        <form method="POST" action="">

            <div class="input-field col s12" hidden>
                <label for="id_utilisateur" >Utilisateur</label>
                <input readonly type="text" id="id_utilisateur" name="id_utilisateur" value="<?php echo $_SESSION['id_utilisateur'] ?>"/>   
            </div>  

            <div class="input-field col s12" hidden>
                <label for="date_topic">Date</label><br />
                <input type="text" readonly  id="date_topic" name="date_topic" value ="<?php echo date("Y-m-d H:i")?> ">
            </div> 

            <div class="input-field col s12">
                <label for="id_categorie">Catégorie</label><br />
                <select name="id_categorie" id="id_categorie">
                    <option value="" disabled selected>Choisissez une catégorie</option
                        <?php
                        $reponse = $bdd->prepare('SELECT id_categorie,nom_categorie FROM categorie');
                        $reponse->execute();
                        $donnees = $reponse->fetchAll();
                        foreach ($donnees as $v):?>
                            <option value="<?= $v['id_categorie'] ?>"><?= $v['nom_categorie'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div> 

                <div class="input-field col s12">
                    <label for="titre_topic">Titre du topic</label> 
                    <input type="text" id="titre_topic" name="titre_topic"/>  
                </div> 

        <!-- <div class="input-field col s12">
            <label for="champ_topic">Champ</label>  
            <input type="text" id="champ_topic" name="champ_topic"/> 
        </div>  -->

        <div class="input-field col s12">
          <textarea type="text" id="champ_topic" class="materialize-textarea" name="champ_topic"></textarea>
          <label for="champ_topic">Champ</label>
      </div>

      <br>

      <div id="button" class="center">
        <input class="waves-effect waves-light btn form-control add_btn light-blue darken-4" type="submit" name="createTopic" value="Valider"/>
    </div>


</form>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="js/index.js"></script>

</body>

</html>