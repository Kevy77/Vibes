<?php
require("config.php");
include("/index.php");
session_start();

$idUserSession = $_SESSION['idUserSession'];
$firstUserSession = $_SESSION['firstUserSession'];
$lastUserSession = $_SESSION['lastUserSession'];
$mailUserSession = $_SESSION['mailUserSession'];



$reponse = $bd->query("SELECT idUser FROM userListe WHERE idUser='".$idUserSession."'");
$donnees = $reponse->fetch();
if (empty($donnees['idUser']))
{
$sql = "INSERT INTO userListe (idUser,firstname,lastname,email) VALUES    ('".$idUserSession."','".$firstUserSession."','".$lastUserSession."','".$mailUserSession."')";
if ($conn->query($sql) === TRUE) {
    //echo "base creer avec succes";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

else
{
  //echo "deja connecté";

}

echo "<script type='text/javascript'>document.location.replace('pageAcceuil.php');</script>";




$conn->close();

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
  </body>
</html>
