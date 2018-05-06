<?php
  $result = $conn->query("Select * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_OBJ);
  $secret_word = $result->secret_word;

  $result2 = $conn->query("Select * from interns_data where username = 'iamfredrick'");
  $user = $result2->fetch(PDO::FETCH_OBJ);
?>


<!DOCTYPE html>
<html>
<head>
	<title>My profile</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	body{
		background-color: f1f2fe;
	}
	h2{
		padding-top: 40px;
	}
			.profile {
			  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			  max-width: 300px;
			  margin: auto;
			  text-align: center;
			  font-family: arial;
			  border-radius: 10px;
			  padding-top: 20px;
			  background-color: #eff2f7;
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
			
			img{
				width: 150px; 
				height: 150px;
	-moz-border-radius: 50px;
	-webkit-border-radius: 50px;
	border-radius: 50px;
			}

	</style>

</head>
<body>

	<h2 style="text-align:center">PROFILE</h2>

	<div class="profile" >
	  <img src="<?= $user->image_filename;   ?>" alt="Fredrick" >
	  <h1><?= $user->name; ?></h1>
	  <p class='title' >Aspiring Full Stack Web Developer</p>
		<p>HGN Slack @<?= $user->username; ?></br>
	 
	  Eager to learn, Never giving up!</p>
	  <div style="margin: 24px 0; padding-bottom: 20px">
	  
					
					

	 </div>
	</div>

</body>
</html>
