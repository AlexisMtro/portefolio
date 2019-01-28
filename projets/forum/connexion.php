<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Connexion</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>

	<nav>
		<div class="nav-wrapper light-blue darken-4">
			<a class="brand-logo center">Workshop</a>
			<ul class="left">
			<li><a href="#" onclick="history.go(-1);"><i class="material-icons">arrow_back</i></a></li>
			</ul>
		</div>
	</nav>

	<br>
	
	<div class="center">
		<h3>Connectez-vous</h3>
	</div>

	<br>

	<div id="utilisateur">
		<div class="container">
			<div class="z-depth-1 grey lighten-4 row" id="bloc">
				<form class="col s12 m12" action="traitementConnexion.php" method="post">
					<div class='row'>
						<div class='input-field col s12 m12'>
							<i class="material-icons prefix">account_circle</i>
							<input class='validate' type='text' name='mail' id='mail' required/>
							<label for='mail'>Votre login</label>
						</div>
					</div>

					<div class='row'>
						<div class='input-field col s12 m12'>
							<i class="material-icons prefix">lock_outline</i>
							<input class='validate' type='password' name='passwd' id='passwd' required/>
							<label for='passwd'>Votre mot de passe</label>
						</div>
					</div>

					<br />

					<div class='row'>
						<button type='submit' name='connexionUtilisateur' role="button" value="Se connecter" class='col s12 m12 btn btn-large waves-effect light-blue darken-4' id="submit">Se connecter
							<i class="material-icons right">send</i>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<script src="js/index.js"></script>
</body>
</html>