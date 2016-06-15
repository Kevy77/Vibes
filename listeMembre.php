<?php
require("config.php");
include("/index.php");
session_start();


$idUserSession = $_SESSION['idUserSession'];
$firstUserSession = $_SESSION['firstUserSession'];
$lastUserSession = $_SESSION['lastUserSession'];
$mailUserSession = $_SESSION['mailUserSession'];



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

<h1>liste des membres</h1>
<?php
$reponse = mysql_query ("SELECT firstname,lastname,idUser,imageUser FROM userListe");

while ($donnees = mysql_fetch_array($reponse)) // On boucle pour afficher toutes les données et on met toutes données dans un tableau
{
?>
<?php $idUserFollow= $donnees['idUser'];?>
<?php $prenomUser= $donnees['firstname'];?>
<?php $nomUser= $donnees['lastname'];?>
<?php $srcCheminAvatar = $donnees['imageUser'];?>
<img src="<?= $srcCheminAvatar ?>" width="100px" height="auto"/></br>
<?php echo $prenomUser;?></br>
<?php echo $nomUser;?></br>
<form method="post" action="follow.php" enctype="multipart/form-data">
<input type="text" name="idUserFollow" value="<?php echo $idUserFollow ?>" id="idUserFollow" /><br /> <!-- a cacher en display none-->
<input type="submit" name="submit" value="Envoyer" />
</form>
</br>
<?php echo"-------------"?></br>
</br>
<?php
}
mysql_close(); // On oubli pas de déconnecter la base de données
?>
</body>
</html>
