<?php
include('../db.php');
$username = "umar";
$sql = "SELECT `name`, `username`, `image_filename` FROM `interns_data` WHERE `username`='$username'";
$sql0 = "SELECT * FROM `secret_word` LIMIT 1";
$stmt0 = $conn->prepare($sql0);
$stmt0->execute();
$data = $stmt0->fetch(PDO::FETCH_ASSOC);
$secret_word = $data['secret_word'];
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>HNG Fun || <?php echo $result['name']; ?></title>
		<style>
			body{
				padding-top: 30px;
			}
			.card {
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
				max-width: 300px;
				margin: auto;
				text-align: center;
			}
			.title {
				color: grey;
				font-size: 18px;
			}
			button {
				border: none;
				outline: 0;
				display: inline-block;
				padding: 8px;
				color: white;
				background-color: #000;
				text-align: center;
				cursor: pointer;
				width: 100%;
				font-size: 18px;
			}
			a {
				text-decoration: none;
				font-size: 22px;
				color: black;
			}
			button:hover, a:hover {
				opacity: 0.7;
			}
		</style>
	</head>
	
	<body>
		<div class="card">
		  <img src="<?php echo $result['image_filename']; ?>" alt="Umar" style="width:100%">
		  <h1><?php echo $result['name']; ?></h1>
		  <p class="title">Slack: @<?php echo $result['username'] ?></p>
		  <p><button>Contact</button></p>
		</div>
	</body>
</html>