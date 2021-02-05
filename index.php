<?php
	/*
		Author: Tanuj Chauhan
		www.codewithtanuj.com
	    Just for testing FB Login button API using PHP
	*/
	define('APP_ID', 'paste_your_app_id');
	define('APP_SECRET', 'paste_your_secret_app_code');
	define('REDIRECT_URL','https://www.yourwebsite.com/visithere.php');

?>
<!DOCTYPE html>

<html>
	<head>
		<title>Facebook Login Button Simple</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<style>
			body{
				width:100%;
			}
			.facebooklogin{
				font-size:100%;
				font-family:arial;
				display:block;
				width:200px;
				height:20px;
				background-color:#142dac;
				color: #FFFFFF;
				text-decoration:none;
				padding:20px;
				border-radius:5px;
				margin:0 auto;
				text-align:center;
			}
			
			.facebooklogin:hover{
				background-color:#4158cc;
			}
			
			.user{
				font-size:100%;
				font-family:arial;
				display:block;
				width:200px;
				height:20px;
				background-color:#142dac;
				color: #FFFFFF;
				text-decoration:none;
				padding:20px;
				border-radius:5px;
				margin:0 auto;
				text-align:center;
			}
		</style>
	</head>
	
	<body>
	<?php

    /*
        Author: Tanuj Chauhan
        www.codewithtanuj.com
        Just for testing FB Login button API using PHP
    */

	//INCLUDING LIBRARIES 
	require_once('lib/Facebook/FacebookSession.php');
	require_once('lib/Facebook/FacebookRequest.php');
	require_once('lib/Facebook/FacebookResponse.php');
	require_once('lib/Facebook/FacebookSDKException.php');
	require_once('lib/Facebook/FacebookRequestException.php');
	require_once('lib/Facebook/FacebookRedirectLoginHelper.php');
	require_once('lib/Facebook/FacebookAuthorizationException.php');
	require_once('lib/Facebook/FacebookAuthorizationException.php');
	require_once('lib/Facebook/GraphObject.php');
	require_once('lib/Facebook/GraphUser.php');
	require_once('lib/Facebook/GraphSessionInfo.php');
	require_once('lib/Facebook/Entities/AccessToken.php');
	require_once('lib/Facebook/HttpClients/FacebookCurl.php');
	require_once('lib/Facebook/HttpClients/FacebookHttpable.php');
	require_once('lib/Facebook/HttpClients/FacebookCurlHttpClient.php');

	//USING NAMESPACES
	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\FacebookResponse;
	use Facebook\FacebookSDKException;
	use Facebook\FacebookRequestException;
	use Facebook\FacebookAuthorizationException;
	use Facebook\GraphObject;
	use Facebook\GraphUser;
	use Facebook\GraphSessionInfo;
	use Facebook\HttpClients\FacebookHttpable;
	use Facebook\HttpClients\FacebookCurlHttpClient;
	use Facebook\HttpClients\FacebookCurl;

	//STARTING SESSION
	session_start();



	FacebookSession::setDefaultApplication(APP_ID,APP_SECRET);

	$helper = new FacebookRedirectLoginHelper(REDIRECT_URL);

	$sess = $helper->getSessionFromRedirect();

	if(isset($sess)){
		$request  = new FacebookRequest($sess, 'GET', '/me');
		$response = $request->execute();
		$graph = $response->getGraphObject(GraphUser::className());
		$name = $graph->getName();
	?>	
		<div class='user'>
			<?php echo "hi $name"; ?>
		</div>
	<?php
	}else{
	?>
		<a class="facebooklogin" href='<?php echo $helper->getLoginUrl();?>'>
            <i class="fa fa-facebook"></i> Sign in with Facebook
		</a>
	<?php
	}

	?>
	</body>
</html>