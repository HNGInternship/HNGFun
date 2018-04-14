<?php
	require "../config.php";

	try {
		$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE, DB_USER, DB_PASSWORD);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$stmt = $conn->prepare("select secret_word from secret_word limit 1");
		$stmt->execute();

		$secret_word = null;

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->fetchAll();
		if(count($rows)>0){
			$row = $rows[0];
			$secret_word = $row['secret_word'];	
		}

		$name = null;
		$username = "chigozie";
		$image_filename = null;

		$stmt = $conn->prepare("select * from interns_data_ where username = :username");
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->fetchAll();
		if(count($rows)>0){
			$row = $rows[0];
			$name = $row['name'];	
			$image_filename = $row['image_filename'];	
		}

	}
	catch(PDOException $e)
	{
		echo "Connection failed: " . $e->getMessage();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Chigozie's Corner</title>
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">

	<style>
		body {
			background-image: url(http://res.cloudinary.com/dqscsuyyn/image/upload/v1523631081/bg.jpg);
		}

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
						<img src="<?php echo $image_filename; ?>" alt="Profile Picture" class="circle" />
					</div>
				</div>	
			</div>

			<div class="row info">
				<div class="col-md-12">
					<h3 class="text-center">
						<?php echo $name; ?>
					</h3>
					<h5 class="text-center"><span class="slack_span">Slack Username: </span>@<?php echo $username; ?></h5>
					<p class="text-center"><span class="occupation_span">What I do: </span>I develop web and mobile apps</p>
				</div>

			</div>
		</div>	
	</div>
</div>

<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>