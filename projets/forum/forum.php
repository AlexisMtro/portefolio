<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forum</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
		</div>
	</nav>

	<br>

	<div class="center">
		<h3>Forum Workshop</h3>
	</div>

	<br>
	
	<?php 

	$sql = 'SELECT * FROM topic ORDER BY date_topic DESC LIMIT 5';
	$reponse = $bdd->query($sql); 

	$sql1 = 'SELECT DISTINCT * FROM categorie';
	$reponse1 = $bdd->query($sql1); 
	?>



	<div class="row">

		<div class="col s9">

			<table class="bordered highlight">
				<thead>
					<tr>
						<th>Entraide informatique</th>
					</tr>
				</thead>
				<?php while ($donnees1 = $reponse1->fetch()) {  ?>
					<tbody>
						<tr>
							<td><a href="listeTopic.php?id1=<?php echo $donnees1['id_categorie']?>" class="black-text"><?php echo $donnees1['nom_categorie'];?></a></td>
						</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>

			<div class="col s3">

				<table class="bordered highlight">
					<thead>
						<tr>

							<th>Derniers Sujets</th>

						</tr>
					</thead>

					<?php while ($donnees = $reponse->fetch()) {  
						?>
						<tbody>
							<tr>
								<td><a href="topic.php?id=<?php echo $donnees['id_topic'] ?>" class="black-text"><?php echo $donnees['titre_topic'];?></a></td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>

			</div>

		</div>








		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
		<script src="js/index.js"></script>

	</body>
	</html>