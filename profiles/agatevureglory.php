<?php

// include('../db.php');



	$sql = 'SELECT * FROM secret_word';
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
	$secret_word = $data['secret_word'];
	
	//get my details		
    $sql = "SELECT * FROM `interns_data` WHERE username = 'agatevureglory' LIMIT 1";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    
    $name = $data['name'];
	$image_filename = $data['image_filename'];
	

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	 <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
	<title>My Profile</title>
	
	<style>
		.myPics{
				border-radius: 50%;
				margin-top: 36px;
			}

			.fa {
			    padding: 10px;
			    width: 30px;
			    border-radius: 50%;
			    text-align: center;
			    text-decoration: none;
			}

/* Add a hover effect if you want */
			.fa:hover {
			    opacity: 0.7;
			}

/* Set a specific color for each brand */

/* Facebook */
			.fa-facebook {
			    background: #3B5998;
			    color: white;
			}

			/* Twitter */
			.fa-twitter {
			    background: #55ACEE;
			    color: white;
			}
			
			.name{
				margin-left: 80px;
			}
			.heading{
				background: rgb(13, 173, 85);
				color: white;
				padding: 8px;
				margin-top: 36px;
			}
	</style>
</head>
<body>
	<div class="container"> 
	    <div class="row">
	      <div class="col s5 "><span class="flow-text"><img class ="myPics" src="<?php echo $image_filename?>" width="300px" height="400px"></span>
	      	<h5 class="name"><a href="www.medium.com/@agatevureglory"><?php echo $name?></a></h5>
	      </div>

	      <div class="col s7 ">
	      	<h4 class="heading">Love to keep it simple</h4>
	      	<span class="flow-text"><h5><b>Want to know more about me?</b> </h5></span>

	      	<div class="contact">
	  	 	<h5 class="follow">Follow me on</h5>
	  	 	<a href="www.facebook.com/agatevureglory" class="fa fa-facebook"></a>
			<a href="www.twitter.com/agatevureglory" class="fa fa-twitter"></a>

			<p>Get secret word <b> <?php echo $secret_word ?></b></p>

	  	 </div>
	  	 </div>
	  	 
	    </div>
          
	</div>
</body>
</html>