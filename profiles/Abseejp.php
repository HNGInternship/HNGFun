<?php
	define ('DB_USER', "root");
	define ('DB_PASSWORD', "root");
	define ('DB_DATABASE', "hngfun");
	define ('DB_HOST', "localhost");
	try {
    	$connection = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
    	//echo "Connected to ". DB_DATABASE . " successfully.</br>";
	} catch (PDOException $pe) {
    	die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
	}
	$query = "SELECT * FROM secret_word";
	$fetch_secret_word = $connection->prepare($query);
	if($fetch_secret_word->execute()){
		$secret_word = $fetch_secret_word->fetchAll(PDO::FETCH_OBJ);
	} else {
		die('Oops! Something Went Wrong');
	}
	$username = "@Abseejp";
	
	$query = "SELECT * FROM interns_data WHERE username=:username";
	$fetch_user = $connection->prepare($query);
	if($fetch_user->execute([':username'=>$username])){
		$user = $fetch_user->fetch(PDO::FETCH_OBJ);
		$name  = $user->name;
		$username  = $user->username;
		$image  = $user->image_filename;
	} else {
		die('Oops! Something Went Wrong');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Abseejp</title>
	<style type="text/css">
		.cover{
			
			background-size: cover;
			background-repeat: no-repeat;
			display: table;
			width: 100%;
			padding: 100px;
		}
		.cover-text{
			text-align: center;
			color: white;
			display: table-cell;
			vertical-align: middle;
			color: black;
		}
		img{
			height: 300px; 
			width: 300px;
			border-radius: 100px;
			margin-top: 100px;

		}
		#team{
			background-color:gray;
			background-size:cover;
			background-position: top;
			background-repeat: no-repeat; 
			color: white;
			text-align: center;
			color: black;
			margin-top: 40px;
		}
		#name{
			margin-top: 20px;
			font-size: 60px;
		}
		

	</style>
</head>


<?php 

include('header.php')

 ?>

<body>
	<div class="cover">
		<div class="cover-text">
			<h1>You probably haven't heard of Abseejaypee</h1>
			<p>it is really so amazing how little by little we are being groomed to become world class standard programmers with very outstanding and proficient skills</p>
			<a href="#why-us" role="button" class="btn btn-primary btn-lg">Meet Me</a>
		</div>
	</div>	
	</section>
	<section id="team">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<img src="http://res.cloudinary.com/abseejp/image/upload/v1523617182/abbb.jpg" id="why-us" >
					<h4 id="name">Abseejaypee</h4>
					<p>Am a Web Developer, A Data Scientist, A Programmer who loves deep thinking, A Writer and Someone who loves innovation</p>
				</div>	
			</div>
		</div>
		<?php 
		 ?>
		
	</section>
	<?php 
		include('footer.php');

	 ?>
<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
