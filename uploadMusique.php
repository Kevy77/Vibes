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

mkdir('musique/'.$idUserSession, 0777);
mkdir('pochette/'.$idUserSession, 0777);

?>
<?php
$titreImage = $_POST['titre'];


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

$nomIcone = $idUserSession . $titreUser;
$nomIcone = "pochette/{$idUserSession}/{$idUserSession}{$titreImage}.{$extension_upload}";
//Applicatio/$nom = 'musique/'.$idUserSession'/'.$idUserSession.$extension_upload;
$resultatIcone = move_uploaded_file($_FILES['icone']['tmp_name'],$nomIcone);

 ?>
<?php
$titreUser = $_POST['titre'];


$_FILES['musique']['name'] ;    //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).    //Le type du fichier. Par exemple, cela peut être « image/png ».   //La taille du fichier en octets.
$_FILES['musique']['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
$_FILES['musique']['error'] ;   //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.

if ($_FILES['musique']['error'] > 0) $erreur = "Erreur lors du transfert";

if($_POST['reggae']){
  $choixReggae="1";
  $choixRock="0";
  $choixelectro="0";
}
else if($_POST['rock']){
  $choixReggae="0";
  $choixRock="1";
  $choixelectro="0";
}

else if($_POST['electro']){
  $choixReggae="0";
  $choixRock="0";
  $choixelectro="1";
}
//$_POST['rock']
//$_POST['electro']

$extensions_valides = array('mp3');
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
$extension_upload = strtolower(  substr(  strrchr($_FILES['musique']['name'], '.')  ,1)  );
if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";
$nom = $idUserSession . $titreUser;
$idMusique = $idUserSession . $titreUser;
$nom = "musique/{$idUserSession}/{$idUserSession}{$titreUser}.{$extension_upload}";
//Applicatio/$nom = 'musique/'.$idUserSession'/'.$idUserSession.$extension_upload;
$resultat = move_uploaded_file($_FILES['musique']['tmp_name'],$nom);
if ($resultatIcone) {
  echo "Transfert réussi";

$sql = "UPDATE userListe SET nbTracks = nbTracks + 1 WHERE idUser='".$idUserSession."'";
if ($conn->query($sql) === TRUE) {
    echo "base creer avec succes";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "INSERT INTO musique (idUser,idMusique,cheminMusique,rock,electro,reggae,nomMusique,icone) VALUES    ('".$idUserSession."','".$idMusique."','".$nom."','".$choixRock."','".$choixelectro."','".$choixReggae."','".$titreUser."','".$nomIcone."')";

if ($conn->query($sql) === TRUE) {
    echo "base creer avec succes";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
else if ($resultat) {
  echo "Transfert réussi";

$sql = "UPDATE userListe SET nbTracks = nbTracks + 1 WHERE idUser='".$idUserSession."'";
$sql = "UPDATE userListe SET nbTracks = nbTracks + 1 WHERE idUser='".$idUserSession."'";
if ($conn->query($sql) === TRUE) {
    echo "base creer avec succes";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "INSERT INTO musique (idUser,idMusique,cheminMusique,rock,electro,reggae,nomMusique) VALUES    ('".$idUserSession."','".$idMusique."','".$nom."','".$choixRock."','".$choixelectro."','".$choixReggae."','".$titreUser."')";

if ($conn->query($sql) === TRUE) {
    echo "base creer avec succes";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}



?>
