<!DOCTYPE html>
<html>
<head>
	<title>Dahunsi Fehintoluwa</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<style>
		body {
			background-image: url("https://res.cloudinary.com/iceblaze/image/upload/v1523624386/DSC_1101.jpg");
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
				<a href="https://github.com/black-fyre"><i class="fa fa-github"></i></i></a>
				<a href="https://twitter.com/#"><i class="fa fa-twitter"></i></i></a>
				<a href="https://medium.com/#"><i class="fa fa-medium"></i></i></a>
				<a href="https://web.facebook.com/dahunsi.fehinti"><i class="fa fa-facebook"></i></i></a>	
			</div>
		
	</header>
    
	<p id="clock">
		<?php
			echo "The time is </br>" . date("h:i:sa");
		?> 
	</p>

</body>

