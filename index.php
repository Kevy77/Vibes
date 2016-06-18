<?php

session_start();
require_once __DIR__ . '/vendor/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '823089837825855',
  'app_secret' => 'fedf26bb6d6a47da6ba7f7eb600494b6',
  'default_graph_version' => 'v2.4',
  ]);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // optional

try {
	if (isset($_SESSION['facebook_access_token'])) {
		$accessToken = $_SESSION['facebook_access_token'];
	} else {
  		$accessToken = $helper->getAccessToken();
	}
} catch(Facebook\Exceptions\FacebookResponseException $e) {
 	// When Graph returns an error
 	echo 'Graph returned an error: ' . $e->getMessage();
  	exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
 	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
  	exit;
 }
if (isset($accessToken)) {
	if (isset($_SESSION['facebook_access_token'])) {
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	} else {
		// getting short-lived access token
		$_SESSION['facebook_access_token'] = (string) $accessToken;
	  	// OAuth 2.0 client handler
		$oAuth2Client = $fb->getOAuth2Client();
		// Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
		// setting default access token to be used in script
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}
	// redirect the user back to the same page if it has "code" GET variable
	if (isset($_GET['code'])) {
		header('Location: ./');
	}
	// getting basic info about user
	try {
		$profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
		$profile = $profile_request->getGraphNode()->asArray();

    //recuperer l'id
    $profil_request = $fb->get('/me?fields=id');
    $profilId = $profil_request->getGraphNode()->asArray();
    $idUserB = implode("", $profilId);
    $_SESSION['idUserSession'] = $idUserB;

    //recuperer prenom
    $profileFirst_request = $fb->get('/me?fields=first_name');
    $profilFirst = $profileFirst_request->getGraphNode()->asArray();
    $firstUser = implode(",", $profilFirst);
    $firstUserExplode=explode(",",$firstUser); //chaines séparées par une virgule
    $_SESSION['firstUserSession'] = $firstUserExplode[0];


    //recuperer nom de famille
    $profileLast_request = $fb->get('/me?fields=last_name');
    $profilLast = $profileLast_request->getGraphNode()->asArray();
    $lastUser = implode(",", $profilLast);
    $lastUserExplode=explode(",",$lastUser);
    $_SESSION['lastUserSession'] = $lastUserExplode[0];

    //recuperer mail
    $profil_request = $fb->get('/me?fields=email');
    $profilMail = $profil_request->getGraphNode()->asArray();
    $mailUser = implode(",", $profilMail);
    $mailUserExplode=explode(",",$mailUser);
    $_SESSION['mailUserSession'] = $mailUserExplode[0];

    header('Location: http://www.vibes.benoweb.com/bdd.php');


	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		echo 'Graph returned an error: ' . $e->getMessage();
		session_destroy();
		// redirecting user back to app login page
		header("Location: ./");
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}





	// printing $profile array on the screen which holds the basic info about user
	print_r($profile);
  	print_r($profil);
  	// Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
} else {
	// replace your website URL same as added in the developers.facebook.com/apps e.g. if you used http instead of https and you used non-www version or www version of your website then you must add the same here
	$loginUrl = $helper->getLoginUrl('http://www.vibes.benoweb.com/', $permissions);
	echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
}
?>
