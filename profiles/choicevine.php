<?php
	
	if(!defined('DB_USER')){
		require '../db.php';
	}

	//Fetching from your database table.
        
        $query = $conn->query("select * from interns_data where username= 'choicevine' ");
        $result = $query->fetch(PDO::FETCH_OBJ);
        
        // think this should go here
        $ask = $conn->query("select * from secret_word LIMIT 1");
	
	//fetch as an object
        $answer = $ask->fetch(PDO::FETCH_OBJ);
	$secret_word = $answer->secret_word;
		
      
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="./style/styles.css">

	<file id="add-contact" class="module-active" method="" >

	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="2.js">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrap.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width-device-width, initial-scale-1, shrink-to-fit=no">

	<style type="text/css">

	* {
	margin: 0;
	padding: 0;
}

body {
	font-family: "Georgia";
	font-size: 16px;
}
		.container {
			position: relative;
			width: 100vw;
			padding: 30px;
		}

		.profile-image {
			position: relative;
			width: 200px;
			height: 200px;
			left: 40%;
			background: url(http://res.cloudinary.com/choicevine/image/upload/v1525725300/Camera%20Roll/WIN_20171210_134157.jpg); no-repeat center;
			background-size: cover;
		}

		.info {
			position: relative;
			width: 30%;
			left: 30%;
			padding:20px;
		}

		.name{
			position: relative;
			font-size: 27px;
			color: brown;
			text-align: center;
		}

		.username {
			position: relative;
			font-size: 15px;
			color: brown;
			opacity: 0.6;
			text-align: center;
		}

		.profession {
			position: relative;
			font-size: 15px;
			color: black;
			text-align: center;
		}
	</style>


</head>
<body>

	
	<?php 

// don't need this, you need conn from db.php
 // 			$db = new PDO(mysql:host= DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)
	// OR die('Could not connect to mySQL'.
	// 		mysqli_connect_error());

 	//$poke = $db->query("SELECT * FROM secret_word  ");
        

        //OOP style

		
  ?>


	<div class="container">
		
		<!-- The image can't show, it's not in an img tag -->

		<div class="profile-image">
			<img src="<?php echo $result->image_filename; ?>">
		</div>
		<div class="info">
			<!-- is this working? ...so which one is not working?....when I loaded it prior to your code above, it gave this -->
			<h3 class="name"><?php echo $result->name; ?></h3>
			<h4 class="username"><?php echo $result->username;  ?></h4>
			<p class="profession">Developer</p>

				
		</div>

		<!-- -->

	</div>


		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
	
