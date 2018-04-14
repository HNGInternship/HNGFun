<!DOCTYPE html>
<html>

<head>
	<title>Hello Site</title>
	<!--This site is sample project for HNG internship 4.0 for stage1.
	It contains a little of my interests. by Jeremiah Righteous -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
	<!--<link rel="stylesheet" type="text/css" href="style.css">-->
	<style type="text/css">
		
		body{
	padding:0;
	margin:0;
	font-family: 'Roboto', sans-serif;
	font-size: 100%;
	overflow: hidden;
	/**background-color: #F9F4ED;		**/
		
	}
	section.heroImage{

		background-image: url("https://res.cloudinary.com/jeremiahriz/image/upload/v1523631672/Hello-img/welcome_bg.jpg");
		background-color: black;
		width: 100%;
		height:650px;
		background-repeat: no-repeat;
		background-size: cover;
	} 


	section.content{
		position: absolute;
		text-align: center;
		top: 50px;
		left: 200px;

	}
	.content h1 {
		font-size: 40px;
		font-style: bold;
		line-height: 20px;
	}
	.about{
		font-size: 23px;
		line-height: 30px;
		letter-spacing: 20%;
	}
	#currentTime{
		margin-left: 130px;
		width: 300px;
		height:22px;
		background-color: #C4C4C4;
		font-size: 20px;
		padding: 6px;
		font-style: bold;
	}

	section.footer{
		margin: auto;
		width: 100%;
		position: absolute;	
		top:590px;
		text-align: center;
		line-height: 10px;
	}
	.link{
		text-decoration: none;
		color: black;
		
	}
	</style>

</head>
<body>
	<section class="heroImage"> </section>

	<section class="content">
		<img class="circle_img" src="https://res.cloudinary.com/jeremiahriz/image/upload/v1523631644/Hello-img/jeremiah.jpg" atl="Jeremiah Photo" style="border-radius:50%;
	border:6px solid black;width:170px">		
		<h1>HELLO THERE,</h1>
		<p class="about">My name is Jeremiah Righteous, a tech guy from Delta, NG.<br>
		I'm a web developer and creative UI/UX designer.</p>
		<div>
			<?php		
			$today = date("h:iA. l dS F, Y") ."<br>";
			echo "<p id='currentTime'>".$today."</p>";
			?>
		</div>
				<a href="https://github.com/jeremiahriz"><img src="https://res.cloudinary.com/jeremiahriz/image/upload/v1523631643/Hello-img/GitHub.png" style="width:40px"></a>
				<a href="https://twitter.com/jeremiahriz"><img src="https://res.cloudinary.com/jeremiahriz/image/upload/v1523631644/Hello-img/twitter.png" style="width:40px"></a>
				<a href="https://www.instagram.com/jeremiahriz/"><img src="https://res.cloudinary.com/jeremiahriz/image/upload/v1523631644/Hello-img/instagram.png" style="width:40px" ></a>		
		</div>
		<p><a href="www.jeremiahrighteous.com" class="link">wwww.jeremiahrighteous.com</a></p>
	</section>

	<section class="footer">

		<p>Designed with <span style="color: #cc023b; font-size: 20px;">&hearts;</span> by:  @jeremiahriz  <span style="font-size: 30px; font-style: bold;">|</span>  Hotel NG Internship 4.0</p>
	
	</section>
		
</body>
</html>