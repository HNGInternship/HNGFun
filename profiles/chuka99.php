<?php
require 'db.php';
?>
<?php
$result= $conn->query ("Select * from secret_word LIMIT 1");
$result= $result->fetch(PDO::FETCH_OBJ);
$secret_word=$result->secret_word;
?>
<?php

echo $user->name  

?>

<?php 
mysql_connect("localhost", "root", "");
mysql_select_db("hng_fun");

$name = $_POST['name'];
$username = $_POST['username'];
$username = $_POST['image_filename'];


$qstr = "select * from `hng_fun`.`interns_data`";
$query = mysql_query($qstr);

//fetch from database
$recs = mysql_fetch_assoc($query);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 
if($recs)
{
	echo "Welcome, ".$recs['name']." ".$recs['image_filename']."<br>";
}
else
{
	echo "No record found!";
}
?>
<center>
<img src="cloudinary.com/console/media_library/asset/image/upload/hng%2Fch" />
</center> 