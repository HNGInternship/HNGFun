<?php
require'db.php';
$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;

$result2 = $conn->query("Select * from interns_data where username='brume'");
$user = $result2->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Brume</title>
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">

	<style>
		body /*{
			background-image: url(https://res.cloudinary.com/drvtjwwxy/image/upload/c_scale,w_420/v1524622580/hng/ch.jpg);
		}*/

		.circle {
			width: 60%;
			margin-left: 20%;
			border-radius: 50%;
		}

		.frame {
			border: 1px solid grey;
			padding: 20px;
			background-color: #ffffff;
			margin-top: 20%;
		}

		.info {
			margin-top: 25px;
		}

		.slack_span {
			color: #0000ff;
		}

		.occupation_span {
			color: #ff0000;
			font-weight: bold;
		}

	</style>
</head>

<body>

<div class="container">
	<div class="row">
		<div class="col-md-6 offset-md-3 frame">
			<div class="row">
				<div class="col-md-12">
					<div class="circle">
						<img src="https://res.cloudinary.com/drvtjwwxy/image/upload/v1524622580/hng/ch.jpg" alt="profile picture" class="circle" />
					</div>
				</div>	
			</div>

			<div class="row info">
				<div class="col-md-12">
					<h3 class="text-center">
						<?php echo $name; ?>
					</h3>
					<h5 class="text-center"><span class="slack_span">Slack Username: </span>@chuka99</h5>
					<p class="text-center"><span class="occupation_span">My Intrest: </span>Web Designer and Developer</p>
				</div>

			</div>
		</div>	
	</div>
</div>

<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

