<?php
// obtained from google project
$googleClientID = '1028505711213-cbgej3l1plb90itf52aia7pb3aotg3au.apps.googleusercontent.com';
$googleClientSecret = 'HNylMZ1_c6YvrFD30DfiY3WY';

//user wil be sent to this url to be authorized
$authorizeURL = 'https://accounts.google.com/o/oauth2/v2/auth';

//Google's OpenID Connect token endpoint
$tokenURL = 'https://www.googleapis.com/oauth2/v4/token';

//this is the redirect URL 
$baseURL = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];

session_start();


//login url begins login process
if(isset($_GET['action']) && $_GET['action'] == 'login') {
	unset($_SESSION['user_id']);
	echo '<script>console.log("After clicking login")</script>';
	//generates a random hash and stores it in the session
	$_SESSION['state'] = bin2hex(random_bytes(16));
	
	$params = array(
		//response type is asking google for an authorization code
		//authorization code will later be exchanged for id_token
		'response_type' => 'code',
		'client_id' => $googleClientID,
		'redirect_uri' => $baseURL,
		//scope is only requesting for identity, not user's google data
		'scope' => 'openid email',
		//state param is random string generated by client, stored in session
		//app will use state param to verify that it initiated request when user is directed back
		'state' => $_SESSION['state']
	);
	echo '<script>console.log("login page")</script>';
	//redirects the user to google authorization page with above parameters	
	header('Location: '.$authorizeURL.'?'.http_build_query($params));
	die();
}

if(isset($_GET['action']) && $_GET['action'] == 'logout') {
	unset($_SESSION['user_id']);
	header('Location: '.$baseURL);
	die();
}

//Google will send user back with code and state params in query string
if(isset($_GET['code'])) {

	echo '<script>console.log("google sent back")</script>';
	//verifies that state param matches stored state
	if(!isset($_GET['state']) || $_SESSION['state'] != $_GET['state']) {
		header('Location: ' . $baseURL . '?error=invalid_state');
		die();
	}
	//verifies authorization code
	$ch = curl_init($tokenURL);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	 //builds POST request to Google's token endpoint with below params in query string
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
		'grant_type' => 'authorization_code',
		'client_id' => $googleClientID,
		'client_secret' => $googleClientSecret,
		'redirect_uri' => $baseURL,
		'code' => $_GET['code']
	]));
	//Google will verify request and respond w/ access and ID token
	$response = json_decode(curl_exec($ch), true);
	
	//The ID token in response is JWT token
	//split JWT string to 3 parts, delegated by each . in string
	$jwt = explode('.', $data['id_token']);

	//extract middle base64 decode, then json_decode
	$userinfo = json_decode(base64_decode($jwt[1]), true);

	$_SESSION['user_id'] = $userinfo['sub'];
	$_SESSION['email'] = $userinfo['email'];
	echo '<script>console.log("this far")</script>'; 
	//store tokens
	$_SESSION['access_token'] = $data['access_token'];
	$_SESSION['id_token'] = $data['id_token'];

	header('Location: ' . $baseURL);
	die();
}

if(!isset($_GET['action'])) {
	//if already logged in, fetches user ID in session
	if(!empty($_SESSION['user_id'])) {
		echo '<h3>Logged In</h3>';
		echo '<p>User ID: '.$_SESSION['user_id'].'</p>';
		echo '<p>Email: '.$_SESSION['email'].'</p>';
		echo '<p><a href="?action=logout">Log Out</a></p>';
		//fetches user info from Google
		echo '<h3>User Info</h3>';
		echo '<pre>';
		$ch = curl_init('https://www.googleapis.com/oauth2/v3/userinfo');
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer '.$_SESSION['access_token']]);
		curl_exec($ch);
		echo '</pre>';
	
	}

	//if logged out, displays link to login url
	else{
		echo '<h3>Not Logged In</h3>';
		echo '<p><a href="?action=login">Log In</a></p>';
	}
	die();
}	

?>
