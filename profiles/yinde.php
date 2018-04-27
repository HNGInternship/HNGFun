<!DOCTYPE html>
<html>
<head>
	<title>pop</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<style>
		body{
	margin: 0;
	padding: 0;
	background: url(https://res.cloudinary.com/djoe3kx9f/image/upload/v1524732469/pexels-photo-434337.jpg);
	background-size: cover;
	background-position:;
	font-family: sans-serif;
	resize: 340px 420px;

}
.login-box{
	width: 320px;
	height: 420px;
	background: #bcc0c1;
	color: #fff;
	top: 50%;
	left: 50%;
	position: absolute;
	transform: translate(-50%,-50%);
	box-sizing: border-box;
	padding: 70px 30px;
}
.avatar{
	width: 100px;
	height: 100px;
	border-radius: 50%;
	position: absolute;
	top: -50px;
	left: calc(50% - 50px);
}
h1{
	margin: 0;
	padding: 0 0 20px;
	text-align: center;
	font-size: 22px; 

}
.login-box p{
	margin: 0px;
	padding: 0px;
	font-weight: bold;
}
.login-box input{
	width: 100%;
	margin-bottom: 20px;
}
.login-box input[type="text"],input[type="password"]
{
	border: none;
	border-bottom: 1px solid #fff;
	background: transparent;
	outline: none;
	height: 40px;
	color: #fff;
	font-size: 16px;

}
.login-box input[type="submit"]{
	border: none;
	height: 40px;
	background: #1c8adb;
	color: #fff;
	font-size: 18px;
	border-radius: 20px;


}
.login-box input[type="submit"]:hover
{
	cursor: pointer;
	background: #39dc79;
	color: #000;
}
.login-box a{
	text-decoration: none;
	font-size: 14px;
	color: #fff;

}
.login-box a:hover{
	color: #39dc79;
}
.login-box input[type="text"]:hover,input[type="password"]:hover{
	background: #7b7b89;
}
footer img{
	margin: 7px;
}
	</style>
</head>
<body>
	<?php 
	
	
	define ('DB_USER', "root");
	define ('DB_PASSWORD', "");
	define ('DB_DATABASE', "hng_fun");
	define ('DB_HOST', "localhost");    // Create connection
	$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
	$res = mysqli_query($connect,"SELECT * FROM secret_word");
	$secret_word = mysqli_fetch_assoc($res)['secret_word'];
	$result = mysqli_query($connect, "SELECT * FROM interns_data WHERE username = 'yinde'");
	if($result) {$my_data = mysqli_fetch_assoc($result);}
	else {echo "An error occored";}
	
	 ?>
	<div class="login-box">

	<img src="<?php echo $my_data["image_filename"] ?>" class="avatar">
		<h1>Saad's profile</h1>
			<!-- <form> -->
				<p>Name : <?php echo $my_data["name"] ?></p><br>
				
				<p>Phone:09055185546</p><br>
				<p>Adress:45,0dejayi,crescent</p><br>
				<p>Gmail: gayinde0@gmail.com</p><br>
				<p>Gender: Male </p><br>
				<p>Place born : Lagos</p><br>
				<p>Date born : 19/09/1997</p><br>
				<p>job: web developer</p><br>
				
				<!-- <input type="password" name="Password" placeholder="Enter Password" id="pa">
				<input type="submit" name="submit" value="Login" onclick="shout()">
				<a href="#">Forget password</a> -->

		
	</div>

</body>
</html>