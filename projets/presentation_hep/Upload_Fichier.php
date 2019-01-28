<?php

	$value = true ; 
	$id_user = $_SESSION['id_utilisateur']; 
	$recupnom = $_FILES['CV']['name'];
	$recupnom = mb_strtolower($recupnom, 'UTF-8');
	$recupnom = str_replace(
		array(
			'à', 'â', 'ä', 'á', 'ã', 'å',
			'î', 'ï', 'ì', 'í', 
			'ô', 'ö', 'ò', 'ó', 'õ', 'ø', 
			'ù', 'û', 'ü', 'ú', 
			'é', 'è', 'ê', 'ë', 
			'ç', 'ÿ', 'ñ', 
		),
		array(
			'a', 'a', 'a', 'a', 'a', 'a', 
			'i', 'i', 'i', 'i', 
			'o', 'o', 'o', 'o', 'o', 'o', 
			'u', 'u', 'u', 'u', 
			'e', 'e', 'e', 'e', 
			'c', 'y', 'n', 
		),
		$recupnom
	);
	$extensions_valides = array('pdf');
	$extension_upload = strtolower(  substr(  strrchr($_FILES['CV']['name'], '.')  ,1)  );
	$namedossier = $id_user; //nom dossier 
	$namefile = $namedossier.'/'.$recupnom; //nom fichier
	if ( in_array($extension_upload,$extensions_valides) ) 
	{
	}
	else
	{
	    echo "extension invalide";
	    $value = false ; 
	}
	if (file_exists($namedossier))
	{
	} 
	else 
	{	
		mkdir($id_user, 0777, true);
	}
	$resultat ; 
	if($value == true){

		$resultat = move_uploaded_file($_FILES['CV']['tmp_name'],$namefile);
		$req = $bdd->prepare("UPDATE utilisateur SET CV = '" . $namefile . "' WHERE id_utilisateur = " . $_SESSION['id_utilisateur']);
        $req->execute();
	} else
		{
			$resultat = false ; 
		}
	
	if($resultat == true){
		echo "" ;
	}else 
		{
			echo "Echec de l'enregistrement." ; 
		}

	?>