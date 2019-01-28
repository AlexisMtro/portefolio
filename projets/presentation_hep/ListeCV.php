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

	include 'menu.php';


	$reqCountEcole = $bdd->prepare("SELECT count(id_ecole) FROM ecole ") ;
	$reqCountEcole->execute();
	$resultatCountEcole = $reqCountEcole->fetch();

	$reqNomEcole = $bdd->prepare("SELECT nom_ecole FROM ecole") ;
	$reqNomEcole->execute();
	$resultatNomEcole = $reqNomEcole->fetchAll();

	$value = count($resultatNomEcole) ; 
	?> 

	<div class="container">

		<FORM method="post">
			<SELECT name="Ecole" size="1">
				<OPTION>Sélectionnez une école</OPTION>
				<?php

				for($i = 0 ; $i < $value ; $i++ ){
					?><OPTION><?php echo $resultatNomEcole[$i]['nom_ecole']; ?></OPTION>
					<?php
				}
				?>
			</SELECT>

			<SELECT name="Annee" size="1">
				<OPTION>Sélectionnez une année</OPTION>
				<OPTION>Première année</OPTION>
				<OPTION>Deuxième année</OPTION>	
				<OPTION>Troisième année</OPTION>	
				<OPTION>Quatrième année</OPTION>	
				<OPTION>Cinquième année</OPTION>	
			</SELECT>

			<br>

			<input class="waves-effect waves-light btn indigo accent-4" type="submit" name="Valider" value="Trouver des CV">
		</FORM>
		
	</div>

	<?php 
	if(isset($_POST['Annee']) && isset($_POST['Ecole']) && isset($_POST['Valider'])){

		if($_POST['Valider']){
			if($_POST['Ecole'] != "Sélectionnez une école" && $_POST['Annee'] != "Sélectionnez une année")
			{
				$reqGetCV = $bdd->prepare('SELECT CV FROM utilisateur INNER JOIN ecole ON utilisateur.id_ecole = ecole.id_ecole INNER JOIN etude ON utilisateur.id_etude = etude.id_etude WHERE nom_ecole =  "' .$_POST['Ecole']. '" AND niveau_etude = "' .$_POST['Annee']. '" ');
				$reqGetCV->execute();
				$z = 0 ;
				while ($res = $reqGetCV->fetch()) {
					$resultatGetCV[$z] =  $res['CV'] ; 
					$z++ ; 
				} 
				$reqGetCV->closeCursor(); 			
				$valueCV = (int)count($resultatGetCV) ;
				if($valueCV >= 1){
					?>
					<table class="striped">
						<thead>
							<tr>
								<th class="center">Liste des CV</th>
							</tr>
						</thead>
						<?php
						for($x = 0 ; $x < $valueCV ; $x++){

							$reqGetNomPrenom = $bdd->prepare("SELECT nom,prenom FROM utilisateur WHERE CV =  '" .$resultatGetCV[$x]. "'");
							$reqGetNomPrenom->execute();
							$z = 0;
							while($res = $reqGetNomPrenom->fetch()){
								$resultatGetNomPrenom[$z] = $res['nom'] . ' ' . $res['prenom'];
								$z++;
							}

							?>

							<tbody>
								<tr>
									<td class="center"><a class="black-text center" href="<?php echo (string)$resultatGetCV[$x] ;?>" target="_blank"><?php echo (string)$resultatGetNomPrenom[0];?></a></td>
								</tr>
							</tbody>
						</table>

						<?php			    	
					}
				}
				else
				{

					$reqGetNomPrenom = $bdd->prepare("SELECT nom,prenom FROM utilisateur WHERE CV =  '" .$resultatGetCV. "'");
					$reqGetNomPrenom->execute();
					$resultatGetNomPrenom = $reqGetNomPrenom->fetch();

					?>

					<a href="<?php echo (string)$resultatGetCV['CV'] ;?>" target="_blank"><?php echo (string)$resultatGetNomPrenom;?></a>

					<?php	
				}
			}
			else{
				?><script>alert('Les deux listes déroulantes doivent être séléctionnez.');</script><?php
			}
		}

	}

	?>

	<a href="entreprise.php" class="waves-effect waves-light btn indigo accent-4 container" id="add">Ajouter un CV</a>


	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<script src="js/index.js"></script>

</body>
</html>