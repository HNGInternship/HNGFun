				<!DOCTYPE html>

				<html>

				<head>

					<title>

						OTEEY'S PROFILE

					</title>

				</head>

				<style>

					.oteey{

						font-size: 30px;

						text-align: center;

						font-weight: bold;

						color: #0d0b28;

						padding-bottom: 30px;





					}



					.all{

						font-size: 15px;

						font-weight: bold;

						color: #211f30;

						padding-bottom: 1px;

						padding-top: 15px;

						text-align: center;

					}

					.facebook{

						font-size: 10px;

						font-weight: bold;

						color: white;

						text-align: center;

						border: 0px;

					}

					.github{

						font-size: 10px;

						font-weight: bold;

						color: white;

						text-align: center;

						border: 0px;

					}



					img{

						width: 80%;

					}

					.btn1{

						background-color: blue;

						margin-left:  625px;

					 

					}

					.btn2{

						background-color: black;

						width: 50;



					}

					button{



					}

				body{

					background-color: #d6baca;

				}



				</style>







				<body>



				<div>

					<h1 class="oteey">OTOBONG EKANABASI</h1>

					<img src="http://res.cloudinary.com/dev4mq8ay/image/upload/v1524067875/Oteeypix.jpg" style="padding-left: 550px;">

					<p class="all">Learning Basic HTML</p>

					<p class="all">Wants to become a Software Developer</p>

					<p class="all">Learn and be a part of AI</p>

					

					<a href="https://web.facebook.com/otobong.ekanabasi" target="_blank"><button class="facebook btn1">Facebook</button></a>

					<a href="https://github.com/otobongekanabasi" target="_blank"><button class="github btn2">Github</button></a>

					

				<?php

				date_default_timezone_set('UTC');

				?>

				<script>

				var d = new Date(<?php echo time() * 1000 ?>);

				function digitalClock() {

				  d.setTime(d.getTime() + 1000);

				  var hrs = d.getHours();

				  var mins = d.getMinutes();

				  var secs = d.getSeconds();

				  mins = (mins < 10 ? "0" : "") + mins;

				  secs = (secs < 10 ? "0" : "") + secs;

				  var apm = (hrs < 12) ? "am" : "pm";

				  hrs = (hrs > 12) ? hrs - 12 : hrs;

				  hrs = (hrs == 0) ? 12 : hrs;

				  var ctime = hrs + ":" + mins + ":" + secs + " " + apm;

				  document.getElementById("clock").firstChild.nodeValue = ctime;

				}

				window.onload = function() {

				  digitalClock();

				  setInterval('digitalClock()', 1000);

				}

				</script>

				<div id="clock"> </div>



					

				</div>





				</body>

				</html>
