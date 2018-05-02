<?php
	//require db connect
	require 'db.php';
?>

<?php
  //query our db to get secret word
  $result = $conn->query("Select * from secret_word LIMIT 1");

  $result = $result->fetch(PDO::FETCH_OBJ); //fetch result

  $secret_word = $result->secret_word; // assing result to variable



  $result2 = $conn->query("Select * from interns_data where username = 'alloyking'"); //query to get user details

  $user = $result2->fetch(PDO::FETCH_OBJ);  // assign to array

?>
<!DOCTYPE html>
<html>
<head>
	<title>My Portfolio</title>
	<style type="text/css">
		body{
			text-align: center;
			margin: 0px;
		}
		.dark{
			background-color: #1D1C33;
			border-radius: 20px 15px 20px 15px;
			padding-top:10%;
		}
		.light{
			margin-top:10%;
			background-color: #FFF;
			height: 40%;
			border-radius: 20px 15px 20px 15px;
		}
		.about{
			padding-top:1%;
		}

		.container{
			width: 100%; 
		}
		.second_heading{
			color: #F3F2FF;
			font-family: 'Roboto', sans-serif;
		}

		.main{
			color: #F2F2F2;
			font-family: 'Roboto', sans-serif;
			font-size: 4.5em;
			font-style: bold;
		}
		.heading{
			color: #F3F2FF;
			font-family: 'Roboto', sans-serif;
			font-size: 40px;
		}
		.border{
			border: solid 1px rgba(128, 128, 128, 0.5);
			margin-left: 25%;
			margin-right: 25%;
		}
		.name{
			color: #6cd54c;
			font-family: 'Roboto', sans-serif;
			font-size: 20px;
			top:0px;
		}
		.blue{
			color:#1A165A;
		}
		.img{
			margin-top:5%;
			border-radius:100%;
			border: solid 2px rgba(92, 122, 227, 0.5);
			width: 40%;
			height: 30%;
		}
		.profile_pix{
			width: 100%;
		}
	</style>
</head>

<body>
	<div class="container">
		<section class="dark">
			<div class="profile_pix">
				<img src="http://res.cloudinary.com/alloyking1/image/upload/v1524610631/IMG_20180410_152238.jpg" class="img" alt="loading..">
			</div>
			<h1 class="heading">Software Developer Intern</h1>
			<h4 class="second_heading">My HNG Internship Portfolio</h4>
			<p class="name">
				<?php 
					echo $user->name." (".$user->username." )"; //print user name from array 
				?>
			</p>
			
		</section>

		<section class="light">
			<div class="about">
				<h1 class="heading blue">About Me</h1>
				<h4 class="second_heading blue">Solve the problem, then write the code</h4>
				<p class="name blue">
					Life longer learner, tech enthusiast, problem solver and a self described inventor.
				</p>
			</div>
		</section>
	</div>

	<section>
		
	</section>
</body>
</html>
