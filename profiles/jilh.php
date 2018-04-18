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
					width: 100%;
					height: 600px;
					position: relative;
					left: 0;
					right: 0;
					top: 30px;
					bottom: 0;
					margin: auto;
					text-align: center;
					background: #ddd;
					padding: 20px;
				}
				.main > h2{
					font-size: 30px;
					color: #007bff;
					margin-top: 10px;
					}
				.main > h3{
					font-size: 18px;
					line-height: 2em;
					font-family: Lato,'Helvetica Neue',Helvetica,Arial,sans-serif;
				}
				.main > h6 {
					font-size: 14px;
					margin-top: 15px;
					color: #007bff;
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
					margin-top: 10px;
					padding-left: 0;
				}
				.connect > li{
					display: inline-block;
				}
				.connect > li > a{
					font-size: 34px;
					font-weight: bold;
					text-decoration: none;
					color: #fff;
					text-align: center;
					border-radius: 20%;
				}
			
		</style>
	</head>
	
	<body>
		
		<div class="main">
			<img src="<?php if(isset($my_data['image_filename'])) echo $my_data['image_filename']; ?>" class="my_pics" alt="Afolayan Stephen">
			<h2>Hi! I'm <?php if(isset($my_data['name'])) echo $my_data['name']; ?></h2>
			<h3>I'm a lover of tech, i just got my hands on an opportunity to learn,
			and i'm loving every bit of it.</h3>
			
			<h6>Let's talk</h6>
			<ul class="connect">
				<li><a style="color: #3b5998;" href="https://www.facebook.com/afolayan.stephen"><span class="fa fa-facebook-square"></span></a></li>
				<li><a style="color: #db4437;"href="https://plus.google.com/100463981266653803670"><span class="fa fa-google-plus-square"></span></a></li>
				<li><a style="color: #212529;" href="https://github.com/jilh"><span class="fa fa-github-square"></span></a></li>
			</ul>
		</div>
	</body>
</html>
