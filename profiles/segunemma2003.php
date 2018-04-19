<?php  require "db.php";

try {
	$sql = 'SELECT name, username, image_filename, secret_word FROM secret_word, interns_data WHERE username = \'segunemma2003\'';
	$q = $conn->query($sql);
	$q->setFetchMode(PDO::FETCH_ASSOC);
	$data = $q->fetch();
	$secret_word = $data['secret_word'];
} catch (PDOException $e) {
	throw $e;
}
?> 
<!DOCTYPE html>

<html>
<head>
	<title><?php echo $data['username'];?> 'profile</title>
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
		<?php echo "<h1>Name: ".$data['name'] ."</h1>";?>
		<?php echo "<h2>Username: ".$data['username']. "</h2>";?>
		<h3>aka youngpresido</h3>
		<h4>contact me: segunemma2003@gmail.com</h4>
		<?php echo'this is my secret code '. $secret_word;?>
	</header>
	<center class='img'>
		<img src="<?php echo $data['image_filename'];; ?>" alt="segun" width="300px" height="300px">
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

