<!DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8" />
		<title>dingeoc profile</title>
	</head>
	<style type="text/css">
		body{
			background: #FFFFFF center 0px; 
			width:		100%;
			height: 	100%;
		}
		#container{
			width: 80%;
			margin: 2em auto;
			background: whiteorange;
			position: relative;
		}
		#profile_picture_space{
			width: 200px;
			height: 200px;
			border-radius: 25px;
			border: 2px solid #73AD21;
			position: center;
			background: url("http://res.cloudinary.com/dingeoc/image/upload/c_scale,h_200,w_200/v1526395950/IMG_20151010_134114.jpg") white;
			background-repeat: no-repeat;
		}
		.userinfo{
			font-family: 'Open Sans', sans-serif;
			background: #222222;
			width: 60%;
			line-height: 1.8;
			padding: 10%;
			text-align: center;
			color: white;
			border-radius: 25px;
			border: 2px solid #73AD21;
		}
	</style>
	<?php 
		require '../db.php';
		if(mysqli_connect_errno()){
			echo 'Error connecting to the database'.mysqli_connect_error();
		}
		$queryUserInfo = 'SELECT * FROM interns_data';
		$querySecretWord = 'SELECT * FROM secret_word';
		$userInfo = $conn->query($queryUserInfo);
		$secret_word_fetch = $conn->query($querySecretWord);
		$userInfo->setFetchMode(PDO::FETCH_ASSOC);
		$secret_word_fetch->setFetchMode(PDO::FETCH_ASSOC);
		//$userInfo = mysqli_query($conn, $queryUserInfo);
		//$secret_word = mysqli_query($conn, $querySecretWord);
	?>
	<body>
		<div id = "container" align="center">
			<div id="profile_picture_space">
				
			</div>
			<div class= "userinfo">
				<?php $row = $userInfo->fetch();?>
				<span>Username: <?php echo $row['username']; ?></span><br>
				<span>Full Name: <?php echo $row['name']; ?></span>
				<br>
				
				<?php $secretWordRow = $secret_word_fetch->fetch();
					  $secret_word = $secretWordRow['secret_word'];
				?>
			</div>
		</div>
	</body>
</html>