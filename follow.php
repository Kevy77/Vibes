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
$idUserFollow = $_POST['idUserFollow'];

?>



<?php
$sql = "INSERT INTO follow (idFollower,idUser) VALUES    ('".$idUserFollow."','".$idUserSession."')";
$sql = "UPDATE userListe SET nbFollow = nbFollow + 1 WHERE idUser='".$idUserFollow."'";
if ($conn->query($sql) === TRUE) {
    echo "base creer avec succes";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
