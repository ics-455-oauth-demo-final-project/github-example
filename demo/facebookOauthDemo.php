<html>
<header>
<title>ICS 455</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.js"></script>
<script type="text/javascript" src="//connect.facebook.net/en_US/sdk.js"></script>
</header>
<body>

<script>

  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    if (response.status === 'connected') {
      testAPI();

    } else if (response.status === 'not_authorized') {
      FB.login(function(response) {
        statusChangeCallback2(response);
      }, {scope: 'public_profile,email'});

    } else {
      alert("not connected, not logged into facebook, we don't know");
    }
  }

  function statusChangeCallback2(response) {
    console.log('statusChangeCallback2');
    console.log(response);
    if (response.status === 'connected') {
      testAPI();

    } else if (response.status === 'not_authorized') {
      console.log('still not authorized!');

    } else {
      alert("not connected, not logged into facebook, we don't know");
    }
  }

  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }

  $(document).ready(function() {
    FB.init({
      appId      : '2179837818758854',
      xfbml      : true,
      version    : 'v3.2'
    });
    checkLoginState();
  });
</script>

<div class = "ui container">
<h1 clas = "ui header">Facebook Login</h1>
<p>Facebook doesnt let you use http you need https try it out by changing the url to http or https</p>
<p>everything is handled through java script and the access token is stored locally</p>
<p>Some servers might make calls on behalf of the user and it is important that the connection is encrypted so that the client can send the token to the server securely https://developers.facebook.com/docs/facebook-login/web/accesstokens</p>
<fb:login-button 
  scope="public_profile,email"
  onlogin="checkLoginState();">
</fb:login-button>
</div>
</body>
</html>
