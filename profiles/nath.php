<?php
<<<<<<< HEAD
  //require '../db.php';
=======
  require '../db.php';
>>>>>>> 1ef5fcaa6524b8b4cd8e34b822125e3ea83031fe
  $res = $conn->query("SELECT * FROM  interns_data WHERE username = 'nath' ");
  $row = $res->fetch(PDO::FETCH_BOTH);
  $name = $row['name'];
  $image = $row['image_filename'];
  $username =$row['username'];



  $res1 = $conn->query("SELECT * FROM secret_word");
  $res2 = $res1->fetch(PDO::FETCH_ASSOC);
  $secret_word = $res2['secret_word'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>HNG|Nathaniel</title>
	<meta name="viewport" content="width= device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	

	<style type="text/css">

		body, html {
			display: flex;
			flex-wrap: wrap;
			width: 100%;
			margin: 0;
			font-family: 'open sans', san serif;
		}
		.image_header {
<<<<<<< HEAD
			width: 50%;
			margin: auto;

		}
		.part-1 {
			width: 100%;
=======
			width: 100%;
			margin: auto;

		}
		.all-contain {
			width: 80%;
			margin-left: auto;
			margin-right: auto;
			display: flex;
			flex-wrap: wrap;
		}
		.part-1 {
			width: 38%;
>>>>>>> 1ef5fcaa6524b8b4cd8e34b822125e3ea83031fe
			display: flex;
			flex-wrap: wrap;
		}
		.part-2 {
<<<<<<< HEAD
=======
			width: 60%;
>>>>>>> 1ef5fcaa6524b8b4cd8e34b822125e3ea83031fe
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
<<<<<<< HEAD
			font-size: 20px;
=======
			font-size: 25px;
>>>>>>> 1ef5fcaa6524b8b4cd8e34b822125e3ea83031fe
			margin: 0;
			width: 100%;
		}
		.info {
			width: 100%;
			display: flex;
			flex-wrap: wrap;
			padding: 10px;
<<<<<<< HEAD
			text-align: center;
=======
>>>>>>> 1ef5fcaa6524b8b4cd8e34b822125e3ea83031fe
		}
		.info h1 {
			text-transform: uppercase;
			width: 100%;
<<<<<<< HEAD
		}
		
		.logos img {
			max-width: 60px;
			max-height: 60px;
=======
			margin: 0;
		}
		
		.logos img {
			max-width: 40px;
			max-height: 40px;
>>>>>>> 1ef5fcaa6524b8b4cd8e34b822125e3ea83031fe
			border-radius: 50%;
			padding-right: 20px;
		}
		.logos {
			margin: auto;
<<<<<<< HEAD
			padding: 10px;
=======
			margin-left: 0;
			padding: 10px;
			margin-top: 0;
			margin-bottom: 0;
		}
		.vl {
			border: 2px solid #000;
			margin-top: 5%;
			margin-bottom: 5%;
		}
		#username {
			font-weight: bold;
>>>>>>> 1ef5fcaa6524b8b4cd8e34b822125e3ea83031fe
		}

		/*
		Media queries for other screens
		*/
		@media screen and (max-width: 880px){
<<<<<<< HEAD
			.col-1, .col-2 {
				width: 100%;
				max-width: 100%;
			}
=======
			.part-1, .part-2 {
				width: 100%;
				max-width: 100%;
			}
			.vl {
				display: none;
			}
>>>>>>> 1ef5fcaa6524b8b4cd8e34b822125e3ea83031fe
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
<<<<<<< HEAD

	<div class="part-1">
		<div class="image_header">
			<img src="http://res.cloudinary.com/nath/image/upload/v1524182119/Image_-_Portrait.jpg" alt="profile-image">
			<!--
				Cloudinary link to the image 

			 http://res.cloudinary.com/nath/image/upload/v1524182119/Image_-_Portrait.jpg -->
		</div>
	</div>
	<div class="part-2">
		<div class="info">
			<h1><?php echo $name ?></h1>
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
=======
	<div class="all-contain">
		<div class="part-1">
			<div class="image_header">
				<img src="http://res.cloudinary.com/nath/image/upload/v1524182119/Image_-_Portrait.jpg" alt="profile-image">
				<!--
					Cloudinary link to the image 

				 http://res.cloudinary.com/nath/image/upload/v1524182119/Image_-_Portrait.jpg -->
			</div>
		</div>
		<div class="vl"></div>
		<div class="part-2">
			<div class="info">
				<h1><?php echo $name ?></h1>
				<p id="username">@nath</p>
				<p style="font-size: 40px;padding: 20px 0;">Frontend developer</p>
				<p>All time lover of tech, love creating cool stuffs and I love music.</p>
			</div>
			<div class="logos">
				<a href="https://web.facebook.com/nathanielsheun"><img src="http://res.cloudinary.com/nath/image/upload/v1524242347/facebook-letter-logo_318-40258.jpg" alt="facebook_logo"></a>
				<a href="https://twitter.com/nathmankind"><img src="http://res.cloudinary.com/nath/image/upload/v1524242414/twitter-logo_318-40209.jpg" alt="twitter-logo"></a>
				<a href="https://www.instagram.com/nath_mankind/"><img src="http://res.cloudinary.com/nath/image/upload/v1524242412/instagram-logo1.png" alt="instagram-logo"></a>
				<a href="https://github.com/nathmankind"><img src="http://res.cloudinary.com/nath/image/upload/v1524250453/github-logo.svg" alt="github-logo"></a>
			</div>
		</div>
	</div>

	
>>>>>>> 1ef5fcaa6524b8b4cd8e34b822125e3ea83031fe
	
</body>
</html>