<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Entreprise</title>
</head>

<body>
	<form action="entreprise.php" method="post">
		<input class='validate' type='text' name='mail' id='mail' required/>
		<label for='mail'>Votre login</label>
		<input class='validate' type='password' name='passwd' id='passwd' required/>
		<label for='passwd'>Votre mot de passe</label>

		<button type='submit' name='connexionUtilisateur' role="button" value="Se connecter" id="submit" >Se connecter</button>
	</form>
