<?php



  try {
      $sql = 'SELECT name, username, image_filename, secret_word FROM secret_word, interns_data WHERE username = \'peterperez\'';
      $q = $conn->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC);
      $data = $q->fetch();
      $secret_word = $data['secret_word'];
  } catch (PDOException $e) {
      throw $e;
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $data['username']; ?> | HNGInternship4</title>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style type="text/css">
	body{
		color: #fff;
		font-family: 'Lato', sans-serif;
		background: linear-gradient(to bottom right, #00AEFF, #012738);
	}
		
		
		.margin{
			height: 100px;
		}
		a{
			 color: #C4C4C4;
		}

		a:hover{
			color: #fff;
		}

		figure {
            background-image: url(http://res.cloudinary.com/pixeldb/image/upload/c_crop,h_4032,x_10,y_673/v1523637382/IMG_0952_tfxgmf.jpg);
            background-size: cover;
            border-radius: 4px;
            height: 150px;
            width: 150px;
            border: 3px solid #a0a0a0;
        }
	</style>
</head>
<body>
	<div class="row">
		<div class="col-md-2">
			bot2
		</div>
	<div class="col-md-6">

   
		    <div>
		    	<div class="margin"></div>
		    	
		    	<figure></figure>
		    	<xmp style="font-family: 'Lato', sans-serif; font-weight: 600; font-size: 30px;"> </<?php echo $data['username']; ?>> </xmp>
		    	<h4><?php echo $data['name']; ?></h4>

		    	<span style="color: #C4C4C4;">Laravel • PHP • HTML • CSS • JAVA • C</span><br>

		    	<span>I believe the passion to learn more everyday,<br> helps me use technology to solve problems around me.</span>
		    	<br>
		    	<div style="font-size: 25px; margin-top: 10px;">
		    	<a href="http://www.github.com/peterperez" target="_blank"><i class="fa fa-github"></i></a>
		    	<a href="http://www.instagram.com/ambarelyscared" target="_blank"><i class="fa fa-instagram"></i></a>
		    	<a href="http://www.twitter.com/ambarelyscared" target="_blank"><i class="fa fa-twitter"></i></a>
		    	</div>
		    	<h3>Secret Word: <?php echo $secret_word; ?></h3>
		    	


		    </div>
	
		
		
		</div>
		
		
		<div class="col-md-4">
			Bot
		</div>
		
		
	</div>
</body>
</html>
