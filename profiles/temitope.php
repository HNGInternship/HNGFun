<?php
require "../db.php";
$query = $db->query("Select * from secret_word LIMIT 1");
$result= $conn->query($query);

while($row = $result->fetch()){
	$secret=$row['secret_word'];
}

$secret_word = $secret;

$sql_user='select * from interns_data where username="temitope"';
$users = $conn->query($sql_user);

while($row = $users->fetch()){
	$id=$row['intern_id'];
	$name=$row['name'];
	$username=$row['username'];
	$image_filename=$row['image_filename'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo strtoupper($name) ?> on HNG 4.0</title>
	<link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<style>
		body{
			background: linear-gradient(150deg, #4e9af5, #f6b301);
			background-size: cover;
			background-position: center;
			font-family: 'Andika';
			font-size: 16px;
			height: 100vh;
			overflow-y: scroll;
			overflow-x: hidden;
		}

		h1{
			margin-bottom: 5px;
		}
		.flexbox{
			height: 90vh;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		.main{
			background-color: rgba(0, 0, 0, 0.6);
			border-top-left-radius: 30px;
			border-bottom-right-radius: 30px;
			padding: 5%;
			width: 70%;
			max-width: 300px;
			min-height: 150px;
		}

		.card.profile-card{
			width: 80%;
			max-width: 400px;
			background-color: #fff;
			color: #777;
			min-height: 90%;
			
		}

		.card-body{
			
		}

		.card{
			border-radius: 10px;
			box-shadow: 2px 2px 2px #c3c3c3;

		}

		.footer{
			position: fixed;
			border-top-left-radius: 20px;
			border-top-right-radius: 20px;
			bottom: 0;
			left: 0;
			right: 0;
			background-color: rgba(0, 0, 0, 0.6);
			color: #fff;
			text-align: center;
			padding-top: 2vh;
			height: 7vh;
		}

		.span-width{
			width: 80%;
		}

		.btn-primary{
			padding: 5px;
			border-radius: 5px;
			background-color: #4e9af5;
			border: none;
			font-size: 14px;
			box-shadow: none;
			color: #fff;
			margin: 10px;
		}
		.label-info{
			border-radius: 3px;	
			background-color: #4e9af5;
			padding: 1px 2px;
			color: #fff;
		}

		.icon-circle{
			border-radius: 50%;
			color: #b3b3b3;
			width: 20px;
			align-items: center;
			height: 20px;
			text-align: center;
			padding: 5px;
			border: 2px solid #b3b3b3;
		}

	</style>
</head>

<body>
	<div class="flexbox">
		<div class="card profile-card">
			<div class="card-top" style="width: 100%;">
				<center>
				<div class="profile-img"  style="width: 200px; height: 200px; border-radius: 50%; overflow: hidden;">
					<img style="width: 200px;" src="<?php echo $image_filename ?>">
					
				</div>
				</center>
			</div>
			<div class="card-body" style="width: 100%; display: block;">
				<center>
					<h1><?php echo ucwords(strtolower($name)) ?></h1>
					 <span> @<?php echo strtolower($username) ?> </span> <span class="label-info">Slack </span>

					 <button class="btn-primary span-width">HNG 4.0 INTERN</button>
					 <p>
					 	<span class="fa fa-facebook icon-circle"></span>
					 	<span class="fa fa-twitter icon-circle"></span>
					 	<span class="fa fa-github icon-circle"></span>
					 </p>
				</center>
				
			</div>
			
		</div>
	</div>
</body>
</html>