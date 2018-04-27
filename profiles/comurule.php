<?php 
  require 'db.php';
?>

<?php
   $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'comurule'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Comurule</title>

<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">
 * { 
  margin: 0;
  padding: 0;
  font-family: tahoma, sans-serif;
  box-sizing: border-box;
}

  body{
  	width: 100%
  	padding:20px;

  	}
	.majleft{
		width: 30%;
		padding: 10px;
		float: left;
		border: 2px, solid, solid-grey;
		background-color: #eeeeee;
	}
	.minleft{
		width: 10vw;
		height: 50px;
		float: right;
		box-shadow: 5px;
		background-color: white;


	}

	.minleft a:hover, .minleft a:focus{background-color: rgb(128,128,128); color: rgb(255,255,255);}
	.minleft a:active{background-color: 128,128,255; color: rgb(255,255,255);}
	
	.majright{width: 60%;
		padding: 30px;
		float: right;
		box-shadow: 5px;
		background-color: #dddddd;

	}

</style>

</head>	

<body>
	<div style="width: 200px; height: 400px; position: center;"><img src="http://res.cloudinary.com/comurule/image/upload/v1524716649/IMAG0270.jpg" 
		style="width: 200px; height: 400px; position: relative; border-image: 2px solid solid-grey;"></div>
	<h1 style="text-align: center; color: rgb(128,128,255); ">UMECHUKWU CHIBUIKE</h1><br>
	<h4 style="text-align: center; color:rgb(255,128,128);">A Programming beginner who's very determined to succeed in this feld</h4>
</body>
</html>