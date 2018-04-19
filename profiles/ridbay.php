<?php
require_once '../db.php';
	try {
		//Your username here
        $sql2 = "SELECT * FROM interns_data WHERE username = 'ridbay'";
        $q2 = $conn->query($sql2);
        $q2->setFetchMode(PDO::FETCH_ASSOC);
        $data2 = $q2->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
	
	$name = $data2['name'];
	$username = $data2['username'];
	$image = $data2['image_filename'];
    try {
        $sql = 'SELECT * FROM secret_word';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
	// this is for the secret key on tHNG server
    $secret_word = $data['secret_word'];
    ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

	<h2 style="text-align:center">My Profile Card</h2>

	<div class="card">
	  <img src="http://res.cloudinary.com/ridbay/image/upload/v1523716115/profile.jpg" alt="ridbay" style="width:100%; height: 200px">
	  <h1>Balogun Ridwan</h1>
	  <p class="title">Web Developer</p>
	  <p>HTML, CSS, Javascript, PHP</p>
	  <div style="margin: 24px 0; padding-bottom: 20px">
	    <a href="http://www.twitter.com/ridbay"><i class="fa fa-twitter"></i></a>  
	    <a href="http://www.linkedin.com/in/ridbay"><i class="fa fa-linkedin"></i></a>  
	    <a href="http://www.facebook.com/ridbay"><i class="fa fa-facebook"></i></a> 
	    <a href="http://www.github.com/ridbay"><i class="fa fa-github"></i></a>
	 </div>
	</div>

</body>
</html>
