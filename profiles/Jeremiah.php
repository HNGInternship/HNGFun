<?php
	// $sql = "SELECT * FROM secret_word";
	// $result = mysqli_query($conn, $sql);
   	$result = $conn->query("Select * from secret_word LIMIT 1");

	// $secret_word = mysqli_fetch_assoc($result);
	$result = $result->fetch(PDO::FETCH_OBJ);
	$secret_word = $result->secret_word;

	// $sql2 = "SELECT * FROM interns_data WHERE username = 'hanyi'";
	// $result2 = mysqli_query($conn, $sql2);
	// $intern_data = mysqli_fetch_assoc($result2);
	$result2 = $conn->query("Select * from interns_data where username = 'Jeremiah'");
	$intern = $result2->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html>
<head>	
	<!--This site is sample project for HNG internship 4.0 for stage1. by Jeremiah Righteous -->
	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Hello Site</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">

	<style type="text/css">		
		body{
			padding:0;
			margin:0;
			font-family: 'Roboto', sans-serif;
			font-size: 100%;
			background-color: #DBE1E1;
		}

		section.content{
			margin: auto;
			position: relative;
			text-align: center;
			top: 100px;
		}
		.content h1 {
			font-size: 40px;
			font-style: bold;
			line-height: 45px;
		}
		.about{
			font-size: 23px;
			line-height: 30px;
			letter-spacing: 20%;
		}
		.link{
			margin-bottom: 100px;

		}

	</style>


</head>
<body>
	<section class="content">
		<img class="circle_img" src="https://res.cloudinary.com/jeremiahriz/image/upload/v1523631644/Hello-img/jeremiah.jpg" atl="Jeremiah Photo" style="border-radius:50%;
		border:6px solid black;width:170px">				
		
		<h1>HELLO THERE,</h1>
		<p class="about">My name is Jeremiah Righteous, a tech guy from Delta, NG.<br>
		I'm a web developer and creative UI/UX designer.</p>
		<div class="link">
				<p style="font-style: bold; color: blue;">Follow me:</p>
			<a href="https://github.com/jeremiahriz"><img src="https://res.cloudinary.com/jeremiahriz/image/upload/v1523631643/Hello-img/GitHub.png" style="width:40px"></a>
			<a href="https://twitter.com/jeremiahriz"><img src="https://res.cloudinary.com/jeremiahriz/image/upload/v1523631644/Hello-img/twitter.png" style="width:40px"></a>
			<a href="https://www.instagram.com/jeremiahriz/"><img src="https://res.cloudinary.com/jeremiahriz/image/upload/v1523631644/Hello-img/instagram.png" style="width:40px" ></a>		
		</div>
	</section>

		
</body>
</html>
