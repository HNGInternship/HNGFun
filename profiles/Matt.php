<?php
	$secret_word = "";
	$getProfile = $conn->query("SELECT * FROM interns_data WHERE username='Matt'");
	if($getProfile->rowCount() != 0){
		$matt = $getProfile->fetch(PDO::FETCH_ASSOC);
		$name = $matt['name'];
		$username = $matt['username'];
		$image = $matt['image_filename'];
	}
	$getSecretWord = $conn->query("SELECT * FROM secret_word");
	if($getSecretWord->rowCount() != 0){
		$sw = $getSecretWord->fetch(PDO::FETCH_ASSOC);
		$secret_word = $sw['secret_word'];
	}
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='https://fonts.googleapis.com/css?family=Encode Sans Semi Expanded' rel='stylesheet'>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
		<style>
			body{
				font-family: 'Encode Sans Semi Expanded';
				font-size: 22px;
				margin: 0px;
			}
			.container{
				margin: 0px;
				padding: 0px;
				max-width: 100% !important;
			}
			#matt-container{
				background: rgba(52, 100, 64, 1) url('http://res.cloudinary.com/adedayomatt/image/upload/v1524847390/background.jpg') center no-repeat;
				background-size: cover;
				height: 150vh;
				width: 100%;
			}
			#matt-container-inner{
				color: #FFF;
				height: 100%;
				padding-top: 20px;
			}
			.text-major{
				font-size: 80px;
				font-weight: 1000 !important;
			}
			.text-center{
				text-align: center;
			}
			.text-left{
				text-align: left;
			}
			.text-right{
				text-align: right;
			}
			a.matt-link{
				color: #FFF;
				text-decoration: none;
			}
			a.matt-link:hover{
				text-decoration: none;
				opacity: 0.8;
			}
			#matt-social-container{
				margin-top: 150px;
			}
			.matt-social-li{
				list-style-type: none;
				display: inline-block;
				margin: 0px 5px;
			}			
			#matt-bio{
				background-color: rgba(0,0,0,0.8);
				padding: 10px 50px;
				box-shadow: 0px 5px 5px rgba(200,200,200,0.5);
				border-radius: 5px;
				margin: 10px 20%;
			}
			#matt-img{
				width: 200px;
				height: 200px;
				border-radius: 50%;
			}
			@media all and (max-width: 768px){/*In mobile view*/
				#matt-bio{
					margin: 10px 10px;
				}
			}

		</style>
	</head>
	<body>
		<div id="matt-container">
			<div id="matt-container-inner" class="text-center">
				<h1 class="text-major">You are viewing</h1>
				<h3><?php echo $name ?>'s Profile</h3>
				<img id="matt-img" src="<?php echo $image ?>">
				<p id="matt-bio">Hey there, my name is <?php echo $name ?>, I am a web developer and i have been in the journey since 2016. I also have interest in Data Science and AI.</p>
				<div id="matt-social-container" class="text-center">
				<h4>Get in touch</h4>
				<ul id="matt-social-ul">
					<li class="matt-social-li"><a href="https://facebook.com/kayode.adedayo1" class="matt-link"><i class="fab fa-facebook"></i>  Kayode Adedayo Matthew</a></li>
					<li class="matt-social-li"><a href="https://instagram.com/adedayomatt" class="matt-link"><i class="fab fa-instagram"></i>  adedayomatt</a></li>
					<li class="matt-social-li"><a href="https://twitter.com/adedayomatt" class="matt-link"><i class="fab fa-twitter"></i>  adedayomatt</a></li>
					<li class="matt-social-li"><a href="https://github.com/adedayomatt" class="matt-link"><i class="fab fa-github"></i>  adedayomatt</a></li>
					<li class="matt-social-li"><a href="https://www.linkedin.com/in/adedayo-kayode-613007140/" class="matt-link"><i class="fab fa-linkedin"></i>  Adedayo (Matthew) Kayode</a></li>
					<li class="matt-social-li"><a href="mailto: adedayomatt@gmail.com" class="matt-link"><i class="fas fa-envelope"></i>  adedayomatt@gmail.com</a></li>
				</ul>
				</div>
			</div>
		</div>
	</body>
</html>