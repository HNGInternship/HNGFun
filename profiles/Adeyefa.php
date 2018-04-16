<!DOCTYPE html>
<html>
<?php
   $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'adeyefa'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
?>
<head>
	<title>  <?php echo $user->name ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style type="text/css">
		body{
			background-color: #D4F4F4;
		}
		h1{
			text-align: center;
			color: red;
		}
		.pimg{
			float: right;
		}
		p{
			text-align: center;
			font-size: 100px;
			color: red;
		}
		#p1{
			text-align: center;
			font-size: 60px;
		}
		#fav{
			size: 5px;
		}
		#info{
			text-align: center;
			font-size: 30px;
		}
	</style>
</head>
<body>
		
	<h1>
		WELCOME TO MY PROFILE PAGE
	</h1>
	<p>
		HELLO WORLD
	</p>
	
	<p id="p1">
		I am  <?php echo $user->name ?>
	</p>
	<p id="info">
		A Web developer, blogger and Software engineer
	</p>
	<p id="fav">
		<a href="https://github.com/sainttobs"><i class="fa fa-github"></i></i></a>
		<a href="https://twitter.com/9jatechguru"><i class="fa fa-twitter"></i></i></a>
		<a href="https://web.facebook.com/toba.adeyefa"><i class="fa fa-facebook"></i></i></a>	
	</p>
</body>
</html> 
