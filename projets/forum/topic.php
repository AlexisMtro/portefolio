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

	if(isset($_POST["champ"])){
		$champ =  $_POST["champ"] ; 
	}


	if(isset($_POST["createCom"]) && !empty($_POST['champ'])){

		$requeteInsertCom = $bdd->prepare('INSERT INTO commentaire(champ, 
			date_commentaire, 
			id_topic, 
			id_utilisateur) 
			VALUES(:champ, 
			:date_commentaire, 
			:id_topic, 
			:id_utilisateur)'); 

		$dateCom = date("Y-m-d H:i") ; 

		$requeteInsertCom ->execute(array('champ' => $champ, 
			'date_commentaire' => $dateCom,
			'id_topic' => $_GET["id"], 
			'id_utilisateur' => $_SESSION['id_utilisateur']));
	}


	$test = $_GET["id"] ; 

	$sql = 'SELECT * FROM topic INNER JOIN utilisateur ON utilisateur.id_utilisateur = topic.id_utilisateur WHERE id_topic = "'.$test.'"';
	$reponse = $bdd->query($sql);

	$sql2 = 'SELECT commentaire.id_commentaire, commentaire.champ, commentaire.date_commentaire, commentaire.id_utilisateur ,utilisateur.nom , utilisateur.prenom FROM commentaire INNER JOIN utilisateur ON commentaire.id_utilisateur = utilisateur.id_utilisateur WHERE id_topic = "'.$test.'"' ;
	$reponse2 = $bdd->query($sql2);


	?>



	<?php 

	$donnees = $reponse->fetch()
	?>
	<h3 class="center"><?php echo $donnees["titre_topic"] ; ?></h3>
	<br>

	<div class="col s12 m6">
		<div class="card grey darken-1">
			<div class="card-content white-text">
				<span class="card-title center"><?php echo $donnees["nom"] . ' ' . $donnees["prenom"]; ?></span>
				<p class="center"><?php echo $donnees["champ_topic"] ; ?></p>
			</div>
			<div class="card-action center">
				<a href="#"><?php echo $donnees["date_topic"] ; ?></a>
			</div>
		</div>
	</div>

	<br>
	<br>
	<br>
	<table class="bordered">
		<thead>
				<tr>
					<th>Like</th>
					<th>Nombre de Like</th>
					<th>Auteur</th>
					<th>Champs</th>
					<th>Date de publication</th>
				</tr>
			</thead>
		<?php while ($donnees2 = $reponse2->fetch()) { ?>

			<tbody>
				<tr>
					<td class="pouce_bleu"><a ><i id="like" class="material-icons add_like" name='<?php echo $donnees2["id_commentaire"] ; ?>'>thumb_up</i></a></td>
					<td><?php $result = GetNombrePouce($donnees2["id_commentaire"]) ; echo $result;  ?></td>
					<td><?php echo $donnees2["nom"] . ' ' . $donnees2["prenom"]; ?></td>
					<td><?php echo $donnees2["champ"] ; ?></td>
					<td><?php echo $donnees2["date_commentaire"] ;?></td>
				</tr>
				<?php 

			}


			?>

		</tbody>
	</table>

	<br>
	<br>

	<?php	
	
	function GetNombrePouce($IdCom){

		$sql = 'SELECT count(id_pouce) as Nombre FROM poucebleu WHERE id_commentaire = "'.$IdCom.'"' ;

		try {
			$bdd = new PDO('mysql:host=localhost;dbname=workshop2;charset=utf8','root','');
		}
		catch(Exception $e) {
			die('Erreur : '.$e->getMessage());
		}
		$reponse = $bdd->query($sql);
		$test = $reponse->fetch() ; 

		return $test["Nombre"] ; 


	}

	?>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script type="text/javascript">
		$( document ).ready(function() {
			$('.add_like').click(function() {
				var id_com = $(this).attr("name");
				$.ajax({
					url : "Fonctionphp.php",
					type : "GET",
					data : "id_commentaire=" + id_com, 
					dataType : "html"  
				});
			});
		});
	</script>



	<form method="post">
		<div class="input-field col s12">
			<textarea id="textarea1" class="materialize-textarea" name="champ"></textarea>
			<label for="textarea1">Commentaire : </label>
		</div>

		<input class="waves-effect waves-light btn form-control add_btn light-blue darken-4" type="submit" name="createCom" value="Valider" id="go" />
	</form>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<script src="js/index.js"></script>

</body>
</html>


