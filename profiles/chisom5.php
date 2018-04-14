<?php

require '../db.php';
$start = $conn->query("SELECT *FROM secret_word");

$result = $start->fetch(PDO:: FETCH_ASSOC);
$secret_word = $result['secret_word'];

$username ='chisom5';
$fullname = 'Okoye chisom';
$image ="http://res.cloudinary.com/dzejyjjer/image/upload/v1523722123/chisomProfile.jpg";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chisom Okoye</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    .card {
			  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			  max-width: 300px;
			  margin: auto;
			  text-align: center;
			  font-family: arial;
			}

			.title {
			  color: grey;
			  font-size: 18px;
			}
            #twitter{
                color:#00aced;
            }
            #facebook{
                color:#3b5998;
            }
            #github{
            	color:#333;
            }
            #linked{
            	color:#0077B5;
            }
            footer{
                background:#000000;
                height:40px;
            }
            footer p{
                color:#ffffff;
                line-height:40px;
                font-size:13px;
            }
    </style>
</head>
<body>
    	<h2 style="text-align:center">My Profile Card</h2>

	<div class="card">
	  <img src="http://res.cloudinary.com/dzejyjjer/image/upload/v1523722123/chisomProfile.jpg" alt="John" style="width:100%; height: 300px">
	  <h1><?php echo $fullname->name; ?></h1>

	  <p class="title">FrontEnd Developer</p>
	  <p>Angular and anything JS</p>
	  <div style="margin: 24px 0; padding-bottom: 20px">
      <p> connect with me <br>
	    <a href="#"><i class="fa fa-twitter" id="twitter"></i></a>  
	    <a href="#"><i class="fa fa-linkedin" id="linked"></i></a>  
	    <a href="#"><i class="fa fa-facebook" id="facebook"></i></a> 
	    <a href="#"><i class="fa fa-github" id="github"></i></a>
        </p>
	 </div>

     <footer>
    <p>coptright&copy; HNGInternship 2018</p>
    </footer>
	</div>

    
</body>
</html>