<!DOCTYPE HTML>
<html>
	<head>

		<?php

			// $servername = "localhost";
			// $dbname = "hng_fun";
			$name = $username = $image_filename = $secret_word = "";
			try {

				// $conn = new PDO("mysql:host=$servername;dbname=$dbname", "root", "");
				// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$sql = "SELECT * FROM interns_data WHERE username = 'jane' LIMIT 1";
				$stmt = $conn->query($sql);

				$sql2 = "SELECT secret_word FROM secret_word LIMIT 1";
				$stmt2 = $conn->query($sql2);

				foreach ($stmt as $row) {
					# code...
					$name = $row['name'];
					$username = $row['username'];
					$image_filename = $row['image_filename'];
				}

				foreach ($stmt2 as $row) {
					# code...
					$secret_word = $row['secret_word'];
				}

			} catch (PDOException $e) {
				echo $e->getMessage();
			}

		?>

		<title>
			HNG4.0 | Jane Arisah
		</title>

    	<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">

		<style>
			*{
				box-sizing: border-box;
				margin: 0px;
				padding: 0px;
			}

			body{
				background: #fff;
			}

			#whole{
				padding: 20px;
				height: 100vh;
				/*border: 1px solid green;*/
				margin: 0px;
				min-height: 500px;
			}


			#slide1{
				box-shadow: 1px 0px 10px 1px lightgrey;
				margin-top: 0px;
				/*margin-bottom: 30px;*/
				background: #fafafa;
				padding-left: auto;
				padding-right: auto;
				padding-bottom: 30px;
			}

			#imgbox{
				display: block;
				margin-top: 50px;
				width: 150px;
				height: 150px;
				overflow: hidden;
				margin-right: auto;
				margin-left: auto;
				text-align: center;
				border-radius: 50%;
				padding-bottom: 20px;
			}

			#imgbox img{
				image-orientation: from-image;
			}

			@media (min-width:768px){

				#slide1{
					box-shadow: 1px 0px 10px 1px lightgrey;
					margin-top: 30px;
					margin-bottom: 30px;
					background: #fafafa;
					padding-left: auto;
					padding-right: auto;
				}

				#imgbox{
					display: block;
					margin-top: 100px;
					width: 150px;
					height: 150px;
					overflow: hidden;
					margin-right: auto;
					margin-left: auto;
					text-align: center;
					border-radius: 50%;
					padding-bottom: 20px;
				}

			}

			#namebox{
				padding: 15px;
				color: #01506A;
				text-align: center;
				font-size: 14px;
				font-weight: bold;
				font-family: 'Tahoma';
			}

			#titlebox{
				color: #066A8B;
				text-align: center;
				font-size: 16px;
				padding-bottom: 20px;
			}

			#slide2{
				box-shadow: 0px 3px 10px 5px lightgrey;
				background: #DE2121;
				min-height: 500px;
				height: 80vh;
				color: #eee;
				padding: 25px 30px;
			}

			#skills{
				padding: 25px;
			}

			#skills li{
				list-style:none;
				padding-bottom: 10px;
			}

			#skills div:first-child{
				padding-bottom: 10px;
				color: #A4C6C4;
				font-size: 14px;
				font-weight: bold;
				text-align: left;
				font-family: 'Trebuchet MS';
			}

			#skills div:nth-child(2){
				font-family: 'Arial';
			}

			#skills div:last-child{
				margin-top: 40px;
				font-family: 'Helvetica';
			}

			#connect{
				/*border: 1px solid black;*/
				padding-top: 10px;
				padding-bottom: 10px;
				margin-left: auto;
				margin-right: auto;
				display: block;
				text-align: center;
			}

			#connect a i{
				font-size: 35px;
				color: #01506A;
				transition: color 300ms;
				margin-right: 15px;
			}

			#connect a:first-child i:hover{
				color: #5576BD;
				transition: color 300ms;
			}

			#connect a:nth-child(2) i:hover{
				color: #1DA1F2;
				transition: color 300ms;
			}

			#connect a:last-child i:hover{
				color: #333;
				transition: color 300ms;
			}

		</style>

	</head>

	<body>


		<div class="container">
			<div class="row" id="whole">
				<div class="hidden-xs col-md-2"></div>

				<div class="col-sm-2 col-md-8">
					<div class="row">
						<div class="col-xs-12 col-sm-5" id="slide1">
							<div id="imgbox" class="col-xs-12">
								<img src='<?php echo $image_filename; ?>' alt="dustyJay" width="150px" height="auto">
							</div>

							<div class="col-xs-12" id="namebox"><?php echo strtoupper($name); ?></div>

							<div class="col-xs-12" id="titlebox">Web Designer | Web Developer</div>

							<div id="connect" class="col-xs-12">
								<a href="https://web.facebook.com/profile.php?id=100009067766863"><i class="fa fa-facebook"></i></a>
								<a href="https://twitter.com/JayArisah"><i class="fa fa-twitter"></i></a>
								<a href="https://github.com/dustyjay"><i class="fa fa-github"></i></a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-7" id="slide2">
							<!-- <div class="row"> -->
								<div id="skills" class="col-xs-12">
									<div>SKILLS</div>
									<div>
										<li>HTML + CSS + Bootstrap</li>
										<li>JavaScript + jQuery</li>
										<li>PHP</li>
										<li>MySQL</li>
										<li>Python</li>
									</div>
									<div>connect with me to build your web projects</div>
								</div>

								<div class="col-xs-12">
								</div>
							<!-- </div> -->
						</div>
					</div>
				</div>

				<div class="hidden-xs col-md-2"></div>
			</div>
		</div>
	</body>

	<script type="text/javascript" src="../vendor/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		
	</script>

</html>