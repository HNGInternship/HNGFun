<?php
  //require '../db.php';
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
	<link href="https://static.oracle.com/cdn/jet/v4.0.0/default/css/alta/oj-alta-min.css" rel="stylesheet" type="text/css">
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
			display: flex;
			flex-wrap: wrap;
		}
		.part-2 {
			width: 60%;
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
		}
		.info h1 {
			text-transform: uppercase;
			width: 100%;
			margin: 0;
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
			border: 2px solid #000;
			margin-top: 3%;
			margin-bottom: 3%;
		}
		#username {
			font-weight: bold;
		}
		.oj-web-applayout-content {
		}

		/*
		Media queries for other screens
		*/
		@media screen and (max-width: 880px){
			.part-1, .part-2 {
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
			    padding: 10px;
			}
		}
		@media screen and (max-width: 1024px) {
			.image_header {
				width: initial;
			}
			.info {
				text-align: center;
				width: inherit;
			}
			.vl {
				display: none;
			}
			.logos {
			    margin: auto;
			    padding: 10px;
			    margin-left: none;
			}
		}
	</style>
</head>
<body>
	<div class="oj-web-applayout-max-width oj-web-applayout-content oj-margin">
		<div class="oj-flex oj-margin">
			<div class="oj-xl-5 oj-lg-4 oj-sm-12 oj-flex-item oj-flex">
				<div class="image_header">
					<img src="http://res.cloudinary.com/nath/image/upload/v1524182119/Image_-_Portrait.jpg" alt="profile-image">
					<!--
						Cloudinary link to the image 

					 http://res.cloudinary.com/nath/image/upload/v1524182119/Image_-_Portrait.jpg -->
					 
				</div>
			</div>
			<div class="vl">
				
			</div>
			<div class="oj-xl-6 oj-lg-7 oj-sm-12 oj-flex-item oj-flex oj-margin">
				<div class="oj-xl-12 oj-lg-12 oj-sm-12 oj-flex-item oj-margin">
					<div class="info oj-margin">
						<h1><?php echo $name ?></h1>
						<p id="username">@nath</p>
						<p style="font-size: 40px;padding: 20px 0;">Frontend developer</p>
						<p>All time lover of tech, love creating cool stuffs and I love music.</p>
					</div>
					<div class="oj-flex oj-sm-align-items-center">
						<div class="logos">
							<a href="https://web.facebook.com/nathanielsheun"><img src="http://res.cloudinary.com/nath/image/upload/v1524242347/facebook-letter-logo_318-40258.jpg" alt="facebook_logo"></a>
							<a href="https://twitter.com/nathmankind"><img src="http://res.cloudinary.com/nath/image/upload/v1524242414/twitter-logo_318-40209.jpg" alt="twitter-logo"></a>
							<a href="https://www.instagram.com/nath_mankind/"><img src="http://res.cloudinary.com/nath/image/upload/v1524242412/instagram-logo1.png" alt="instagram-logo"></a>
							<a href="https://github.com/nathmankind"><img src="http://res.cloudinary.com/nath/image/upload/v1524250453/github-logo.svg" alt="github-logo"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>