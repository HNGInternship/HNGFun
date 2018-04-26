<?php 
	$sql = "SELECT * FROM `interns_data` WHERE `username`='nonso'";
	$stmt = $conn->query($sql);
	$result = $stmt->fetch(PDO::FETCH_OBJ);

	$sql = "SELECT * FROM `secret_word`";
	$stmt = $conn->query($sql);
	$secret_word = $stmt->fetch(PDO::FETCH_OBJ)->secret_word;
 ?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $result->name;?>'s HNGFUN Profile</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

	<style type="text/css">
		.card-body {
			height: 40%;
		}
		small {
			font-family: 'Great Vibes', cursive;
			font-weight: bold;
			font-size: 25px;
		}
		h3 {
			font-family: Calibri;
		}
		#social-fb:hover {
		     color: #3B5998;
		 }
		 #social-tw:hover {
		     color: #4099FF;
		 }
		 #social-gh:hover {
		     color: ;
		 }
		 .social:hover {
		     -webkit-transform: scale(2.2);
		     -moz-transform: scale(1.1);
		     -o-transform: scale(1.1);     
		 }
		 .social {
		     -webkit-transform: scale(0.8);
		     /* Browser Variations: */
		     
		     -moz-transform: scale(0.8);
		     -o-transform: scale(0.8);
		     -webkit-transition-duration: 0.5s;
		     -moz-transition-duration: 0.5s;
		     -o-transition-duration: 0.5s;
		     color: #63656A;
		    width: 40px;
		    height: 40px;
		    border-radius: 50%;
		    border-bottom: none;
		    padding-top: 5px;
		 }
		 #main-div {
		 	width: 45%; 
		 }
		 @media (width: 749px) {
		 	div#main-div {
		 		width: 90%;
		 	}
		 }
	</style>
</head>
<body style="background-image: url(http://res.cloudinary.com/godtime/image/upload/v1523891058/background.jpg);">
	<div class="card bg-light mt-5 ml-auto mr-auto" id="main-div" 
		style="height: 80%;
				box-shadow: 8px 10px 20px 0px rgba(0, 0, 4, 0.15);
		">
	  <img class="card-img-top img-rounded" src="<?= $result->image_filename; ?>" alt="Confident Nonso Mgbechi" style="height: 350px;">
	  <div class="card-body">
	    <h3 class="card-title"><?= $result->name;?> <small class="pull-right">@<?= $result->username; ?></small></h3>
	    <p class="card-text text-center">I love Science. I love Tech. I love People. I have huge goals.</p>
	    <div class="text-center">
		    <a href="https://twitter.com/nonsomgbechi" target="_blank" class="card-link" title="Follow me on twitter"><i class="fa fa-twitter social" id="social-fb"></i></a>
	    	<a href="https://web.facebook.com/kingdageek" target="_blank" class="card-link" title="Connect with me on facebook"><i class="fa fa-facebook social" id="social-tw"></i></a>
		    <a href="https://github.com/kingdageek" target="_blank" class="card-link" title="Check out my github account"><i class="fa fa-github social" id="social-gh" ></i></a>
	    </div>
	  </div>
	</div>
</body>
</html>
