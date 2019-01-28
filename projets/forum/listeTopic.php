<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Topic</title>
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
			<ul class="left">
				<li><a href="#" onclick="history.go(-1);"><i class="material-icons">arrow_back</i></a></li>
			</ul>
		</div>
	</nav>

	<?php

	$test1 = $_GET["id1"];

	$sql1 = 'SELECT * FROM topic WHERE id_categorie = "'.$test1.'"';
	$reponse1 = $bdd->query($sql1);

	?>
<h3 class="center">Liste des Topic</h3>
<br>
<a class="waves-effect waves-light btn" href="createTopic.php"><i class="material-icons left">add_circle</i>Nouveau Topic</a>
<br>
<br>
	<table>
		<thead>
			<tr>
				<th>Titre du topic</th>
				<th>Date</th>
			</tr>
		</thead>
		<?php while ($donnees1 = $reponse1->fetch()) { 
			?>
			<tbody>

				<tr>
					<td><a href="topic.php?id=<?php echo $donnees1['id_topic']?>"><?php echo $donnees1['titre_topic'];?></a></td>
					<td><a href="topic.php?id=<?php echo $donnees1['id_topic']?>"><?php echo $donnees1['date_topic'];?></a></td>
				</tr>
				<?php

			}
			?>
		</tbody>
	</table>



</body>
</html>