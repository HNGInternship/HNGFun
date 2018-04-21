<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>HNG|Nathaniel</title>
	<meta name="viewport" content="width= device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<?php
		require 'db.php';

		$result = $conn->query("Select * from secret_word LIMIT 1");
		$result = $result->fetch(PDO::FETCH_OBJ);
		$secret_word = $result->secret_word;

		$result2 = $conn->query("Select * from interns_data where username = 'nath'");
		$user = $result2->fetch(PDO::FETCH_OBJ);

		$username = $user['username'];
		$name = $user['name'];
		$image_filename = $user['image_filename'];
	?>

	<style type="text/css">

		body, html {
			display: flex;
			flex-wrap: wrap;
			width: 100%;
			margin: 0;
			font-family: 'open sans', san serif;
		}
		.image_header {
			width: 100%;
			margin: auto;

		}
		.col-1 {
			width: 38%;
			display: flex;
			flex-wrap: wrap;
		}
		.col-2 {
			width: 58%;
			height: 70%;
			margin: auto;
			display: flex;
			flex-wrap: wrap;
		}
		.image_header img {
			width: 95%;
			padding-left: 10px;
            margin: 30px 0;
            border-radius: 50%; 
		}
		.info p {
			font-size: 25px;
			margin: 0;
			width: 100%;
		}
		.info {
			width: 100%;
			display: flex;
			flex-wrap: wrap;
			padding: 10px;
			text-align: left;
		}
		.info h1 {
			text-transform: uppercase;
			width: 100%;
		}
		
		.logos img {
			max-width: 40px;
			max-height: 40px;
			border-radius: 50%;
			padding-right: 20px;
		}
		.logos {
			margin: auto;
			margin-left: 0;
			padding: 10px;
			margin-top: 0;
			margin-bottom: 0;
		}
		.vl {
			border-left: 3px solid #000000;
			height: 70%;
			margin: auto;
		}

		/*
		Media queries for other screens
		*/
		@media screen and (max-width: 880px){
			.col-1, .col-2 {
				width: 100%;
				max-width: 100%;
			}
			.vl {
				display: none;
			}
			.image_header {
				width: 50%;
				margin: auto;
			}
			.image_header img {
				padding-top: 20px;
			}
			.info {
				text-align: center;
			}
			.logos {
			    margin: auto;
			    margin-left: inherit;
			    padding: 10px;
			    margin-top: 0;
			    margin-bottom: 0;
			}
		}
	</style>
</head>
<body>

	<div class="col-1">
		<div class="image_header">
			<img src="<?php echo $image_filename?>" alt="profile-image">
			<!--
				Cloudinary link to the image 

			 http://res.cloudinary.com/nath/image/upload/v1524182119/Image_-_Portrait.jpg -->
		</div>
	</div>
	<div class="vl"></div>
	<div class="col-2">
		<div class="info">
			<h1><?php echo $username ?></h1>
			<p style="font-size: 40px;">Frontend developer</p>
			<p>All time lover of tech, love creating cool stuffs and I love music.</p>
		</div>
		<div class="logos">
			<a href="https://web.facebook.com/nathanielsheun"><img src="http://res.cloudinary.com/nath/image/upload/v1524242347/facebook-letter-logo_318-40258.jpg" alt="facebook_logo"></a>
			<a href="https://twitter.com/nathmankind"><img src="http://res.cloudinary.com/nath/image/upload/v1524242414/twitter-logo_318-40209.jpg" alt="twitter-logo"></a>
			<a href="https://www.instagram.com/nath_mankind/"><img src="http://res.cloudinary.com/nath/image/upload/v1524242412/instagram-logo1.png" alt="instagram-logo"></a>
			<a href="https://github.com/nathmankind"><img src="http://res.cloudinary.com/nath/image/upload/v1524250453/github-logo.svg" alt="github-logo"></a>
		</div>
	</div>
	
</body>
</html>