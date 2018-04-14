 <?php

// Create connection
$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_DATABASE);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sqli = "SELECT secret_word FROM secret_word";
$resulti = $conn->query($sqli);
if ($resulti->num_rows > 0) {
while($rowi = $resulti->fetch_assoc()){;
$secret_word = $rowi["secret_word"];
}
}
$sql = "SELECT intern_id, name, username, image_filename FROM Interns_data_";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$id = $row["intern_id"];
		$name = $row["name"];
		$username= $row["username"];
		$image_url = $row["image_filename"];
       
    }
} else {
    echo "0 results";
}

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
	<?php echo $row["name"];?>
</body>
</html>
<?php $conn->close();?>