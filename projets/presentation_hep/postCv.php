<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Accueil EPSI</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/index.css">
	<title>Poste ton CV</title>
</head>

<body>

	<?php 
	require "menu.php" ; 
	$req1 = $bdd->prepare("SELECT CV FROM utilisateur WHERE id_utilisateur = " . $_SESSION['id_utilisateur']) ;
	$req1->execute();
	$resultatUtilisateur = $req1->fetch();
	$_SESSION['CV'] = $resultatUtilisateur['CV'] ;
	?>

	<h3 class="center">Ajoutez votre CV</h3>

	<div class="container">

      <a href="traitementDeconnexion.php" class="waves-effect waves-light btn tooltipped indigo accent-4" id="deco" data-position="bottom" data-delay="50" data-tooltip="Deconnexion"><i class="material-icons">power_settings_new</i></a>
            
		<form method="POST" action="" enctype="multipart/form-data">
			<div class="input-field col s12 center" id="parcourir">
				<input class="waves-effect waves-light btn grey darken-1" type="file" id="CV" name="CV"/>
			</div>
			<div id="button" class="center">
				<input id="post" class="waves-effect waves-light btn form-control add_btn indigo accent-4" type="submit" name="PostCV" value="Valider"/>
				<a class="waves-effect waves-light btn indigo accent-4" href="ListeCV.php">Retour</a>
			</div>
		</form>
	</div> 

	<?php
	if (isset($_POST['CV'])) {
		$CV = $_POST['CV'];
	} else {
		$CV = "";
	} 

	if (isset($_POST['PostCV'])) {
		if ($_POST['PostCV']) {
			if ($_FILES['CV']['size'] != 0) {
				if ($_FILES['CV']['size'] < 1048576){
					$extensions_valides = array('pdf');
					$extension_upload = strtolower(  substr(  strrchr($_FILES['CV']['name'], '.')  ,1)  );
					if (in_array($extension_upload,$extensions_valides)){ 
						$req = $bdd->prepare("UPDATE utilisateur SET CV = '" . $_FILES['CV']['name'] . "' WHERE id_utilisateur = " . $_SESSION['id_utilisateur']);
						$req->execute(array('CV' =>$CV));
						include "Upload_Fichier.php" ; 
						?>
						<div class="center row" id="ok">
							<div class="col s12">
								<span class="green-text">Votre CV a bien été envoyé</span> 
							</div>
						</div>
						<?php
					}else {
						?><script>alert('Extention de fichier incorrect.');</script><?php
					}
				} 
				else {
					?><script>alert('Ficher trop volumineux.');</script><?php
				} 
			} else
			{
				?><script>alert('Sélectionnez un fichier à enregistrer.');</script><?php
			}
		}
	}
	?>


	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<script src="js/index.js"></script>

</body>
</html>