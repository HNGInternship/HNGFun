 <?php
include_once '../config.php';
define('DB_CHARSET', 'utf8mb4');
// Create connection
$msql = 'mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';charset='.DB_CHARSET;
$mysql = new PDO($msql, DB_USER, DB_PASSWORD);
//$t = new PDO('DB_HOST','DB_USER','DB_PASSWORD','DB_DATABASE');

//querying the database
$query = $mysql->query(
    "SELECT     interns_data_.name, 
                interns_data_.username, 
                interns_data_.image_filename, 
                secret_word.secret_word 
    FROM        interns_data_, 
                secret_word 
    WHERE       interns_data_.intern_id = secret_word.id LIMIT 1");

$row = $query->fetch();

// Secret Word and others 
$secret_word = $row['secret_word'];
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