<?php

$dbD = 'mysql:dbname='.DB_DATABASE.';host='.DB_HOST;
		$username = DB_USER;
		$password = DB_PASSWORD;
$pdo = new PDO($dbD,$username,$password);


$query = "SELECT name,username,image_filename FROM interns_data WHERE username = 'jessam'";
$db = $pdo->prepare($query);
$db->execute();
$db->setFetchMode(PDO::FETCH_OBJ);
$result = $db->fetch();
// user details
$name = $result->name;
$username = $result->username;
$img = $result->image_filename;


//fetch secret word
$query = "SELECT secret_word FROM secret_word";
$db = $pdo->prepare($query);
$db->execute();
$db->setFetchMode(PDO::FETCH_OBJ);
$result = $db->fetch();

$secret_word = $result->secret_word;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="HNG internship 4.0">
    <meta name="author" content="Jessam">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <title>Samuel Jesudunsin</title>

    <style type="text/css">
body {
	margin: 0;
	padding: 0;
    font-family: 'Open Sans', sans-serif;
	font-size: 1.7em;
	color: #fff;
	background:#382c3f;

}
a {
	text-decoration: none;
	color: #fff;
}
.header {
	background: rgba(255,255,255,0.1);
}
.container{
	margin:0 auto;
	width: 1120px;
}
.flat {
	padding-top: 70px;
	text-align: center;
}
.forty {
	width: 50%;
	display: inline-block;
}
.flat h1,.flat p {
	font-size: 2em;
	font-weight: bold;
	margin: 0;
	padding: 0;
}
.flat h1 {
	margin-top: 20px;
}
.flat .avatar {
	max-width: 250px;
	max-height: 250px;
	border-radius: 50%;
	background: #fff;
	padding: 5px;
}
.flat p {
	font-weight: normal;
	font-size: 0.6em;
	letter-spacing:1px;
	margin: 20px 0;
}
.logo-font {
	font-weight: bold;
}
.header .nav-links {
	font-size: 0.7em;
	text-align: right;
	float: right;
	margin: 5px 0 0 0;
}
.nav div {
	display: inline;
}
.nav-links a {
	margin: 0 20px;
	vertical-align: middle;
}
.clearfix {
	overflow:auto;
}
.vertical-spacer{
	margin: 100px 0;
}
.little {
	font-size: 0.5em;
	color: #ccc;
}
    </style>
  </head>

  <body>
    <div class="header">
      <div class="container">
      <div class="nav clearfix">
        <div class="logo-font">Jessam</div>
        <div class="nav-links">
          <a href="#" class="links">About</a>
          <a href="#" class="links">Work</a>
          <a href="#" class="links">Contact</a>
        </div>
      </div>
      </div>
    </div>

    <div class="flat">
      <div class="container">
        <div class="forty">
        <img src="http://res.cloudinary.com/jessam/image/upload/v1523837963/jessam.jpg" class="avatar">
         <h1><?php echo $name ?></h1>
         <div class="little">@<?php echo $username; ?></div>
         <p><a href="http://twitter.com/youngestdj_" title="@youngestdj_"><img src="http://res.cloudinary.com/jessam/image/upload/v1523839638/twitter-48.png"></a></p>
       </div>

      </div>  
    </div>

    


  </body>
</html>