<?php
include_once("../config.php");
$connect = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
$query = "SELECT * FROM `secret_word`";
$result = mysqli_query($connect,$query);
if($result){
	echo "succesfull";
}
$sec = mysqli_fetch_array($result);
$secret_word = $sec["secret_word"];
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<title>Olunloye Akikunmi</title>
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
		<h3>I AM OLUNLOYE AKINKUNMI | HNG INTERN.</h3>
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