<?php 
	// retrieve db instance
	require_once 'db.php';

	$secret_word = "";
	$name = "";
	$username = "";
	$img_url = "";

	// Get secret_word from db
	$sql = "SELECT secret_word FROM secret_word WHERE id = '1'";
	$result = $conn->prepare($sql);
	$result->execute();
	$row = $result->fetch(PDO::FETCH_ASSOC);
	// Store retrieved secret_word to $secret
	$secret_word = $row['secret_word']; 

	// Get user details
	$sql = "SELECT name, username, image_filename FROM interns_data WHERE username = 'joseph'";
	$result = $conn->prepare($sql);
	$result->execute();
	$row = $result->fetch(PDO::FETCH_ASSOC);
	// Store retrieved data from interns_data db
	$name = $row['name'];
	$username = $row['username'];
	$img_url = $row['image_filename'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Joseph's Profile</title>
	<!-- <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous">
	</script> -->
	<meta charset="utf-8">
	<style>
		body{
			font-family: consolas, sans-serif;
		}
		.container-fluid{
			height: auto !important;
			margin: 1% 0 0 0 !important;
			padding: 0;
			/*background: radial-gradient(circle closest-corner, 
				#004E8C 25%,
				#013D73 25%,  
				#0465B2 50%);*/
			background: inherit;
		}
		.first-col, .sec-col, .third-col{
			height: 500px;
			text-align: center;
			color: black;
			font-weight: bold;
			font-size: 20px;
			padding-top: 10%;
			padding-bottom: 5%;
		}
		.logo{
			width: 200px;
			height: 200px;
			align-content: center;
			margin: 8% 0 0 20.5%;
			padding: 0;
			float: left;
			vertical-align: center;
			border: 3px solid white;
			border-radius: 100%;
		}
		.first-col h1, .third-col h1{
			text-rendering: geometricPrecision;
			text-decoration: underline;
			text-decoration-style: underline;
			text-decoration-color: #fff; 
		}
		.first-col h1 p{
			text-align: justify !important;
		}
		.ul{
			list-style: none;
			display: inline-flex;
			margin: 0;
			padding: 0;
		}
		.ul li{
			margin: 15%;
			padding: 0;
		}
		.ul li a{
			text-decoration: none;
			color: #3b4747;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="container">
			<div class="row">
			    <div class="col-sm first-col">
			    	<h1>About Me</h1>
					<p>
						I am 
						<?= $name; ?>
						a.k.a @<?= $username ?>. 
						A developer, tech enthusiast, strategist and a nerd. I love to improve every sec.
					</p>
			    </div>

			    <div class="col-sm sec-col">
			    	<figcaption>
						<img class="logo" src=" <?= $img_url ?> ">
					</figcaption>
			    </div>

			    <div class="col-sm third-col">
			    	<h1>Get Social</h1>
					<ul class="ul">
						<li> 
							<a href="https://www.twitter.com/lilmeek4" target="blank">
								<i class="fa fa-twitter fa-inverse"></i>
							</a> 
						</li>
						<li>
							<a href="https://www.github.com/jo3e" target="blank"><i class="fa fa-github fa-inverse"></i></a>
						</li>
					</ul>
			    </div>
			  </div>
		</div>
	</div>
</body>
</html>