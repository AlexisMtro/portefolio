<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<?php
/** 
 * Contient la division pour le sommaire, sujet à des variations suivant la 
 * connexion ou non d'un utilisateur, et dans l'avenir, suivant le type de cet utilisateur 
 * @todo  RAS
 */

?>
    <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">
    <?php      
      if (estVisiteurConnecte() ) {
          $idUser = obtenirIdUserConnecte() ;
          $lgUser = obtenirDetailVisiteur($idConnexion, $idUser);
          $nom = $lgUser['nom'];
          $prenom = $lgUser['prenom'];            
    ?>
        <h2>
    <?php  
            echo "Bienvenue,". " " . $nom . " " . $prenom ;
    ?>
        </h2>
        <h3>Visiteur médical</h3>        
    <?php
       }
    ?>  
      </div>  
<?php      
  if (estVisiteurConnecte() ) {
?>
        <ul id="menuList" class="row">
           <li class="smenu" id="accueil1">
              <a class="waves-effect waves-light btn" href="cAccueil.php" title="Page d'accueil">Accueil</a>
           </li>
           <li class="smenu" id="deco">
              <a class="waves-effect waves-light btn" href="cSeDeconnecter.php" title="Se déconnecter">Se déconnecter</a>
           </li>
           <li class="smenu" id="saisie">
              <a class="waves-effect waves-light btn" href="cSaisieFicheFrais.php" title="Saisie fiche de frais du mois courant">Saisie fiche de frais</a>
           </li>
           <li class="smenu" id="consult">
              <a class="waves-effect waves-light btn" href="cConsultFichesFrais.php" title="Consultation de mes fiches de frais">Mes fiches de frais</a>
           </li>
         </ul>
        <?php
          // affichage des éventuelles erreurs déjà détectées
          if ( nbErreurs($tabErreurs) > 0 ) {
              echo toStringErreurs($tabErreurs) ;
          }
  }
        ?>
    </div>
</body>
</html>




    