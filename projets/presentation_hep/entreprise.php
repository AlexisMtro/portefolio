<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/index.css">
</head>
<body>

	<?php
	include 'menu.php';
	?>

	<div class="section"></div>
	<main>
		<center>
			<div class="section"></div>

			<h5 class="indigo-text">Bienvenue, Veuillez vous connecter</h5>
			<div class="section"></div>

			<div class="container">
				<div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

					<form action="traitementConnexion.php" class="col s12" method="post">
						<div class='row'>
							<div class='col s12'>
							</div>
						</div>

						<div class='row'>
							<div class='input-field col s12'>
								<input type="text" class="validate"  name='mail' id='mail' required/>
								<label for='email'>Email :</label>
							</div>
						</div>

						<div class='row'>
							<div class='input-field col s12'>
								<input type="password" class="validate"  name='passwd' id='passwd' required/>
								<label for='password'>Mot de passe :</label>
							</div>
						</div>

						<br />
						<center>
							<div class='row'>
								<button class="waves-effect waves-light btn indigo accent-4" type='submit' name='connexionUtilisateur' role="button" value="Se connecter" id="submit" >Se connecter</button>
							</div>
						</center>
					</form>
				</div>
			</div>
		</center>

		<div class="section"></div>
		<div class="section"></div>
	</main>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<script src="js/index.js"></script>

</body>
</html>