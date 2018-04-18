<?php

//connecting to db manually

// require_once $_SERVER['DOCUMENT_ROOT'] . '/HNGFun' . '/config.php'; //tweak

// $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

// if ($mysqli->connect_errno) {
//    $name = "Alaba Mustapha O.";
//    $image_filename = 'https://res.cloudinary.com/alabamustapha/image/upload/v1523619685/me.jpg';
// }else{
	
// 	$sql = "SELECT * FROM `interns_data` WHERE username = 'alabamustapha' LIMIT 1";	
	
// 	$record = $mysqli->query($sql);
	
// 	$detail = $record->fetch_object();

// 	$name = $detail->name;

// 	$image_filename = $detail->image_filename;

// 	$sql = "SELECT * FROM `secret_word` LIMIT 1";	

// 	$record = $mysqli->query($sql);
	
// 	$secret_word = $record->fetch_object()->secret_word;
// }
// 


//using previous connction
	try{
	//get secret_word	
	$sql = 'SELECT * FROM secret_word';
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
	$secret_word = $data['secret_word'];
	
	//get my details		
	$sql = 'SELECT * FROM secret_word';
    $sql = "SELECT * FROM `interns_data` WHERE username = 'alabamustapha' LIMIT 1";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    
    $name = $data['name'];
	$image_filename = $data['image_filename'];
	}catch(PDOException $e){
		$secret_word = "sample_secret_word";
		$name = "Alaba Mustapha O.";
		$image_filename = 'https://res.cloudinary.com/alabamustapha/image/upload/v1523619685/me.jpg';
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>HNGInternship 4.0</title>
	<style type="text/css">
			
			body{
				background: url(https://res.cloudinary.com/alabamustapha/image/upload/v1523619362/bg.jpg) no-repeat;
				background-size: cover;
			}
			.profile-body{
				width: 100%;
				max-height: 500px;
				/*background: url(https://res.cloudinary.com/alabamustapha/image/upload/v1523619362/bg.jpg) no-repeat;*/
				background-size: cover;
				font-family: Roboto Condensed;
			}

			div.time-circle{
				display: block;
				width: 219px;
				height: 219px;
				border-radius: 50%;
				margin: 0 auto;
				/*background: url(https://res.cloudinary.com/alabamustapha/image/upload/v1523619685/me.jpg) no-repeat;*/

			}

			div.time{
				/*position: relative;*/
				font-style: normal;
				font-weight: bold;
				line-height: normal;
				font-size: 48px;
				color: #FFFFFF;
				padding-top: 75px;
				text-align: center;
			}

			h1.intro{
				text-align: center;
				font-style: normal;
				font-weight: bold;
				line-height: normal;
				font-size: 48px;
				color: #000000;
			}

			.main{
				 display: table;
				 padding-top: 30px;
				 box-sizing: border-box;
				 /*position: absolute;*/
				 height: 100%;
				 width: 100%;
			}

			.profile-container{
				display: table-cell;
  				vertical-align: middle;
			}
			.text-center{
				text-align: center;
			}

			/*chatbot styles */
			div#start-bot{
				position: fixed;
				bottom: 0;
				right: 0;
				z-index: 100;
			}
			div#chat-bot{
				min-width: 100%;
				min-height: 100%;
				position: fixed;
				background: #007bff;
				z-index: 10;
				top: 0;
				left: 0;
				opacity: .9;
				padding-top: 80px;
			}

			div#chat-bot-container{
				width: 400px;
				height: 500px;
				margin: 0 auto;
				position: relative;
				z-index: 15;
			}

			div#chat-bot-container  input.human_input{
				border: 0;
				border-bottom: 2px solid #fff;
				width: 100%;
				background: none;
			}

			div#chat-bot-container > .conversation {
				width: 100%;
				height: 100%;
				overflow-y: auto;
				overflow-x: hidden;
			}
			div#chat-bot-container > .conversation > .message {
				margin: 10px 0;
				min-height: 30px;
				color: white;
			}

			div#chat-bot-container > .conversation > .message {
				float: left;
				clear: both;
			}
			div#chat-bot-container > .conversation > .message > .message-content {
				color: #007bff;
				background-color: #fff;
				font-size: 18px;
				line-height: 1;
				padding: 7px 13px;
				border-radius: 15px;
				width: auto;
				max-width: 85%;
				display: inline-block;
			}

			div#chat-bot-container > .conversation > .message > .human{
				float: right;
			}

			.hide{
				visibility: hidden;
			}
	</style>
</head>
<body>
	<div class="profile-body">
		<section class="main">
			<div class="profile-container">
				
				<div class="time-circle" style="background-image: url(<?=$image_filename?>)">
					<div class="time">
						
					</div>
				</div>

				<h1 class="intro"><?=$name?> </h1>
				<h3 class="text-center">Being Kind is better than being right</h3>
			</div>	
		</section>
	</div>

	<div id="start-bot">
		<a id="start-chat-bot">
			<span class="fa-stack fa-lg">
			<i class="fa fa-circle fa-stack-2x"></i>
			<i class="fa fa-comments fa-stack-1x fa-inverse"></i>
			</span>
		</a>
	</div>
	<!-- <button id="start-bot" class="btn">
		let's chat	

	</button> -->
	<div id="chat-bot">
			<div id="chat-bot-container">
				
				<div class="conversation">

					
					<!-- <div class="message">
						<div class="message-content text">
							<span>Awesome! You can show buttons like the one you pressed.</span> 
						</div>
					</div>
				
					<div class="message">
						<div class="human message-content text">
							<span>Awesome! You can show buttons like the one you pressed.</span> 
						</div>
					</div> -->
					
				</div>
				<input type="text" class="human_input" name="human_input">		
				
			</div>
	</div>
	
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

	<script>
		$(document).ready(function() {
			

			var intro = makeMessage("I am Alabot, what is your name?");
			
			$("div#chat-bot").hide();
			
			$("a#start-chat-bot").click(function(e){
				$("div#chat-bot").toggle();
				
				if($("div.conversation > .message").length == 0){
					$("div.conversation").append(intro);
				}
			});

			function makeMessage(message){
				return "<div class='message'> <div class='message-content text'><span>" + message + "</span></div></div>";
			}
			


			
		});
	</script>
</body>
</html>