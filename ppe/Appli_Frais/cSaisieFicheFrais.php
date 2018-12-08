<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>


<?php
header('Content-Type: text/html; charset=UTF-8');
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Saisir fiche de frais"
 * @package default
 * @todo  RAS
 */
  $repInclude = './include/';
  require($repInclude . "_init.inc.php");

  // page inaccessible si visiteur non connecté
  if (!estVisiteurConnecte()) {
      header("Location: cSeConnecter.php");  
  }
  require($repInclude . "_entete.inc.html");
  require($repInclude . "_sommaire.inc.php");
  // affectation du mois courant pour la saisie des fiches de frais
  $mois = sprintf("%04d%02d", date("Y"), date("m"));
  // vérification de l'existence de la fiche de frais pour ce mois courant
  $existeFicheFrais = existeFicheFrais($idConnexion, $mois, obtenirIdUserConnecte());
  // si elle n'existe pas, on la crée avec les élets frais forfaitisés à 0
  if ( $existeFicheFrais == false ) {
      $test = ajouterFicheFrais($idConnexion, $mois, obtenirIdUserConnecte());
  }
  // acquisition des données entrées
  // acquisition de l'étape du traitement 
  $etape=lireDonnee("etape","demanderSaisie");
  // acquisition des quantités des éléments forfaitisés 
  $tabQteEltsForfait=lireDonneePost("txtEltsForfait", "");
  //var_dump(modifierEltsForfait($idConnexion, $mois, obtenirIdUserConnecte(),$tabQteEltsForfait));
  // acquisition des données d'une nouvelle ligne hors forfait
  $idLigneHF = lireDonnee("idLigneHF", "");
  $dateHF = lireDonnee("txtDateHF", "");
  $libelleHF = lireDonnee("txtLibelleHF", "");
  $montantHF = lireDonnee("txtMontantHF", "");
 
  // structure de décision sur les différentes étapes du cas d'utilisation
  

  if ($etape == "validerSaisie" || $etape == "validerAjoutLigneHF") { 
      // l'utilisateur valide les éléments forfaitisés         
      // vérification des quantités des éléments forfaitisés
      $ok = verifierEntiersPositifs($tabQteEltsForfait); 
      if (!$ok) {
          ajouterErreur($tabErreurs, "Chaque quantité doit être renseignée et numérique positive.");
      }
      else { // mise à jour des quantités des éléments forfaitisés
          modifierEltsForfait($idConnexion, $mois, obtenirIdUserConnecte(),$tabQteEltsForfait);
      }
  }                                                       
  elseif ($etape == "validerSuppressionLigneHF") {
      supprimerLigneHF($idConnexion, $idLigneHF);
      header('Location:cSaisieFicheFrais.php');
  }
  if ($etape == "validerAjoutLigneHF") {
      verifierLigneFraisHF($dateHF, $libelleHF, $montantHF, $tabErreurs);
      if ( nbErreurs($tabErreurs) == 0 ) {
          // la nouvelle ligne ligne doit être ajoutée dans la base de données
          ajouterLigneHF($idConnexion, $mois, obtenirIdUserConnecte(), $dateHF, $libelleHF, $montantHF);
      }
  }
  else { // on ne fait rien, étape non prévue 
  
  }                                  
?>
  <!-- Division principale -->
  <div id="contenu">
      <h2>Renseigner ma fiche de frais du mois de <?php echo obtenirLibelleMois(intval(substr($mois,4,2))) . " " . substr($mois,0,4); ?></h2>
