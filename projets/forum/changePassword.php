<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Changer le mot de passe</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<?php include 'redirectConnexion.php'; ?>
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

<?php 

 if (isset($_POST['changePassword'])) {

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

            if ($passwd != $confirm)
            {
                echo "<script>alert(\"Vos mot de passe sont différents !\")</script>";
            } else {
                if (!empty($_POST['passwd'])
                    && !empty($_POST['confirm'])) {

                	   	$req = $bdd->prepare("UPDATE utilisateur SET passwd = '" . $_POST['passwd'] . "' WHERE id_utilisateur = " . $_SESSION['id_utilisateur']);

                    	$req->execute(array('passwd' =>$passwd));
                    	
                    	?>
                        <div class="center row">
                            <div class="col s12">
                        <span class="red-text">Vous avez bien changé votre mot de passe</span> 
                        </div>
                        </div><?php
                	} else {
                    	echo "<script>alert(\"Veuillez remplir tous les champs!\")</script>";
                	}
            	}
       		}
?>

<div class="container">
    <form method="POST" action="">

        <div class="input-field col s12">
            <label for="passwd">Nouveau mot de passe</label>
            <input type="password" id="passwd" name="passwd"/>
        </div>

        <div class="input-field col s12">
            <label for="confirm">Confirmer le mot de passe</label>
            <input type="password" id="confirm" name="confirm"/>
        </div>

        <div id="button" class="center">
            <input id="inscription" class="waves-effect waves-light btn form-control add_btn light-blue darken-4" type="submit" name="changePassword" value="Valider"/>
        </div>

    </form>

</div>