<?php
	$host       = "localhost";
	$username   = "mohammed";
	$password   = "dollie";
	$dbname     = "hng"; // will use later
	$dsn        = "mysql:host=$host;dbname=$dbname"; // will use later
	$options    = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

	try{
		$conn = new PDO($dsn, $username, $password, $options);

	} catch(PDOException $e){
		echo $e->getMessage();
	}

?>