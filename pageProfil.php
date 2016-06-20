<?php
require("config.php");
include("/index.php");
session_start();

ini_set('display_errors', 1);

ini_set('log_errors', 1);

ini_set('error_log', dirname(__file__) . '/log_error_php.txt');

$accessToken = $_SESSION['accessToken'];
if (isset($_SESSION['facebook_access_token'])) {
  $idUserSession = $_SESSION['idUserSession'];
  $firstUserSession = $_SESSION['firstUserSession'];
  $lastUserSession = $_SESSION['lastUserSession'];
  $mailUserSession = $_SESSION['mailUserSession'];
  $reponseMesSon = mysql_query ("SELECT musique.idUser,musique.cheminMusique,musique.idMusique,musique.nomMusique,musique.icone,userListe.firstname,userListe.lastname FROM musique , userListe  WHERE userListe.idUser='".$idUserSession."' AND musique.idUser='".$idUserSession."'");
  $reponseP = mysql_query ("SELECT imageUser FROM userListe WHERE idUser='".$idUserSession."'");
  $reponsePB = mysql_query ("SELECT imageUser FROM userListe WHERE idUser='".$idUserSession."'");
  $reponseFo = mysql_query ("SELECT nbFollow,nbTracks FROM userListe WHERE idUser='".$idUserSession."'");
  $reponseFoB = mysql_query ("SELECT nbFollow,nbTracks FROM userListe WHERE idUser='".$idUserSession."'");
  $reponseCoupCoeur = mysql_query ("SELECT coupDeCoeur.idArtiste, musique.cheminMusique , musique.nomMusique , userListe.firstname , musique.icone FROM coupDeCoeur, musique , userListe WHERE coupDeCoeur.IdUser = '".$idUserSession."' AND musique.idMusique = coupDeCoeur.idMusique AND coupDeCoeur.idArtiste = userListe.idUser");
  $reponseCoupCoeurMin = mysql_query ("SELECT coupDeCoeur.idArtiste, musique.cheminMusique , musique.nomMusique , userListe.firstname , musique.icone FROM coupDeCoeur, musique , userListe WHERE coupDeCoeur.IdUser = '".$idUserSession."' AND musique.idMusique = coupDeCoeur.idMusique AND coupDeCoeur.idArtiste = userListe.idUser");
  $reponseF = mysql_query ("SELECT userListe.firstname, userListe.lastname, userListe.imageUser FROM userListe, follow WHERE follow.idUser = '".$idUserSession."' AND userListe.idUser = follow.idFollower");
  $reponseFMin = mysql_query ("SELECT userListe.firstname, userListe.lastname, userListe.imageUser FROM userListe, follow WHERE follow.idUser = '".$idUserSession."' AND userListe.idUser = follow.idFollower");

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
    <link rel="stylesheet" href="styles/font-awesome.css">
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
        <div class="col-md-12">
          <div class="col-md-6 infos_follow">
            <?php
            while ($donneesPB = mysql_fetch_array($reponsePB)) // On boucle pour afficher toutes les données et on met toutes données dans un tableau
            {
              ?>
              <?php
              if (empty($donneesPB['imageUser']))
              {
                $srcCheminAvatar = "images/default/avatar.jpg" ;
              }
              else{
                $srcCheminAvatar = $donneesPB['imageUser'];
              }
              ?>
              <div id="avatarUserDivProfil">
                <img src="<?= $srcCheminAvatar ?>" /></br>
              </div>
              <p class="id_name"><?php echo $firstUserSession," " , $lastUserSession; ?></p>
              <?php
            }
            ?>

            <?php
            while ($donneesFoB = mysql_fetch_array($reponseFoB)) // On boucle pour afficher toutes les données et on met toutes données dans un tableau
            {
              ?>
              <?php
              $nbFollow = $donneesFoB['nbFollow'];
              $nbTracks = $donneesFoB['nbTracks'];
              ?>

              <p class="follower"><?php echo $nbFollow; ?></p>
              <p class="tracks"><?php echo $nbTracks; ?></p>
              <?php
            }
            ?>
          </div>
          <div class="col-md-6 description_box">
            <p>Tempore quo primis auspiciis in mundan fulgorem surgeret victura dum erunt homa, ut augeretur sublimibus incrementis, fo Virtus convenit atque Fortu
            </p>
            <a href="upload.php"><img src="images/cloud.png" alt="upload"></a>
            <a href="parametres.php"><img src="images/param.png" alt="parametres"></a>
            <i id="heart_btn" class="fa fa-heart" aria-hidden="true"></i>
            <i id="follow_btn"class="fa fa-users" aria-hidden="true"></i>
            <i id="home_btn"class="fa fa-home" aria-hidden="true"></i>
          </div>
        </div>
        <div class="col-md-12">
          <div class="col-md-6" style="border-right: 3px solid #333334;">
            <h2>Coup de coeur</h2>
            <div class="suggest_box">
              <img src="images/logoVibes.jpg" alt="cover" class="cover_right_small" style="width:28%;">
            </div>
            <ul class="playlist">
              <?php
              while ($donneesCoupCoeurMin = mysql_fetch_array($reponseCoupCoeurMin)) // On boucle pour afficher toutes les données et on met toutes données dans un tableau
              {  ?>
                <?php $nomArtisteCoupCoeurMin = $donneesCoupCoeurMin['firstname'];?>
                <?php $titreMusiqueCoupCoeurMin = $donneesCoupCoeurMin['nomMusique'];?>

                <li><?php echo $nomArtisteCoupCoeurMin," - " , $titreMusiqueCoupCoeurMin;?></li>
                <?php
              }
              ?>
            </ul>
          </div>
          <div class="col-md-6">
            <h2>Follow</h2>
            <?php
            $compteur = 0;
            while (($donneesFMin = mysql_fetch_array($reponseFMin)) && ($compteur < 3)) // On boucle pour afficher toutes les données et on met toutes données dans un tableau
            {
              ?>
              <?php
              $compteur = $compteur +1;
              ?>
              <?php
              if (empty($donneesFMin['imageUser']))
              {
                $srcCheminAvatarFollowMin = "images/default/avatar.jpg" ;
              }
              else{
                $srcCheminAvatarFollowMin = $donneesFMin['imageUser'];
              }
              ?>

              <?php $prenomFollowMin = $donneesFMin['firstname'];?>
              <?php $nomFollowMin = $donneesFMin['lastname'];?>
              <div id="avatarUserDivFollow">
                <img src="<?= $srcCheminAvatarFollowMin ?>" class="image_fb" alt="" />
              </div>
              <p class="profile_user"><?php echo $prenomFollowMin," " , $nomFollowMin;?> </p>
              <div class="clearBoth"></div>

              <?php
            }
            ?>
          </div>
        </div>
        <div id="follow_list">
          <h2>Follow</h2>
          <div class="col-md-6">
            <?php

            while ($donneesF = mysql_fetch_array($reponseF)) // On boucle pour afficher toutes les données et on met toutes données dans un tableau
            {
              ?>
              <?php
              if (empty($donneesF['imageUser']))
              {
                $srcCheminAvatarFollow = "images/default/avatar.jpg" ;
              }
              else{
                $srcCheminAvatarFollow = $donneesF['imageUser'];
              }
              ?>

              <?php $prenomFollow = $donneesF['firstname'];?>
              <?php $nomFollow = $donneesF['lastname'];?>
              <div id="avatarUserDivFollow">
                <img src="<?= $srcCheminAvatarFollow ?>" class="image_fb" alt="" />
              </div>
              <p class="profile_user"><?php echo $prenomFollow," " , $nomFollow;?> </p>
              <div class="clearBoth"></div>


              <?php
            }
            ?>
          </div>
        </div>
        <div id="coupcoeur">
          <h2>Coup de coeur</h2>
          <?php
          while ($donneesCoupCoeur = mysql_fetch_array($reponseCoupCoeur)) // On boucle pour afficher toutes les données et on met toutes données dans un tableau
          {  ?>
            <?php $cheminMusiqueCoupCoeur = $donneesCoupCoeur['cheminMusique'];?>
            <?php $idMusiqueCoupCoeur = $donneesCoupCoeur['idMusique'];?>
            <?php $cheminIconeCoupCoeur = $donneesCoupCoeur['icone'];?>
            <?php $nomArtisteCoupCoeur = $donneesCoupCoeur['firstname'];?>
            <?php $titreMusiqueCoupCoeur = $donneesCoupCoeur['nomMusique'];?>
            <div class="col-md-3">
              <div class="post_sound">
                <!--<img src="images/like.png" alt="" class="like_nb">
                <p class="like_nb" style="margin: 10px 53px;">67</p>
                <img src="images/unlike.png" alt="" class="unlike_nb">
                <p class="unlike_nb" style="margin: 10px -58px;">97</p>-->
                <div class="image_cover">
                  <img class="cover" src="<?= $cheminIconeCoupCoeur ?>" alt="" />
                  <div class="hover_ap">
                    <img class="equalize" src="images/equaliz.png" alt="" />
                    <div class="formCoeur">
                      <form method="post" action="coupDeCoeur.php" enctype="multipart/form-data" class="ccForme">
                        <input type="text" name="idMusiqueCC" value="<?php echo $idMusiqueCoupCoeur ?>" id="idMusiqueCC" class="AAA"/><br /> <!-- a cacher en display none-->
                        <input type="submit" name="submit" value="" class="ccHeart" />
                      </form>
                    </div>
                  </div>
                </div>
                <p class="artist"><?php echo "artiste :  $nomArtisteCoupCoeur";?></p>
                <p class="sound"><?php echo "sound :  $titreMusiqueCoupCoeur";?></p>
                <audio src="<?= $cheminMusiqueCoupCoeur ?>" controls=""></audio></br>

              </div>
            </div>
            <?php
          }
          ?>

          <div class="clearBoth"></div>
        </div>
        <div id="musique">
          <h1>Mes sons</h1>
          <?php
          while ($donneesMesSon = mysql_fetch_array($reponseMesSon)) // On boucle pour afficher toutes les données et on met toutes données dans un tableau
          {  ?>
            <?php $cheminMusiqueCC = $donneesMesSon['cheminMusique'];?>
            <?php $idMusiqueCC = $donneesMesSon['idMusique'];?>
            <?php $cheminIconeCC = $donneesMesSon['icone'];?>
            <?php $nomArtisteCC = $donneesMesSon['firstname'];?>
            <?php $titreMusiqueCC = $donneesMesSon['nomMusique'];?>
            <div class="col-md-3">
              <div class="post_sound">
                <!--<img src="images/like.png" alt="" class="like_nb">
                <p class="like_nb" style="margin: 10px 53px;">67</p>
                <img src="images/unlike.png" alt="" class="unlike_nb">
                <p class="unlike_nb" style="margin: 10px -58px;">97</p>-->
                <div class="image_cover">
                  <img class="cover" src="<?= $cheminIconeCC ?>" alt="" />
                  <div class="hover_ap">
                    <img class="equalize" src="images/equaliz.png" alt="" />
                    <div class="formCoeur">
                      <form method="post" action="coupDeCoeur.php" enctype="multipart/form-data" class="ccForme">
                        <input type="text" name="idMusiqueCC" value="<?php echo $idMusiqueCC ?>" id="idMusiqueCC" class="AAA"/><br /> <!-- a cacher en display none-->
                        <input type="submit" name="submit" value="" class="ccHeart" />
                      </form>
                    </div>
                  </div>
                </div>
                <p class="artist"><?php echo "artiste :  $nomArtisteCC";?></p>
                <p class="sound"><?php echo "sound :  $titreMusiqueCC";?></p>
                <audio src="<?= $cheminMusiqueCC ?>" controls=""></audio></br>

              </div>
            </div>
            <?php
          }
          ?>

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
