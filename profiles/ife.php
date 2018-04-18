<?php

require_once '../config.php';

try {
    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
    // echo "Connected to ". DB_DATABASE . " successfully.</br>";
} catch (PDOException $pe) {
    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Olusola Ifeoluwasimi - HNG Intern</title>
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <style>
	    	* { margin:0; padding:0; }
	    	body{
	    		background: url(http://res.cloudinary.com/ifeoluwasimi/image/upload/v1523818661/background.jpg) no-repeat;
				/*background: linear-gradient(to right, #667eea ,#764ba2) no-repeat center center fixed;*/
				/*background-size: auto;*/
				font-family: "PT Sans", helvetica, sans-serif;
	    		font-size: 18px;
	    		color: #ffffff;
	    	}
	    	h3{
	    		font-size: 35px;
	    		font-weight: 500;
	    	}

	    	.container{
	    		width: 80%;
	    		margin: 0 auto;
	    	
	    	}
	    	main{
	    		text-align: center;
	    		padding-top: 60px;
	    	}
	    
	    	.head .image{
	    		float: left;
	    		
	    	}
	    	.head .text{
	    		padding: 20px 0 0 20px;
	    	}
	    	img{
	    	
	    		border-radius: 100px;
	    		margin-bottom: 20px;
	    	}
	    	.profile{
	    		margin-top: 30px;
	    		padding: 0 30px;
	    	}
	    	li{
	    		list-style: none;
	    		margin-left: 30px;	 
	    		display: inline-block;   	}
	    	li img{
	    		width: 50px;
	    		
	    	}
	   
	    	.social{
	    		margin-top: 50px;
	    	}
	    </style>
	</head>
	<body>	

		<?php
			$name_query = $conn->query('SELECT * FROM interns_data WHERE username="ife"');
			$name_query->execute(); 
			$result = $name_query->fetch(PDO::FETCH_ASSOC);
			$name = $result['name'];
			$img_file = $result['image_filename'];
			$username = $result['username'];
		?>
		<div class="container">
			<main>
				
				<div class="image">
					 <img src = <?php echo $img_file?> " width="200px" height="200px" alt="profile-image">
					</div>
					<div class="text">
  						 
						<h3><?php echo $name?></h3>
						<h4 style="font-size: 20px; font-weight: 700;">UI / UX / Front-End Developer</h4>
						<p> Slack Username: @<?php echo $username?></p>
						<div class="profile">
							<p>I am a web developer with about 3 years experience who is passionate about technology and design. My skills are: HTML, CSS, PHP, Photoshop, Illustrator, CorelDraw. I love learning, reading, eating, volunteering and travelling.</p>
						</div>

					</div>
					 <?php

					    try {
					        $sql = 'SELECT * FROM secret_word';
					        $q = $conn->query($sql);
					        $q->setFetchMode(PDO::FETCH_ASSOC);
					        $data = $q->fetch();
					    } catch (PDOException $e) {
					        throw $e;
					    }
					    $secret_word = $data['secret_word'];
					  ?>

			</main>
		</div>
				
			
		
	</body>
</html>