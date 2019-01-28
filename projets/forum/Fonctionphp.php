
<?php 
	
	include "redirectConnexion.php" ;

	 
	$sql = 'SELECT commentaire.id_utilisateur FROM commentaire WHERE commentaire.id_commentaire = "'.$_GET["id_commentaire"].'"' ;
	
	$reponse = $bdd->query($sql);

	$donnees = $reponse->fetch() ; 

	$testsql = 'SELECT * FROM poucebleu WHERE id_utilisateur_emeteur = "'.$_SESSION['id_utilisateur'].'" AND id_commentaire = "'.$_GET["id_commentaire"].'" AND id_utilisateur_recepteur = "'.$donnees['id_utilisateur'] .'"' ; 

	$reponse1 = $bdd->query($testsql);

	$resFetch = $reponse1->fetch();

	var_dump($resFetch) ; 

if($resFetch == false){

		$requeteInsertPouce = $bdd->prepare('INSERT INTO poucebleu(id_utilisateur_emeteur, 
			id_commentaire, 
			id_utilisateur_recepteur) 
			VALUES(:id_utilisateur_emeteur, 
			:id_commentaire, 
			:id_utilisateur_recepteur)'); 

		$requeteInsertPouce->execute(array('id_utilisateur_emeteur' => (int)$_SESSION['id_utilisateur'], 
			'id_commentaire' => (int)$_GET["id_commentaire"],
			'id_utilisateur_recepteur' => (int)$donnees["id_utilisateur"]));

		$sql = 'UPDATE utilisateur set points = points +1 WHERE id_utilisateur= '.(int)$donnees["id_utilisateur"].'' ;
		$bdd->query($sql); 	


		$TestPoint = 'SELECT points FROM utilisateur where id_utilisateur = '.(int)$donnees["id_utilisateur"].'' ; 
		$resultation = $bdd->query($TestPoint);

		$donnage = $resultation->fetch() ; 
		var_dump($donnage["points"]) ; 

		if($donnage["points"] == 11){

			$sql3 = 'UPDATE utilisateur set points = 1 , niveau = niveau +1 WHERE id_utilisateur = '.(int)$donnees["id_utilisateur"].'' ; 
			$bdd->query($sql3); 	
		}	
}






?> 