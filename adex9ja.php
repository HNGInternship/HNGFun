<?php 
try {
     $profile = 'SELECT * FROM interns_data_ WHERE username="adex9ja"';
    $select = 'SELECT * FROM secret_word';

    $query = $conn->query($select);
    $profile_query = $conn->query($profile);

    $query->setFetchMode(PDO::FETCH_ASSOC);
    $profile_query->setFetchMode(PDO::FETCH_ASSOC);

    $get = $query->fetch();
    $user = $profile_query->fetch();
    $secret_word = $get['secret_word'];
  } catch (PDOException $e) {
      throw $e;
  }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Adeolu's Profile</title>
	<link rel="stylesheet" type="text/css" href="../vendor/font-awesome/css/font-awesome.min.css">
	

	<style type="text/css">
		@import url("//fonts.googleapis.com/css?family=Source+Sans+Pro:300,900");
		body{
			background: #E5E5E5;
			font-family: 'Source Sans Pro', sans-serif;
		}
		#container{
			margin: 30px auto;
			position: relative;
			width: 700px;
			height: 485px;
			background: #FFFFFF;
			box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
		}
		#profilePix{
			position: absolute;
			top: 10px;
			left: 265px;
			width: 170pX;
			height: 170px;
			background: url('http://res.cloudinary.com/adex9ja/image/upload/v1523796441/1523796266176.jpg'), #C4C4C4;
			background-size: 100%;
			border-radius: 50%;
			box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
		}
		#fullname{
			margin: auto;
			text-align: center;
			top: 190px;
			position: absolute;
			width: 100%;
			font-size: 38px;
			color: #000000;
		}
		#skills{
			margin: auto;
			text-align: center;
			top: 250px;
			position: absolute;
			width: 100%;
			font-size: 18px;
			color: #000000;
		}
		hr{
			top: 280px;
			left: 14px;
			position: absolute;
			width: 651px;
		}
		#social{
			top: 320px;
			width: 100%;			
			position: absolute;			
		}
		#android{
			right: 14px;
			bottom: 15px;
			position: absolute;
			width: 50px;
			height: 50px;
			background: url('http://res.cloudinary.com/adex9ja/image/upload/v1523793592/1_K_YuW1TgOmn7LD816Xy9cg.png');
			background-size: 100%;
		}
		#xamarin{
			right: 72px;
			bottom: 15px;
			position: absolute;
			width: 50px;
			height: 50px;
			background: url('http://res.cloudinary.com/adex9ja/image/upload/v1523793724/MobileProfessional.svg');
			background-size: 100%;
		}	
		#xamarin2{
			right: 132px;
			bottom: 15px;
			position: absolute;
			width: 50px;
			height: 50px;
			background: url('http://res.cloudinary.com/adex9ja/image/upload/v1523834748/MobileDeveloper.svg');
			background-size: 100%;
		}		
		a, a:hover{
			text-decoration: none;
		}

	</style>
</head>
<body>
	<div id="container">
		<div id="profilePix"></div>
		<div id="fullname">Adeyemo Adeolu Sunday</div>
		<div id="skills">Android Developer  &nbsp;&bull;&nbsp;  Web Developer  &nbsp;&bull;&nbsp;  Digital Marketer</div>		
		<hr/>
		<div id="social">
			<center>
				<a href="https://twitter.com/adex9ja" target="_blank">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                     </span>
            </a>
            <a  href="https://www.facebook.com/adex9ja" target="_blank">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                     </span>
            </a>
            <a  href="https://github.com/adex9ja" target="_blank">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                     </span>
            </a>
            <a href="https://www.linkedin.com/in/adex9ja/" target="_blank">
                     <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                     </span>
            </a></center>		        
		 </div>
		 
		<div id="android"></div>
		<div id="xamarin"></div>
		<div id="xamarin2"></div>
	</div>

</body>
</html>