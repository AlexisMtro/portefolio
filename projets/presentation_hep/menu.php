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
</head>
<body>

	<?php 

	session_start();

	try {
		$bdd = new PDO('mysql:host=localhost;dbname=workshopb3;charset=utf8','root','');
	}
	catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}
	?>

	
	<nav class="nav-extended indigo accent-4">
		<div class="nav-wrapper">
			<a href="#" class="brand-logo"><img id="logo"src="images/logo.png"></a>
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="index.php">Accueil</a></li>
				<li><a href="vie.php">Vie Etudiante</a></li>
				<li><a href="ListeCV.php">Alternances/Stages</a></li>
				<li><a href="campus.php">Nos Ecoles</a></li>
			</ul>
			<ul class="side-nav" id="mobile-demo">
				<li><a href="index.php">Accueil</a></li>
				<li><a href="vie.php">Vie Etudiante</a></li>
				<li><a href="ListeCV.php">Alternances/Stages</a></li>
				<li><a href="campus.php">Nos Ecoles</a></li>
			</ul>
		</div>
	</nav>

	
</body>
</html>