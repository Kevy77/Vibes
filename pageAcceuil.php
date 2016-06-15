<?php
require("config.php");
include("/index.php");
session_start();

$idUserSession = $_SESSION['idUserSession'];
$firstUserSession = $_SESSION['firstUserSession'];
$lastUserSession = $_SESSION['lastUserSession'];
$mailUserSession = $_SESSION['mailUserSession'];
$reponseNew = mysql_query ("SELECT musique.idUser,musique.cheminMusique,musique.idMusique,musique.nomMusique,musique.icone,userListe.firstname,userListe.lastname FROM musique , userListe  WHERE userListe.idUser=musique.idUser");
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
                    <img src="images/logo.png" alt="" class="logo__home">
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
                    <img src="images/profile_picture.png" alt="">
                    <p class="id_name">YANN STEPHANT</p>
                    <div class="col-md-6 border">
                        <p class="follower">360</p>
                    </div>
                    <div class="col-md-6">
                        <p class="tracks">12</p>
                    </div>
                </div>
            </div>
            <nav class="navbar_profile">
                <ul>
                    <li>Profil</li>
                    <li>Coup de coeur</li>
                    <li>Nouveautés</li>
                    <li>Artiste</li>
                </ul>
            </nav>
        </aside>
        <main class="full_page">
          <div class="col-md-3">
            <div class="style first"></div>
          </div>

            <h1>Nouveautés</h1>
            <?php
            while ($donneesNew = mysql_fetch_array($reponseNew)) // On boucle pour afficher toutes les données et on met toutes données dans un tableau
            {  ?>
              <?php $cheminMusiqueCC = $donneesNew['cheminMusique'];?>
                <?php $idMusiqueCC = $donneesNew['idMusique'];?>
              <?php $cheminIconeCC = $donneesNew['icone'];?>
              <?php $nomArtisteCC = $donneesNew['firstname'];?>
              <?php $titreMusiqueCC = $donneesNew['nomMusique'];?>
            <div class="col-md-3">
                <div class="post_sound">
                    <div class="image_cover">
                      <img class="cover" src="<?= $cheminIconeCC ?>" alt="" />
                      <div class="hover_ap">
                          <img class="equalize" src="images/equaliz.png" alt="" />
                          <form method="post" action="coupDeCoeur.php" enctype="multipart/form-data" class="ccForme">
                          <input type="text" name="idMusiqueCC" value="<?php echo $idMusiqueCC ?>" id="idMusiqueCC" class="AAA"/><br /> <!-- a cacher en display none-->
                          <input type="submit" name="submit" value="" class="ccHeart" />
                        </form>

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

</html>
