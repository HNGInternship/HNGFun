<?php


	// if(!isset($_GET['id'])){
 //    	require '../db.php';
	// }else{
	// 	require 'db.php';
	// }


	$query = "SELECT * FROM secret_word";
	$fetch_secret_word = $conn->prepare($query);
	if($fetch_secret_word->execute()){
		$secret_data = $fetch_secret_word->fetchAll(PDO::FETCH_OBJ);
		
		$secret_word = $secret_data[0]->secret_word;
		
	} else {
		die('Oops! Something Went Wrong');
	}

	$username = "@Olayinka Raheem";
	
	$query = "SELECT * FROM interns_data WHERE username=:username";

	$fetch_user = $conn->prepare($query);
	if($fetch_user->execute([':username'=>$username])){
		$user = $fetch_user->fetch(PDO::FETCH_OBJ);
		$name  = $user->name;
		$username  = $user->username;
		$image  = $user->image_filename;
	} else {
		die('Oops! Something Went Wrong');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>My HomePage</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../vendor/font-awesome/css/font-awesome.min.css">
    <style type="text/css">
    	*{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}

		body {
			font-family: Roboto,  sans-serif;
			font-size: 16px;
			color: #fff;
		}

		.navbar, .content, .footer {
			width: 100%;
			text-align: center;
		}

		.navbar, .footer {
			height: 41px;
			background-color: #573f3f;
			padding-top: 16px;
			padding-bottom: 32px;
			padding-left: 36px;
			padding-right: 36px;
		}

		.navbar .brand-name {
			float: left;
		}

		.navbar .nav-items {
			float: right;
		}

		.navbar a {
			text-decoration: none;
			text-transform: uppercase;
			color: #fff;
			margin: 0 5px;
		}

		.content {
			background-image: url('https://res.cloudinary.com/olayinkaraheem/image/upload/v1523618600/burlesque1.png');
			background-size: cover;
			background-repeat:  no-repeat;
			padding:50px;
			line-height: 2em;
		}

		.welcome {
			letter-spacing: 10px;
			font-size:  18px;
			font-weight: 300;
		}

		.today, .date, .time {
			margin-top: 14px;
			margin-bottom: 14px;
		}

		.today, .date {
			font-size: 36px;
		}

		.time {
			font-size:  18px;
		}

		.me{
			margin-top: 2em;
		}

		.profile-pics{
			border-radius: 50%;
			width: 120px;
			height: 120px;
		}

		.intro{
			font-family: monospace, cursive;
			padding: 2em 0;
		}

		.even{
			text-shadow: 0 0 5px green;
			font-size: 1.5em;
		}

		i{
			margin: 0 5px;

		}
		i:hover{
			transition: all ease-in-out 0.5s;
			transform: scale(1.2);
			text-shadow: 0 0 2px green;
		}

		.twitter-color{
			color: rgba(0,0,255,0.5);
		}

		.blue{
			color: #00f;
		}

		.red{
			color: #f00;
		}
		.social{
			margin-top: 24px;
		}
    </style>
</head>
<body>
	<div class="navbar">
		<div class="brand-name">Olayinka Raheem</div>
		<div class="nav-items">
			<a href="index.php">home</a>
			<a href="#">about me</a>
			<a href="#">contact me</a>
		</div>
	</div>
	<div class="content">

		<h3 class="welcome">Welcome To My Homepage!</h3>

		<div class="me"><img src="<?=$image;?>" class="profile-pics"></div>

		<div class="intro">
			<p>
				My name is <?=$name;?>
			</p>

			<p class="even">
				I am a web developer.
			</p>
			<p>
				This is my Personal Home page for
			</p>
			<p class="even">
				HNGIntership 4.0
			</p>
			<p>
				My skill Set includes
			</p>
			<p class="even">
				HTML, CSS, JavaScript, jQuery, Bootstrap and PHP.
			</p>

			<p class="social">Hook Me Up via:</p>

			<p class="">
				<a href="" class="twitter-color"><i class="fa fa-twitter fa-2x"></i></a>
				<a href="" class="blue"><i class="fa fa-facebook fa-2x"></i></a>
				<a href="" class="red">
				<i class="fa fa-google-plus fa-2x"></i></a>
			</p>
		</div>

		

	</div>
	<div class="footer">
		&copy; <?=Date('Y');?> &nbsp;Olayinka Raheem
	</div>
</body>
</html>