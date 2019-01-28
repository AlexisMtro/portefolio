<?php 

include 'menu.php';

if(isset($_POST['connexionUtilisateur'])) {

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
    
                <div class="center">
            <span class="red-text">Ce compte n'existe pas</span>
            </div>
            
        <?php
        include 'entreprise.php';
    }
    else {
        $_SESSION['id_utilisateur'] = $resultatUtilisateur['id_utilisateur'];
        $_SESSION['mail'] = $resultatUtilisateur['mail'];
        header('Location: postCv.php');

    }

}
?>