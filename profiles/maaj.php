 <?php

require 'db.php';
$sec = $conn->query("Select * from secret_word LIMIT 1");
$sec = $sec->fetch(PDO::FETCH_OBJ);
$secret_word = $sec->secret_word;



//querying the database
$query = $conn->query("Select * from interns_data where username = 'maaj'");
$row = $query->fetch();

// Secret Word and others 

$name = $row['name'];
$username= $row['username'];
$image_url = $row['image_filename'];


?> 
<!DOCTYPE html>
<html>
<head>
	<title>Maaj</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	.title{
		width: 100%;
		height: 30px;
		background-color: #000000;
		font color: #ffffff;
		color: #ffffff;
		padding: 0px 10px 10px 100px;
		
	}
	
	.profile{
		background-image: url(<?php echo $image_url;?>);
		background-size: cover;
		backgroun-position: top;
		background-repeat: no-repeat;
		width: 400px;
		height: 400px;
		border-radius: 50%;
	}
	.head{
		
		text-align: center;
		color: #ffffff;

		}
	



html, body {
    height: 100%;
}

html {
    display: table;
    margin: auto;
}

body {
    display: table-cell;
    vertical-align: middle;
}
</style>
</head>
<body bgcolor="#153643" >
	
	

	<div class="profile"></div>
	<div class="head"><h1><b> <?php echo $name;?></b> </h1> </div>
	<h5 class="head"> slack username: <?php echo $username;?></p>
	<div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-instagram"></i></a>
    <a href="#"><i class="fa fa-facebook"></i></a>
    <a href="#"><i class="fa fa-linkedin"></i></a>
    <a href="https://github.com/dmaaj"><i class="fa fa-github"></i></a>
 </div>
	<?php //echo $row["name"];?>
</body>
</html>
<?php //$conn->close();?>