<?php
  if ($etape == "validerSaisie" || $etape == "validerAjoutLigneHF" || $etape == "validerSuppressionLigneHF") {
      if (nbErreurs($tabErreurs) > 0) {
          echo toStringErreurs($tabErreurs);
      } 
      else {
?>
      <p class="info">Les modifications de la fiche de frais ont bien été enregistrées</p>        
<?php
      }   
  }
      ?>            
      <form action="" method="post">
      <div class="corpsForm">
          <input type="hidden" name="etape" value="validerSaisie" />
          <fieldset>
            <legend>Eléments forfaitisés
            </legend>
      <?php          
            // demande de la requête pour obtenir la liste des éléments 
            // forfaitisés du visiteur connecté pour le mois demandé
            $req = obtenirReqEltsForfaitFicheFraisBis($mois, obtenirIdUserConnecte());
            $idJeuEltsFraisForfait = mysqli_query($idConnexion, $req); 
            echo mysqli_error($idConnexion);
            $lgEltForfait = mysqli_fetch_assoc($idJeuEltsFraisForfait);
            
            while ( is_array($lgEltForfait) ) {
                $idFraisForfait = $lgEltForfait["idFraisForfait"];
                $libelle = $lgEltForfait["libelle"];
                $quantite = $lgEltForfait["quantite"];
                
            ?>
            <p>
              <label for="<?php echo $idFraisForfait ?>"><?php echo $libelle; ?> : </label>
              <input type="text" id="<?php echo $idFraisForfait ?>" 
                    name="txtEltsForfait[<?php echo $idFraisForfait ?>]" 
                    size="10" maxlength="5"
                    title="Entrez la quantité de l'élément forfaitisé" 
                    value="<?php echo $quantite; ?>" />
            </p>
            <?php        
                $lgEltForfait = mysqli_fetch_assoc($idJeuEltsFraisForfait); 
                
            }
            mysqli_free_result($idJeuEltsFraisForfait);
            
            ?>
            <div class="piedForm">
      
      </div>
          </fieldset>
      </div>
      
    </table>
      <form action="" method="post">
      <div class="corpsForm">
          <input type="hidden" name="etape" value="validerAjoutLigneHF" />
          <fieldset>
            <legend>Nouvel élément hors forfait
            </legend>
            <p>
              <label for="txtDateHF">Date : </label>
              <input type="text" id="txtDateHF" name="txtDateHF" size="30" maxlength="10" 
                     title="Entrez la date d'engagement des frais au format JJ/MM/AAAA" 
                     value="<?php echo $dateHF; ?>"  />
            </p>
            <p>
              <label for="txtLibelleHF">Libellé : </label>
              <input type="text" id="txtLibelleHF" name="txtLibelleHF" size="30" maxlength="35" 
                    title="Entrez un bref descriptif des frais" 
                    value="<?php echo filtrerChainePourNavig($libelleHF); ?>"  />
            </p>
            <p>
              <label for="txtMontantHF">Montant : </label>
              <input type="text" id="txtMontantHF" name="txtMontantHF" size="30" maxlength="10" 
                     title="Entrez le montant des frais (le point est le séparateur décimal)" value="<?php echo $montantHF; ?>"  />
            </p>
            
            <div class="piedForm">

      </div>
        
      </form>
  	<table class="listeLegere">
  	   <caption>Descriptif des éléments hors forfait
       </caption>
             <tr>
                <th class="date">Date</th>
                <th class="libelle">Libellé</th>
                <th class="montant">Montant</th>  
                <th class="action">&nbsp;</th>              
             </tr>
<?php          
          // demande de la requête pour obtenir la liste des éléments hors
          // forfait du visiteur connecté pour le mois demandé
          $req = obtenirReqEltsHorsForfaitFicheFrais($mois, obtenirIdUserConnecte());
          $idJeuEltsHorsForfait = mysqli_query($idConnexion, $req);
          $lgEltHorsForfait = mysqli_fetch_assoc($idJeuEltsHorsForfait);
          
          // parcours des frais hors forfait du visiteur connecté
          while ( is_array($lgEltHorsForfait) ) {
          ?>
              <tr>
                <td><?php echo $lgEltHorsForfait["date"] ; ?></td>
                <td><?php echo filtrerChainePourNavig($lgEltHorsForfait["libelle"]) ; ?></td>
                <td><?php echo $lgEltHorsForfait["montant"] ; ?></td>
                <td><a href="?etape=validerSuppressionLigneHF&amp;idLigneHF=<?php echo $lgEltHorsForfait["id"]; ?>"
                       onclick="return confirm('Voulez-vous vraiment supprimer cette ligne de frais hors forfait ?');"
                       title="Supprimer la ligne de frais hors forfait">Supprimer</a></td>
              </tr>
          <?php
              $lgEltHorsForfait = mysqli_fetch_assoc($idJeuEltsHorsForfait);
              
          }
          mysqli_free_result($idJeuEltsHorsForfait);
          
          
          
?>
              
          </fieldset>
          
      </div>
      
        
      </form>
      
  </div>
  
  <p>
        <input id="ajouter" type="submit" value="Ajouter" size="20" 
               title="Ajouter la nouvelle ligne hors forfait" />
        <input id="effacer" type="reset" value="Effacer" size="20" />
      </p> 
  
<?php        
  require($repInclude . "_pied.inc.html");
  require($repInclude . "_fin.inc.php");
  
?> 
</body>
</html>

