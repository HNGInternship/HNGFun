<!DOCTYPE html>
<html>
<head>
	<title>Segun's profile</title>
</head>
<style>
*{
	border:0px;
	margin:0px;
}
@keyframes  animate{
	0%{opacity:0.9;}
	25%{opacity:0.7;}
	50%{opacity:0.5;}
	75%{opacity: 0.2;}
	100%{opacity: 0.1;}
}
	center img{
		border-radius:40px;
		animation-name:animate;
		animation-iteration-count: infinite;
		animation-duration: 4s;
		animation-delay: 2s;
		box-shadow: 8px 8px 16px black;
	}
	body{
		background-color: grey;
		color:white;
		
	}
	header{
		margin-left:100px;
	}
	center{
		margin-top:70px;
	}
	.all{
		display:flex;
		float:left;
	}
	.first{
		width:200px;
		height:200px;
		background:radial-gradient(red,green,red);

	}

	.second{
		width:200px;
		height:200px;
		background:green;

	}
	.third{
		width:200px;
		height:200px;
		background:linear-gradient(red,green,red);
	}
	canvas{
		float:right;
		margin-right: 50px;
		
	}
	
</style>
<body>
	<header>
		<h1>Segunemma2003</h1>
		<h3>aka youngpresido</h3>
		<h4>contact me: segunemma2003@gmail.com</h4>
	</header>
	<center class='img'>
		<img src="http://res.cloudinary.com/hngsegun/image/upload/v1523662218/se.jpg" alt="segun" width="300px" height="300px">
		<span class="im"></span>
	</center>
	<div class="all">
		<div class="first">
			
		</div>
		<div class="second">
			
		</div>
		<div class="third">

		</div>

	</div>
	<canvas id="myCanvas" width="300px" height="400px"></canvas>
	<script>
		let can=document.getElementById('myCanvas');
		let canvas=can.getContext('2d');
		canvas.fillStyle="white";
		canvas.arc(50,50,50,0,Math.PI*2,false);
		canvas.fill();
		canvas.fillStyle="green";
		canvas.arc(200,100,100,0,Math.PI*2,false);
		canvas.fill();
	</script>
</body>
</html>

