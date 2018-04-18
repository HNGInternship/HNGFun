
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
				<a href="https://github.com/mercyikpe"><i class="fa fa-github" style="color:#ccc; font-size: 25px; padding:15px; float: right"></i></i></a>
				<a href="https://twitter.com/mercyikpee"><i class="fa fa-twitter"style="color:#ccc; font-size: 25px; padding:15px; float: right"></i></i></a>
				<a href="https://medium.com/@mercyikpe"><i class="fa fa-medium" style="color:#ccc; font-size: 25px; padding:15px; float: right"></i></i></a>
				<a href="https://web.facebook.com/mercy.ikpe.79"><i class="fa fa-facebook" float style="color:#ccc; font-size: 25px; padding:15px; float: right"></i></i></a>	
			</div>
		
	</header>
    
	<p id="clock">
		<?php
			echo "The time is </br>" . date("h:i:sa");
		?> 
	</p>
    
	<?php include_once('profiles/' . $profile_name. '.php');
	
	try {
        $secrete = 'SELECT * FROM secret_word';
        $sql = $conn->query($secrete);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $secret_word = $sql->fetch();
   	} catch (PDOException $error) {

        throw $error;
	}?>

</body>
</html>

