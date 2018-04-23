<?php
	require_once '../db.php';

	$user_name = "derekdunes";

	try{
		
		//secret key query
		$query = $conn->query("SELECT * FROM secret_word");
		$result = $query->fetch(PDO::FETCH_ASSOC);

		//user data query
		$stmt = $conn->query("SELECT * FROM interns_data_ WHERE username = '$user_name'");

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

	}catch(PDOException $e){

	}
	
	$secret_word = $result['secret_word'];

	$name = $row['name'];
	$username = $row['username'];
	$imageLink = $row['image_filename'];


?>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	</head>
	<body>
		<style type="text/css">
			body{
				background-color: #dfe2e5;
			}
			.container{
				text-align: center;
			}

			.col-1-3{
				width:33.33%;
				display:inline-block;
				vertical-align:top;
				padding-left:15px;
			  	padding-right:15px;
			}

			.detail{
				background-color: #fff;
				border:1px solid #fff;
				border-radius:5px;
				margin-top:88px;
				padding-bottom:22px;
				text-align:center;
			}

			.detail img{
				border-radius:50%;
				height:280px;
				width: 250px;
				margin:-66px 0 22px 0;
				vertical-align:top;
			}


		</style>
		<div class="container">
			<div class="row">
				<div class="col-1-3">
					<div class="detail">
						<img src="<?php echo $imageLink ?>" alt="<?php echo $name ?>">
						<h1><?php echo $name ?></h1>
						<h3>@Slack/<?php echo $username ?></h3>
						<br/>
						<div class="col-md-1"></div>
						<div class="col-md-1"><a href="https://twitter.com/shayhowe"><i class="fa fa-twitter"></i></a></div>
						<div class="col-md-1"></div>
						<div class="col-md-1"><a href="http://github.com/	derekdunes"><i class="fa fa-github"></i></a></div>
						<div class="col-md-1"></div>
						<div class="col-md-1"><a href="http://facebook.com/mbahderek18"><i class="fa fa-facebook"></i></a></div>
						<div class="col-md-1"></div>
						<div class="col-md-1"><a href="http://instagram.com/derekdunes"><i class="fa fa-instagram"></i></a></div>
						<div class="col-md-1"></div>
						<div class="col-md-1"><a href="http://medium.com/@derekdunes"><i class="fa fa-medium"></i></a></div>
						<div class="col-md-1"></div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<footer>
		
	</footer>
<html/>