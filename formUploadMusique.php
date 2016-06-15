<?php
include("/index.php");
session_start();
$idUserSession = $_SESSION['idUserSession'];
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

<h1>UPLOAD DE MUSIQUE</h1>
<form method="post" action="uploadMusique.php" enctype="multipart/form-data">
     <label for="musique">musique a upload</label><br />
     <input type="file" name="musique" id="musiqueForm" /><br />
     <label for="titre">Titre du fichier (max. 50 caractères) :</label><br />
     <input type="text" name="titre" value="Titre du fichier" id="titre" /><br />
     <label for="#">style de musique</label>
     <label for="reggae">reggae</label>
     <input type="checkbox" name="reggae" />
     <label for="electro">electro</label>
     <input type="checkbox" name="electro" />
     <label for="rock">rock</label>
     <input type="checkbox" name="rock" />
     <label for="icone">fichier JPG </label><br />
     <input type="file" name="icone" id="icone" /><br />
     <input type="submit" name="submit" value="Envoyer" />
</form>


</body>
</html>
