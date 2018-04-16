<?php
	
	if(!defined('DB_USER')){
		require "../config.php";
	}

	try {
		$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE, DB_USER, DB_PASSWORD);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$stmt = $conn->prepare("select secret_word from secret_word limit 1");
		$stmt->execute();

		$secret_word = null;

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->fetchAll();
		if(count($rows)>0){
			$row = $rows[0];
			$secret_word = $row['secret_word'];	
		}

		$name = null;
		$username = "mchardex";
		$image_filename = null;

		$stmt = $conn->prepare("select * from interns_data where username = :username");
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt->fetchAll();
		if(count($rows)>0){
			$row = $rows[0];
			$name = $row['name'];	
			$image_filename = $row['image_filename'];	
		}

	}
	catch(PDOException $e)
	{
		echo "Connection failed: " . $e->getMessage();
	}
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
        .card {
        box-shadow: 0 19px 17px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px;
        margin: auto;
        text-align: center;
        font-family: arial;
    }

        .title {
        color: #d69999;
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
<div class="container">
	<h2 style="text-align: center;
    font-family: sans-serif;
    font-size: 20px;
    text-shadow: 2px 2px 6px grey;">My Profile Card</h2>

	<div class="card">
	  <img src="http://res.cloudinary.com/mchardex/image/upload/v1523618086/bukunmi.jpg" alt="mchardex" style="width:100%; height: 350px">
	  <h1 style="font-size: 24px;">Adebisi Oluwabukunmi J</h1>
	  <p class="title">Web Developer</p>
	  <p>Javascript, NodeJs and jquery</p>
	  <div style="margin: 24px 0; padding-bottom: 20px">
	    <a href="https://twitter.com/mchardex"><i class="fa fa-twitter"></i></a>  
	    <a href="https://www.linkedin.com/in/adebisi-oluwabukunmi-13159474/"><i class="fa fa-linkedin"></i></a>  
	    <a href="https://www.facebook.com/bhukunmie.hardehbc.5"><i class="fa fa-facebook"></i></a> 
	    <a href="https://github.com/McHardex"><i class="fa fa-github"></i></a>
	 </div>
	</div>
</div>

</body>
</html>
