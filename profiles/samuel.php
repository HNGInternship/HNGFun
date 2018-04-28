<!DOCTYPE html>
<html>
<head>
	<title>Samuel's Profile</title>
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

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Angkor' rel='stylesheet'>
	<link href="https://static.oracle.com/cdn/jet/v4.0.0/default/css/alta/oj-alta-min.css" rel="styleshet" type="text/css">
	<style>
	/*Global*/
			body{
				 max-width: 100%;
      height: auto;
			font-family: 'Angkor';
			font-size: 15px;
			line-height: 1.5;
			padding: 0;
			background-color: #1B1829;
		}
		.profiles{ 
			margin: auto;
			background-color: #ffffff;
			max-width: 290px;
			min-height: 380px;
			margin-top: 150px;
			border-radius: 10px;
			position: relative;
		}
		a{
			color: #000000;
		}

		hr{
			margin-top: 5px;
			margin-bottom: 5px;
			 background-color: #DECBBA; 
			 height: 1px; 
			 border: 0;
			}

		h2{
			padding-top: 22px;
			margin-bottom: 0;
			font-family: 'Angkor';
			font-size: 29px;
			color: #ffffff;
			padding-bottom: 10px;
		}
		h4{
			margin-top: 8px;
			font-size: 18px;
			margin-bottom: 35px;
			font-family: 'Angkor';

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
			 min-height: 180px;
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
		.bottom{
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

		<div class="profiles oj-flex oj-flex-items-pad oj-contrast-marker">
			<div class="top-box oj-sm-12 oj-md-6 oj-flex-item">
				<h2>Weke Samuel</h2>
				<h4>Full Stack Developer</h4>
			</div>
			<div class="circle oj-flex-item alignCenter">
				<img src="https://res.cloudinary.com/samuelweke/image/upload/v1523620154/2017-11-13_21.01.13.jpg" alt="Samuel Weke" >
			</div>
			<div class="bottom-box oj-flex">
				<div class="down-box">
					<hr>
					<span class="text" >+234 817 280 9245 <i class="fa fa-whatsapp " ></i></span>
					<hr>
					<span class="text" >wekesamuel@yahoo.com <i class="fa fa-envelope-open " ></i></span>
			   </div>
				<div class="bottom">
					<a href="https://web.facebook.com/segun.weke"><i class="fa fa-facebook" ></i></a>
					<a href="https://twitter.com/samuelweke"><i class="fa fa-twitter" style="padding-left: 10px" ></i></a>
					<a href="#"><i class="fa fa-instagram" style="padding-left: 10px" ></i></a>
				</div>
			</div>
		</div>

	</body>

</html>
