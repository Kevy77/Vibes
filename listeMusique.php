<?php
require("config.php");
include("/index.php");
session_start();

$idUserSession = $_SESSION['idUserSession'];
$firstUserSession = $_SESSION['firstUserSession'];
$lastUserSession = $_SESSION['lastUserSession'];
$mailUserSession = $_SESSION['mailUserSession'];



?>
<ul>
  <li><a href="http://algo-team.hkcreativity.com/formUploadMusique.php"><h2>upload de musique</h2></a></li>
  <li><a href="http://algo-team.hkcreativity.com/listeMembre.php"><h2>liste des membre</h2></a></li>
  <li><a href="http://algo-team.hkcreativity.com/listeMusique.php"><h2>liste des musique</h2></a></li>
  <li><a href="http://algo-team.hkcreativity.com/profil.php"><h2>profil</h2></a></li>
</ul>

<h1>LISTE DES MUSIQUE</h1>
<?php
 $reponse = mysql_query ("SELECT cheminMusique,idMusique FROM musique "); // Requête SQL
//requete pour seulement nos musique upload ==== $reponse = mysql_query ("SELECT cheminMusique,idMusique FROM musique WHERE idUser='".$idUserSession."'");
$srctest = "musique/245354419157848/245354419157848musique.mp3";
 while ($donnees = mysql_fetch_array($reponse)) // On boucle pour afficher toutes les données et on met toutes données dans un tableau
 {
?>

<?php $srcCheminMusique = $donnees['cheminMusique'];?>
<?php $idMusiqueCC = $donnees['idMusique'];?>
<audio src="<?= $srcCheminMusique ?>" controls=""></audio>
<form method="post" action="coupDeCoeur.php" enctype="multipart/form-data">
<input type="text" name="idMusiqueCC" value="<?php echo $idMusiqueCC ?>" id="idMusiqueCC" /><br /> <!-- a cacher en display none-->
<input type="submit" name="submit" value="Envoyer" />
<?php echo $idMusiqueCC ?>
</form>
<?php
 }
 mysql_close(); // On oubli pas de déconnecter la base de données
?>
