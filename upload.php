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

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Création Web</title>
  <link rel="stylesheet" href="styles/bootstrap.css">
  <link rel="stylesheet" href="styles/hamburgers.min.css">
  <link rel="stylesheet" href="styles/style.css">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
  <div id="mainpage">
    <header>
      <div class="container">
        <div class="row">
          <button class="hamburger hamburger--squeeze" type="button">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
          <img src="images/logoBlanc.png" alt="" class="logo__home">
          <div class="clearBoth"></div>
          <img id="search" src="images/search.png" alt="">
        </div>
      </div>
      <div class="search_bar">
        <div class="container">
          <input type="text" placeholder="Recherche...">
        </div>
      </div>
    </header>
    <aside class="left">
      <div class="container-fluid no-padding">
        <div class="col-md-12">

          <?php
          while ($donneesP = mysql_fetch_array($reponseP)) // On boucle pour afficher toutes les données et on met toutes données dans un tableau
          {
          ?>
          <?php
          if (empty($donneesP['imageUser']))
          {
            $srcCheminAvatar = "images/default/avatar.jpg" ;
          }
          else{
          $srcCheminAvatar = $donneesP['imageUser'];
        }
        ?>
          <div id="avatarUserDiv">
          <img src="<?= $srcCheminAvatar ?>" class="avatarUser"/></br>
          </div>
          <p class="id_name"><?php echo $firstUserSession," " , $lastUserSession; ?></p>
          <?php
          }
          ?>

          <?php
          while ($donneesFo = mysql_fetch_array($reponseFo)) // On boucle pour afficher toutes les données et on met toutes données dans un tableau
          {
          ?>
            <?php
            $nbFollow = $donneesFo['nbFollow'];
            $nbTracks = $donneesFo['nbTracks'];
            ?>
            <div class="col-md-6 border">
              <p class="follower"><?php echo $nbFollow; ?></p>
            </div>
            <div class="col-md-6">
              <p class="tracks"><?php echo $nbTracks; ?></p>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
      <nav class="navbar_profile">
        <ul>
          <li><a href="pageAcceuil.php">Acceuil</a></li>
          <li><a href="pageProfil.php">Profil</a></li>
          <li><a href="upload.php">Upload</a></li>
          <li><a href="parametres.php">Parametre</a></li>
        </ul>
      </nav>
    </aside>
        <main class="full_page">
            <h1 style="text-align:center;">Upload</h1>
            <div class="container">
                <div class="form_upload">
                  <form method="post" action="uploadMusique.php" enctype="multipart/form-data">
                       <label for="musique">musique a upload</label><br />
                       <input type="file" name="musique" id="musiqueForm" />
                       <div class="clearBoth"></div>
                       <label for="titre"></label>
                       <input type="text" name="titre" placeholder="Nom de la musique" id="titre" /><br />
                       <label for="reggae">reggae</label>
                       <input type="checkbox" name="reggae" />
                       <div class="clearBoth"></div>
                       <label for="electro">electro</label>
                       <input type="checkbox" name="electro" />
                       <div class="clearBoth"></div>
                       <label for="rock">rock</label>
                       <input type="checkbox" name="rock" />
                       <div class="clearBoth"></div>
                       <label for="icone">icone de la musique (JPG) </label><br />
                       <input type="file" name="icone" id="icone" /><br />
                       <input type="submit" name="submit" value="Envoyer" />
                  </form>

                </div>
            </div>
        </main>
        <aside class="right">
            <div class="cover_right">
                <img src="images/cover.png" alt="cover">
                <div class="infos_cover">Shaka Ponk - loco da</div>
            </div>
            <ul class="like_panel">
                <li><img src="images/like.png" alt=""></li>
                <li><img src="images/coupCoeur.png" alt=""></li>
                <li><img src="images/unlike.png" alt=""></li>
            </ul>
            <div class="clearBoth"></div>
            <div class="suggest_box">
                <p class="suggest">Suggestion</p>
                <img src="images/cover.png" alt="cover" class="cover_right_small">
            </div>
            <ul class="playlist">
                <li>Blacklisted</li>
                <li>My name is stain</li>
                <li>Puta loca</li>
                <li>Palabra mi amor</li>
            </ul>
        </aside>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/main.js"></script>
</body>
<?php
}
else
{
  echo "<script type='text/javascript'>document.location.replace('index.php');</script>";

}
?>
</html>
