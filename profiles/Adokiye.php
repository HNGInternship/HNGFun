<?php
require 'db.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$image_filename = '';
$name = '';
$username = '';
$sql = "SELECT * FROM `interns_data` where `username` = 'Adokiye'";
$result = $conn->query($sql);
foreach ($result as $row) {
    $image_filename = $row['image_filename'];
    $name = $row['name'];
    $username = $row['username'];
}
global $secret_word;

$sql = "SELECT secret_word from secret_word";
foreach ($conn->query($sql) as $row) {
    $secret_word = $row['secret_word'];
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
#div_main {
	background-color: #6FB0CB;
	width: 980px;
	margin-right: auto;
	margin-left: auto;
	font-family: Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
	text-align: center;
}
#header {
	background-color: #FFFFFF;
	width: 980px;
	margin-right: auto;
	margin-left: auto;
}
</style>
</head>

<body>

<div class=".body" id="div_main">
  <div class=".header" id="header">
    <p style="font-size: 36px; text-align: center; color: #563F3F; font-weight: bold;"><span style="font-style: italic; color: #FFFFFF; font-size: 24px;"><span style="color: #6FB0CB; font-size: 30px;">my</span></span> PROFILE</p>
  </div>
  <marquee onmouseover="this.stop();" onmouseout="this.start();">
  <p id="demo" style="font-size: 12px">Find out my stage by clicking the button below</p>
</marquee><button type="button" style="color: #3A31AB;" onclick="myFunction()">Find stage</button>

<script>
function myFunction() {
    document.getElementById("demo").innerHTML = "Stage 3";
}
</script>
  <p style="font-style: normal; font-weight: bold;">&nbsp;</p>
  <p style="font-style: normal; font-weight: bold;">NAME : <?php echo $name?></p>
  <p style="font-weight: bold">USERNAME : <?php echo $username?></p>
  <p><span style="font-weight: bold">PROFILE PICTURE :  </span>: <?php echo"<img src=$image_filename alt=\"Adokiye\" width=\"254\" height=\"413\">"?></p>
</div>
</body>
</html>
