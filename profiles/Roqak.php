<html>

<?php 
  require 'db.php';
?>
<?php
   $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'roqak'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
?>

<head>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<title> <?php echo $user->name ?> </title>
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
	<div class="white text-center">
		<h1 id="hello">HELLO</h1>
		<h3>I AM <?php echo $user->name ?>  HNG INTERN.</h3>
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
</body>
</html>
