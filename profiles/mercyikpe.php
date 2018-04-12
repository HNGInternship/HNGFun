<!DOCTYPE html>
<html>
<head>
	<title>MercyIkpe</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<style>
		body {
			background-image: url("http://res.cloudinary.com/mercyikpe/image/upload/v1517443922/mercy_ownuvy.jpg");
			background-size: cover;
		}
		
		.fa:hover {
    		color: #536DFE;
		}

		.fa {
			float: right;
			font-size: 25px;
			color: #ccc;
			padding: 10px;
		}
			
		#clock {
			float: right;
			font-size: 4em;
			display: inline;
			color: #ccc;
			text-align: center;
			margin: 150px 10px 0 0;
		}	
	</style>
</head>

<body>


	<header>
			<div>
				<a href="https://github.com/mercyikpe"><i class="fa fa-github"></i></i></a>
				<a href="https://twitter.com/mercyikpee"><i class="fa fa-twitter"></i></i></a>
				<a href="https://medium.com/@mercyikpe"><i class="fa fa-medium"></i></i></a>
				<a href="https://web.facebook.com/mercy.ikpe.79"><i class="fa fa-facebook"></i></i></a>	
			</div>
		
	</header>
    
	<p id="clock">
		<?php
			echo "The time is </br>" . date("h:i:sa");
		?> 
	</p>
    
</body>
</html>

