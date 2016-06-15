
<?php
$idUserPhp = "<script>
    var elt = document.getElementById('idProfil');
    var monTexte = elt.innerText || elt.textContent;
    </script>";

echo "$idUserPhp";
 ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="styles/style.css">
    <title>model</title>
  </head>
<body>
  <div id="contenuCachePhp">
    <div id="fb-root"></div>
    <div id="name"></div>
    <div id="imageProfil"></div>
    <div id="idProfil"></div>
  </div>
<script src="scripts/jquery-1.12.1.min.js"></script>
 <script src="scripts/main.js"></script>
  </body>
