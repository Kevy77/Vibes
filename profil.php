<?php
require("config.php");
include("/index.php");
session_start();

$idUserSession = $_SESSION['idUserSession'];
$firstUserSession = $_SESSION['firstUserSession'];
$lastUserSession = $_SESSION['lastUserSession'];
$mailUserSession = $_SESSION['mailUserSession'];



?>
<?php
$reponseP = mysql_query ("SELECT imageUser FROM userListe WHERE idUser='".$idUserSession."'");
$reponse = mysql_query ("SELECT cheminMusique,idMusique,nomMusique FROM musique WHERE idUser='".$idUserSession."'");
$reponseCC = mysql_query ("SELECT coupDeCoeur.idArtiste, musique.cheminMusique , musique.nomMusique , userListe.firstname FROM coupDeCoeur, musique , userListe WHERE coupDeCoeur.IdUser = '".$idUserSession."' AND musique.idMusique = coupDeCoeur.idMusique AND coupDeCoeur.idArtiste = userListe.idUser");
$reponseF = mysql_query ("SELECT userListe.firstname, userListe.lastname FROM userListe, follow WHERE follow.idUser = '".$idUserSession."' AND userListe.idUser = follow.idFollower");

?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <ul>
      <li><a href="http://algo-team.hkcreativity.com/formUploadMusique.php"><h2>upload de musique</h2></a></li>
      <li><a href="http://algo-team.hkcreativity.com/listeMembre.php"><h2>liste des membre</h2></a></li>
      <li><a href="http://algo-team.hkcreativity.com/listeMusique.php"><h2>liste des musique</h2></a></li>
      <li><a href="http://algo-team.hkcreativity.com/profil.php"><h2>profil</h2></a></li>
    </ul>

<h1>Profil</h1>
<?php
while ($donneesP = mysql_fetch_array($reponseP)) // On boucle pour afficher toutes les données et on met toutes données dans un tableau
{
?>
<?php $srcCheminAvatar = $donneesP['imageUser'];?>
<img src="<?= $srcCheminAvatar ?>" width="100px" height="auto"/></br>
<?php
}
?>

<?php echo $firstUserSession; ?> </br>
<?php echo $lastUserSession; ?> </br>




<h1>mes musique</h1>
<?php
while ($donnees = mysql_fetch_array($reponse)) // On boucle pour afficher toutes les données et on met toutes données dans un tableau
{
?>
<?php $srcCheminMusique = $donnees['cheminMusique'];?>
<?php $idMusiqueCC = $donnees['idMusique'];?>
<?php $nomMusiqueUser = $donnees['nomMusique'];?>
<?php echo "titre de la musique :  $nomMusiqueUser";?></br>
<audio src="<?= $srcCheminMusique ?>" controls=""></audio></br>
<!---Coup de coeur -->
<!--<form method="post" action="coupDeCoeur.php" enctype="multipart/form-data">
<input type="text" name="idMusiqueCC" value="<?php// echo $idMusiqueCC ?>" id="idMusiqueCC" /><br />
<input type="submit" name="submit" value="Envoyer" />
</form>-->
<?php
}
?>

<h1>coup de coeur</h1>

<?php
while ($donneesCC = mysql_fetch_array($reponseCC)) // On boucle pour afficher toutes les données et on met toutes données dans un tableau
{
?>
<?php $cheminMusiqueCC = $donneesCC['cheminMusique'];?>
<?php $nomArtisteCC = $donneesCC['firstname'];?>
<?php $titreMusiqueCC = $donneesCC['nomMusique'];?>
<?php echo "artiste :  $nomArtisteCC";?></br>
<?php echo "titre de la musique :  $titreMusiqueCC";?></br>
<audio src="<?= $cheminMusiqueCC ?>" controls=""></audio></br>

<?php
}
?>

<h1>follow</h1>

<?php
while ($donneesF = mysql_fetch_array($reponseF)) // On boucle pour afficher toutes les données et on met toutes données dans un tableau
{
?>
<?php $prenomFollow = $donneesF['firstname'];?>
<?php $nomFollow = $donneesF['lastname'];?>
<?php echo $prenomFollow;?></br>
<?php echo $nomFollow;?></br>
</br>
<?php echo"-------------"?></br>
</br>

<?php
}
?>

<h1>photo de profil</h1>
<form method="post" action="avatarUser.php" enctype="multipart/form-data">
  <label for="icone">fichier JPG </label><br />
  <input type="file" name="icone" id="icone" /><br />
  <input type="submit" name="submit" value="Envoyer" />
</form>

</body>
</html>
<a href="http://algo-team.hkcreativity.com/logOut.php">log out</a>
<?php
mysql_close(); // On oubli pas de déconnecter la base de données
?>
