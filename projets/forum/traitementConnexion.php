<?php session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=workshop2;charset=utf8','root','');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

if(isset($_POST['connexionUtilisateur'])) {
    // VISITEUR
    if(isset($_POST['mail']))
        $mail=$_POST['mail'];
    else
        $mail="";

    if(isset($_POST['passwd']))
        $passwd=$_POST['passwd'];
    else
        $passwd="";

    // Vérification des identifiants

    $reqUtilisateur = $bdd->prepare('SELECT * FROM utilisateur WHERE mail = :mail AND passwd = :passwd'); 
    // Récupérer toutes les données de la table utilisateur lorsque le mail entré et le passwd entré correspondent bien avec la bdd
    
    $reqUtilisateur->execute(array(
        'mail' => $mail,
        'passwd' => $passwd));
    $resultatUtilisateur = $reqUtilisateur->fetch();

    if (!$resultatUtilisateur) { 
        ?>
        <script type="text/javascript">alert('La combinaison login/mot de passe ne correspond à personne.')</script>
        <?php
        include 'connexion.php';
    }
    else {
        $_SESSION['id_utilisateur'] = $resultatUtilisateur['id_utilisateur'];
        $_SESSION['mail'] = $resultatUtilisateur['mail'];
        header('Location: forum.php');

    }

}
?>