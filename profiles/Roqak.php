<?php
// define ('DB_USER', "root");
// define ('DB_PASSWORD', "");
// define ('DB_DATABASE', "hngfun");
// define ('DB_HOST', "localhost");
require_once '../db.php';
try {
	$sql = "SELECT * FROM interns_data WHERE username ='Roqak'";
try {
	$sql = "SELECT * FROM interns_data_ WHERE username ='Roqak'";
	$q = $conn->query($sql);
	$q->setFetchMode(PDO::FETCH_ASSOC);
	$data = $q->fetch();
} catch (PDOException $e) {
	throw $e;
}
$name = $data['name'];
$username = $data['username'];
$image = $data['image_filename'];
try {
	$sql2 = 'SELECT * FROM secret_word';
	$q2 = $conn->query($sql2);
	$q2->setFetchMode(PDO::FETCH_ASSOC);
	$new_data = $q2->fetch();
} catch (PDOException $e) {
	throw $e;
}
$secret_word = $new_data['secret_word'];
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<title><?php echo $name; ?> </title>
	<style type="text/css">
	.white{
		color: white;
		margin-top: 20%;
		font-family: Alfa Slab One; 
	}
	body{
		background-color: red;
	}
	#hello{
		font-size: 90px;
	}
	a{
		font-size: 40px;
		color: white;
		text-decoration: none;
		margin: 14px;
	}
	</style>
</head>
<body>
<!-- 	<?php
// include_once("../header.php");
?> -->
	<div class="white text-center">
		<h1 id="hello">HELLO</h1>
		<h3>I AM <?php echo $name; ?> | HNG INTERN.</h3>
                <a href="" target="https://www.facebook.com/badoo.akin">
                  <i class="fa fa-facebook"></i>
                </a>
                <a href="" target="https://twitter.com/roqak">
                  <i class="fa fa-twitter"></i>
                </a>
                <a href="" target="https://twitter.com/roqak">
                  <i class="fa fa-instagram"></i>
                </a>
								<a href="" target="https://slack.com/roqak">
                  <i class="fa fa-slack"></i>
                </a>
          </div>
	</div>
</body>
</html>