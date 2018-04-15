<?php
require('db.php');

$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
$result = mysqli_query($connect, "SELECT * FROM secret_word");
$secret_word = mysqli_fetch_assoc($result)['secret_word'];
$result = mysqli_query($connect, "SELECT * FROM interns_data WHERE username = 'jilh'");
if($result)	$my_data = mysqli_fetch_assoc($result);
else {echo "An error occored";}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>I'm Stephen</title>
		<style type="text/css">
			body{
					background: #f2f2f2;
					font-family: 'arial';
				}
				.nav{
					width: 80%;
					margin-left: 10%;
					margin-right: 10%;
				}
				.brand{
					float: left;
					display: inline-block;
					font-size: 24px;
					text-decoration: none;
					color: #000;
					font-family: 'arial';
					font-style: regular;
					}
				.nav-list{
					float: right;
					margin-top: 0;
				}
				.nav-list > li{
					display: inline-block;
					text-align: left;
				}
				.nav-list > li > a{
					text-decoration: none;
					color: #000;
					font-size: 18px;
					margin-left: 10px;
					font-style: regular;
				}
				.clear{clear: both;}
				
				.main{
					width: 600px;
					height: 500px;
					position: absolute;
					left: 0;
					right: 0;
					top: 0;
					bottom: 0;
					margin: auto;
					text-align: center;
				}
				.main > h1{
					font-size: 48px;
					}
				.main > h3{
					font-size: 24px;
				}
				.main > h6 {
					font-size: 14px;
				}
				.my_pics{
					width: 200px;
					height: 250px;
					border-radius: 100%;
					border: 5px solid #ddd;
				}
				
				.connect{
					list-style-type: none;
					margin-left: 0;
					padding-left: 0;
				}
				.connect > li{
					display: inline-block;
				}
				.connect > li > a{
					font-size: 24px;
					font-weight: bold;
					text-decoration: none;
					padding: 10px;
					background: #000;
					color: #fff;
					border-radius: 10%;
				}
			
		</style>
	</head>
	
	<body>
		
		<div class="main">
			<img src="<?php if(isset($my_data['image_filename'])) echo $my_data['image_filename']; ?>" class="my_pics" alt="Afolayan Stephen">
			<h2>Hi! I'm <?php if(isset($my_data['name'])) echo $my_data['name']; ?></h2>
			<h3>I'm a lover of tech, i just got my hands on an opportunity to learn,
			and i'm loving every bit of it.</h3>
			
			<h3>Connect with me</h3>
			<ul class="connect">
				<li><a href="https://www.facebook.com/afolayan.stephen">f</a></li>
				<li><a href="#">G</a></li>
				<li><a href="https://github.com/jilh">Github</a></li>
			</ul>
		</div>
	</body>
</html>
