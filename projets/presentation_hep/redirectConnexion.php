<?php
session_start();

try {
	$bdd = new PDO('mysql:host=localhost;dbname=workshopb3;charset=utf8','root','');
}
catch(Exception $e) {
	die('Erreur : '.$e->getMessage());
}

if(!isset($_SESSION['id_utilisateur'])) {
	header('Location: index.php');
}

?>