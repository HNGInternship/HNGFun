<?php

    
  $result = $conn->query("Select * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_OBJ);
  $secret_word = $result->secret_word;

  $result2 = $conn->query("Select * from interns_data where username = 'rita12'");
  $intern = $result2->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <style>
		<title>My Profile</title>
		<style>

			.container {
				text-align: center;
			}
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

			a {
			  text-decoration: none;
			  font-size: 22px;
			  color: black;
			}

			 a:hover {
			  opacity: 0.7;
			}
	</style>
</head>
<body>
	<h2 class="title" style="text-align:center">My Profile Card</h2>

	<div class="container">
	<div class="card" style="width: 18rem; text-align: center;">
	  <img class="card-img-top" src="http://res.cloudinary.com/dppmnzbtx/image/upload/v1523644350/rita.jpg" alt="John" style="width:100%; height: 200px">
	  <div>
	    <h5>Rita Emili</h5>
	    <p>PHP beginner, Javascript intermediate<br>
	    	<span class="small text-danger"></span></p>
	    <a href="#" class="btn btn-primary">Meet Me!</a>
	  </div>
	  <div style="margin: 24px 0; padding-bottom: 20px">
	    <a href="#"><i class="fa fa-twitter"></i></a>  
	    <a href="#"><i class="fa fa-linkedin"></i></a>  
	    <a href="#"><i class="fa fa-facebook"></i></a> 
	    <a href="#"><i class="fa fa-github"></i></a>
	 </div>
	</div>
</div>

</body>
</html>