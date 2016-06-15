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
