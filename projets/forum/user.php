<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<?php include 'redirectConnexion.php'; ?>
	<nav>
		<div class="nav-wrapper light-blue darken-4">
			<a class="brand-logo center">Workshop</a>
			<ul class="right">
				<li><a href="traitementDeconnexion.php"><i class="material-icons">settings_power</i></a></li>
			</ul>
			<ul class="left">
				<li><a href="#" onclick="history.go(-1);"><i class="material-icons">arrow_back</i></a></li>
			</ul>
		</div>
	</nav>

	<?php 

	$test2 = $_GET["idUser"];

	$sql2 = 'SELECT * FROM utilisateur WHERE id_utilisateur = "'.$test2.'"';
	$reponse2 = $bdd->query($sql2); 
	?>

	<h3 class="center">Votre profil</h3>
	<br>


	<?php

	while ($donnees2 = $reponse2->fetch()) { ?>

		



		<div class="input-field col s6">
			<input disabled value="<?php echo $donnees2["nom"]; ?>" id="first_name2" type="text" class="validate">
			<label class="active" for="first_name2">Nom</label>
		</div>


		<div class="input-field col s6">
			<input disabled value="<?php echo $donnees2["prenom"]; ?>" id="first_name2" type="text" class="validate">
			<label class="active" for="first_name2">Prenom</label>
		</div>

		<div class="input-field col s6">
			<input disabled value="<?php echo $donnees2["poste"]; ?>" id="first_name2" type="text" class="validate">
			<label class="active" for="first_name2">Poste</label>
		</div>

		<div class="input-field col s6">
			<input disabled value="<?php echo $donnees2["tel"]; ?>" id="first_name2" type="text" class="validate">
			<label class="active" for="first_name2">Telephone</label>
		</div>

		<div class="input-field col s6">
			<input disabled value="<?php echo $donnees2["mail"]; ?>" id="first_name2" type="text" class="validate">
			<label class="active" for="first_name2">Mail</label>
		</div>

		<div class="input-field col s6">
			<input disabled value="<?php echo $donnees2["lieu"]; ?>" id="first_name2" type="text" class="validate">
			<label class="active" for="first_name2">Lieu de travail</label>
		</div>

		<div class="input-field col s6">
			<input disabled value="<?php echo $donnees2["experience"]; ?>" id="first_name2" type="text" class="validate">
			<label class="active" for="first_name2">Experience</label>
		</div>

		<div class="input-field col s6">
			<input disabled value="<?php echo $donnees2["points"]; ?>" id="first_name2" type="text" class="validate">
			<label class="active" for="first_name2">Points</label>
		</div>

		<div class="input-field col s6">
			<input disabled value="<?php echo $donnees2["niveau"]; ?>" id="first_name2" type="text" class="validate">
			<label class="active" for="first_name2">Niveau</label>
		</div>

		<?php
	}
	?>

<br>

	<div class="center">
		<a class="waves-effect waves-light btn " href="changePassword.php?idUser=<?php echo $_SESSION['id_utilisateur']?>">Changer le mot de passe</a>
	</div>