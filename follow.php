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
$idUserFollow = $_POST['idUserFollow'];

?>



<?php
$sql = "UPDATE userListe SET nbFollow = nbFollow + 1 WHERE idUser='".$idUserFollow."'";
if ($conn->query($sql) === TRUE) {
    echo "base creer avec succes";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "INSERT INTO follow (idFollower,idUser) VALUES    ('".$idUserFollow."','".$idUserSession."')";

if ($conn->query($sql) === TRUE) {
    echo "base creer avec succes";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
<?php
echo "<script type='text/javascript'>document.location.replace('pageProfil.php');</script>";
?>


<?php
}
else
{
echo "<script type='text/javascript'>document.location.replace('index.php');</script>";

}
?>
