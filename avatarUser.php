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

mkdir('images/'.$idUserSession, 0777);

?>

<?php
$titreImage = "avatar";


$_FILES['icone']['name'];     //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
$_FILES['icone']['type'];     //Le type du fichier. Par exemple, cela peut être « image/png ».
$_FILES['icone']['size'];     //La taille du fichier en octets.
$_FILES['icone']['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
$_FILES['icone']['error'];    //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.


if ($_FILES['icone']['error'] > 0) $erreur = "Erreur lors du transfert";
if ($_FILES['icone']['size'] > $maxsize) $erreur = "Le fichier est trop gros";


//$_POST['rock']
//$_POST['electro']
$extensions_valides = array( 'jpg');
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
$extension_upload = strtolower(  substr(  strrchr($_FILES['icone']['name'], '.')  ,1)  );
if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";

$image_sizes = getimagesize($_FILES['icone']['tmp_name']);
if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande";

$nom = $idUserSession . $titreUser;
$idMusique = $idUserSession . $titreUser;
$nom = "images/{$idUserSession}/{$idUserSession}{$titreImage}.{$extension_upload}";
//Applicatio/$nom = 'musique/'.$idUserSession'/'.$idUserSession.$extension_upload;
$resultat = move_uploaded_file($_FILES['icone']['tmp_name'],$nom);

$reponse = $bd->query("SELECT imageUser FROM userListe WHERE idUser='".$idUserSession."'");


$donnees = $reponse->fetch();
if (empty($donnees['imageUser']))
{
if ($resultat) {
  echo "Transfert réussi";
$sql = "UPDATE userListe SET imageUser = '".$nom."' WHERE idUser='".$idUserSession."'";


if ($conn->query($sql) === TRUE) {
    echo "base creer avec succes";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
}
else{

}
?>

<?php
echo "<script type='text/javascript'>document.location.replace('parametres.php');</script>";
 ?>

 <?php
 }
 else
 {
 echo "<script type='text/javascript'>document.location.replace('index.php');</script>";

 }
 ?>
