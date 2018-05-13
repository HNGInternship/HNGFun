<?php

    try {
    $sql = "SELECT * FROM secret_word";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();

    $secret_word = $data['secret_word'];
	} catch (PDOException $e) {

	    throw $e;
	}

$sql = "SELECT * FROM interns_data where name='Bashorun Mazeed' ";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $my_data = $q->fetch();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Bashorun Mazeed Profile Page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		body{
			background-color: rgba(184, 196, 196, 0.5);
		}
		h1{
			color: #a8a8a8;
		}

		#page{
			margin: 10px auto;
			width: 80%;
			height: 550px;
			background-color: white;
		}

		#left{
			float: left;
			padding: 4%;
			width: 50%;
		}

		#right{
			float: left;
			padding-top: 5%;
			width: 40%;
			color: #a4a4a4;
		}

		@media screen and (max-width: 1012px) {
			#page{
				margin: 10px auto;
				width: 80%;
				min-height: 880px;
				background-color: white;
				position: relative;
			}

			#left{
				padding: 4%;
				width: 80%;
			}

			#right{
				text-align: center;
				padding: : 4%;
				width: 80%;
				color: #a4a4a4;
			}

		}

	</style>
</head>
<body>
   
	<div id="page">
		<center>
			<h1>HNG 4.0 INTERN</h1>
		 </center>

		<div id="left">
			<img src="http://res.cloudinary.com/mazbash/image/upload/v1524669768/me.jpg" style="width: 400px; height: auto;">
		</div>
		<div id="right">
			<p> NAME : <?php echo $my_data['name']; ?></p>
			<p>USERNAME: <?php echo $my_data['username']; ?></p>
			<p>EMAIL : bashorun.mazeed@gmail.com</p>
			<p>FAVORITE QUOTE: "Every great developer you know got there by solving problems they were unqualified to solve until they actually did it." <br>Patrick McKenzie </p>
		</div>
	</div>


</body>
</html>