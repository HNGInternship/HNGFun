<?php 
	$sql = "SELECT * FROM `interns_data` WHERE `username`='nonso'";
	$stmt = $conn->query($sql);
	$result = $stmt->fetch(PDO::FETCH_OBJ);

	$sql = "SELECT * FROM `secret_word";
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
	</style>
</head>
<body style="background-image: url(http://res.cloudinary.com/godtime/image/upload/v1523891058/background.jpg);">
	<div class="card bg-light mt-5 ml-auto mr-auto" 
		style="width: 47%; 
				height: 80%;
				box-shadow: 10px 0px 10px 2px #000;
		">
	  <img class="card-img-top img-rounded" src="<?= $result->image_filename; ?>" alt="Confident Nonso Mgbechi" style="height: 350px;">
	  <div class="card-body">
	    <h3 class="card-title"><?= $result->name;?> <small class="pull-right">@<?= $result->username; ?></small></h3>
	    <p class="card-text text-center">I love Science. I love Tech. I love People. I have huge goals.</p>
	    <div class="text-center">
		    <a href="https://twitter.com/nonsomgbechi" target="_blank" class="card-link"><i class="fa fa-twitter"></i></a>
	    	<a href="https://web.facebook.com/kingdageek" target="_blank" class="card-link"><i class="fa fa-facebook"></i></a>
		    <a href="https://github.com/kingdageek" target="_blank" class="card-link"><i class="fa fa-github"></i></a>
	    </div>
	  </div>
	</div>
</body>
</html>
