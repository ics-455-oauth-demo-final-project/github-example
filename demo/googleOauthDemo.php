// obtained from google project
$googleClientID = '1028505711213-cbgej3l1plb90itf52aia7pb3aotg3au.apps.googleusercontent.com';
$gogoleClientSecret = 'HNylMZ1_c6YvrFD30DfiY3WY';

//user wil be sent to this url to be authorized
$authorizeURL = 'https://accounts.google.com/o/oauth2/v2/auth';

//Google's OpenID Connect token endpoint
$tokenURL = 'https://www.googleapis.com/oauth2/v4/token';

//this is the redirect URL 
$baseURL = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];

if(!isset($_GET['action'])) {
	//if already logged in, fetches user ID in session
	if(!empty($_SESSION['user_id'])) {
		echo '<h3>Logged In</h3>';
		echo '<p>User ID: '.$_SESSION['user_id'].'</p>';
		echo '<p>EMAIL: '$_SESSION['email'].'</p>';
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


