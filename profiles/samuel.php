<?php 
  try {
      $sql = "SELECT secret_word FROM secret_word";
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
		<title>Weke Samuel</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Angkor' rel='stylesheet'>
	<style>
	/*Global*/
			body{
				 max-width: 100%;
    height: auto;
			font-family: 'Angkor';
			font-size: 15px;
			line-height: 1.5;
			padding: 0;
			background-color: #8EA0AD;
		}
		.container{ 
			margin: auto;
			background-color: #ffffff;
			max-width: 290px;
			min-height: 400px;
			margin-top: 150px;
			border-radius: 10px;
			position: relative;
		}
		a{
			color: #000000;
		}

		hr{
			 background-color: #DECBBA; 
			 height: 1px; 
			 border: 0;
			}

		h2{
			padding-top: 22px;
			margin-bottom: 0;
			font-size: 29px;
		}
		h4{
			margin-top: 8px;
			font-size: 18px;
			margin-bottom: 35px;
		}
		.top-box{
			min-height: 180px;
			background-color:  #FF4C48;
			border-radius: 10px 10px 0 0;
			color: #ffffff;
			text-align: center;
		}
		img{
		    border-radius: 50%;
		    height: 140px;
		    width: 140px;
		    /* center .blue-circle inside .main */
		    position: absolute;
		    top: 41%;
		    left: 50%;
		    margin-top: -70px;
		    margin-left: -70px;

		}

		.bottom-box{
			background-color: #ffffff;
			 min-height: 200px;
			 border-radius: 0 0 10px 10px;
		}

		.down-box{
			padding-top: 90px;
		}

		.text{
			color: #1C1B1A;
			padding-left: 10px;
			font-weight: bold;
		}
		.fa-whatsapp{
			padding-left: 110px;
			font-size: 20px;
		}
		.fa-envelope-open{
			padding-left: 68px;
			padding-bottom: 10px;
			font-size: 17px;
		}
		.end{

		}
		.footer{
			min-height: 40px;
			background-color: #F0E1DF;
			padding-top: 5px;
			border-radius: 0 0 10px 10px;
			font-size: 25px;
			text-align: center;

		}

	</style>

	</head>

	<body>

		<div class="container">
			<div class="top-box">
				<h2>Weke Samuel</h2>
				<h4>Full Stack Developer</h4>
			</div>
			<div class="circle">
				<img src="https://res.cloudinary.com/samuelweke/image/upload/v1523620154/2017-11-13_21.01.13.jpg" alt="Samuel Weke" >
			</div>
			<div class="bottom-box">
				<div class="down-box">
					<hr>
					<span class="text" >+234 817 280 9245 <i class="fa fa-whatsapp " ></i></span>
					<hr>
					<span class="text" >wekesamuel@yahoo.com <i class="fa fa-envelope-open " ></i></span>
			   </div>
				<div class="footer">
					<a href="https://web.facebook.com/segun.weke"><i class="fa fa-facebook" ></i></a>
					<a href="https://twitter.com/samuelweke"><i class="fa fa-twitter" style="padding-left: 10px" ></i></a>
					<a href="#"><i class="fa fa-instagram" style="padding-left: 10px" ></i></a>
				</div>
			</div>
		</div>

	</body>

</html>


