<?php
require("config.php");
include("/index.php");
session_start();


$accessToken = $_SESSION['accessToken'];
if (isset($_SESSION['facebook_access_token'])) {
$idUserSession = $_SESSION['idUserSession'];
$firstUserSession = $_SESSION['firstUserSession'];
$lastUserSession = $_SESSION['lastUserSession'];
$mailUserSession = $_SESSION['mailUserSession'];
$reponseP = mysql_query ("SELECT imageUser FROM userListe WHERE idUser='".$idUserSession."'");
$reponseFo = mysql_query ("SELECT nbFollow,nbTracks FROM userListe WHERE idUser='".$idUserSession."'");
$reponseNew = mysql_query ("SELECT musique.idMusique , musique.cheminMusique , musique.nomMusique , userListe.firstname , musique.icone FROM musique , userListe WHERE musique.idUser = userListe.idUser");
?>

<?php
$idMusiqueCC = $_POST['idMusiqueCC'];
?>

<?php
// Sélection de la base de données
$reponse = mysql_query ("SELECT idUser FROM musique WHERE idMusique='".$idMusiqueCC."'");
?>

<?php
while ($donnees = mysql_fetch_array($reponse)) // On boucle pour afficher toutes les données et on met toutes données dans un tableau
{
$idArtiste = $donnees['idUser'];

}
?>

<?php
$sql = "INSERT INTO coupDeCoeur (idMusique,idArtiste,idUser) VALUES    ('".$idMusiqueCC."','".$idArtiste."','".$idUserSession."')";
if ($conn->query($sql) === TRUE) {
    echo "base creer avec succes";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
<?php
echo "<script type='text/javascript'>document.location.replace('pageAcceuil.php');</script>";
 ?>
 <?php
 }
 else
 {
 echo "<script type='text/javascript'>document.location.replace('index.php');</script>";

 }
 ?>
