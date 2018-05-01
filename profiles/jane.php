<?php
	// Profile

	try {


		$sql = "SELECT * FROM interns_data WHERE username = 'jane' LIMIT 1";
		$stmt = $conn->query($sql);

		$sql2 = "SELECT secret_word FROM secret_word LIMIT 1";
		$stmt2 = $conn->query($sql2);

		foreach ($stmt as $row) {
			# code...
			$name = $row['name'];
			$username = $row['username'];
			$image_filename = $row['image_filename'];
		}

		foreach ($stmt2 as $row) {
			# code...
			$secret_word = $row['secret_word'];
		}

	} catch (PDOException $e) {
		echo $e->getMessage();
	}
?>
	
<!DOCTYPE HTML>
<html>
	<head>

		

		<title>
			HNG4.0 | Jane Arisah
		</title>

    	<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">

		<style>
			*{
				box-sizing: border-box;
				margin: 0px;
				padding: 0px;
			}

			body{
				background: #fff;
			}

			.container{
				/*height: 100vh;*/
				/*margin: 0px;
				padding: 0px;
				min-height: 800px;
				position: relative;*/
			}

			#whole{
				padding: 20px;
				margin: 0px;
				min-height: 500px;
			}

			#whole div:nth-child(2){
				padding: 0px;
				margin: 0px
			}


			#slide1{
				box-shadow: 1px 0px 10px 1px lightgrey;
				margin-top: 0px;
				/*margin-bottom: 30px;*/
				background: #fafafa;
				padding-left: auto;
				padding-right: auto;
				padding-bottom: 30px;
			}

			#imgbox{
				display: block;
				margin-top: 50px;
				width: 150px;
				height: 150px;
				overflow: hidden;
				margin-right: auto;
				margin-left: auto;
				text-align: center;
				border-radius: 50%;
				padding-bottom: 20px;
			}

			#imgbox img{
				image-orientation: from-image;
			}

			@media (min-width:768px){

				#slide1{
					box-shadow: 1px 0px 10px 1px lightgrey;
					margin-top: 30px;
					margin-bottom: 30px;
					background: #fafafa;
					padding-left: auto;
					padding-right: auto;
				}

				#imgbox{
					display: block;
					margin-top: 100px;
					width: 150px;
					height: 150px;
					overflow: hidden;
					margin-right: auto;
					margin-left: auto;
					text-align: center;
					border-radius: 50%;
					padding-bottom: 20px;
				}

			}

			#namebox{
				padding: 15px;
				color: #01506A;
				text-align: center;
				font-size: 14px;
				font-weight: bold;
				font-family: 'Tahoma';
			}

			#titlebox{
				color: #066A8B;
				text-align: center;
				font-size: 16px;
				padding-bottom: 20px;
			}

			#slide2{
				box-shadow: 0px 3px 10px 5px lightgrey;
				background: #027DFF;
				min-height: 500px;
				/*height: 80vh;*/
				color: #eee;
				padding: 25px 30px;
			}

			#skills{
				padding: 25px;
			}

			#skills li{
				list-style:none;
				padding-bottom: 10px;
			}

			#skills div:first-child{
				padding-bottom: 10px;
				color: #A4C6C4;
				font-size: 14px;
				font-weight: bold;
				text-align: left;
				font-family: 'Trebuchet MS';
			}

			#skills div:nth-child(2){
				font-family: 'Arial';
			}

			#skills div:last-child{
				margin-top: 40px;
				font-family: 'Helvetica';
			}

			#connect{
				padding-top: 10px;
				padding-bottom: 10px;
				margin-left: auto;
				margin-right: auto;
				display: block;
				text-align: center;
			}

			#connect a i{
				font-size: 35px;
				color: #01506A;
				transition: color 300ms;
				margin-right: 15px;
			}

			#connect a:first-child i:hover{
				color: #5576BD;
				transition: color 300ms;
			}

			#connect a:nth-child(2) i:hover{
				color: #1DA1F2;
				transition: color 300ms;
			}

			#connect a:last-child i:hover{
				color: #333;
				transition: color 300ms;
			}

			#bot{
				z-index: 1000;
				position: fixed;
				bottom: 0px;
				right: 0px;
				padding: 10px 70px 23px;
			}

			button:hover{
				cursor: pointer;
			}

			#bot button{
				background: #027DFF;
				border: none;
				outline: none;
				padding: 10px 20px;
				color: white;
				border-radius: 3px;
				box-shadow: 0px 0px 3px 2px #ddd;
				transition: background 200ms, color 500ms;
			}

			#bot button:hover{
				background: white;
				color: #027DFF;
				transition: background 300ms, color 500ms;
			}


			#user-input,
			#output{
				background: white;
				padding: 10px;
				display: none;
			}

			#output{
				height: 350px;
				overflow-y: auto;
				color: #555;
			}

			#bot-header{
				border-bottom: 3px solid #027DFF;
				color: white;
				background: #50A2FA;
				padding: 10px;
				display: none;
				width: 100%;
			}

			#bot-header span:last-child i{
				position: relative;
				float: right;
				right: 10px;
				color: white;
				box-shadow: none;
				padding: 5px 8px;
				transition: color 200ms;
			}

			#bot-header span:last-child i:hover{
				cursor: pointer;
				color: #033367;
				transition: color 200ms;
			}

			#user-input{
				width: 100%;
				float: right;
			}

			#user-input>form>div:first-child{
				width: 80%;
				float: left;
			}

			#user-input>form>div:last-child{
				width: 20%;
				float: left;
			}

			#user-input input{
				width: 100%;
				padding: 8px 7px;
			}

			#user-input button{
				float: right;
			}

			#chat-btn{
				float: right;
				width: 100%;
			}

			#chat-btn button{
				float: right;
			}

			.bot-text{
				width: 80%;
				background: #FFF1FD;
				border: 1px solid #FFF1FD;
				border-radius: 3px 10px 10px 3px;
				float: left;
				padding: 10px;
				padding-bottom: 2px;
				margin-bottom: 5px;
			}

			.user-text{
				width: 80%;
				background: #CEE7F1;
				border: 1px solid #CEE7F1;
				border-radius: 10px 3px 3px 10px;
				float: right;
				padding: 10px;
				padding-bottom: 2px;
				margin-top: 15px;
				margin-bottom: 20px;
			}

			.bmi{
				color: red;
				font-family: 'Courier New';
				font-size: 13px;
				text-shadow:0px 0px 2px #FB8DC4;
				margin-bottom: 20px;
			}

		</style>

	</head>

	<body>


		<!-- <div class="container"> -->
			<div id="whole">
				<div class="row">
					<div class="hidden-xs col-md-2"></div>

					<div class="col-sm-2 col-md-8">
						<div class="row">
							<div class="col-xs-12 col-sm-5" id="slide1">
								<div id="imgbox" class="col-xs-12">
									<img src='<?php echo $image_filename; ?>' alt="dustyJay" width="150px" height="auto">
								</div>

								<div class="col-xs-12" id="namebox"><?php echo strtoupper($name); ?></div>

								<div class="col-xs-12" id="titlebox">Web Designer | Web Developer</div>

								<div id="connect" class="col-xs-12">
									<a href="https://web.facebook.com/profile.php?id=100009067766863"><i class="fa fa-facebook"></i></a>
									<a href="https://twitter.com/JayArisah"><i class="fa fa-twitter"></i></a>
									<a href="https://github.com/dustyjay"><i class="fa fa-github"></i></a>
								</div>
							</div>
							<div class="col-xs-12 col-sm-7" id="slide2">
								<div id="skills" class="col-xs-12">
									<div>SKILLS</div>
									<div>
										<li>HTML + CSS + Bootstrap</li>
										<li>JavaScript + jQuery</li>
										<li>PHP</li>
										<li>MySQL</li>
										<li>Python</li>
									</div>
									<div>connect with me to build your web projects</div>
								</div>
							</div>
						</div>
					</div>
					<div class="hidden-xs col-md-2"></div>
				</div>

				</div>

				<div>
					<div class="col-xs-6 col-sm-4 col-md-7"></div>
					<div id="bot" class="col-xs-6 col-sm-8 col-md-5">
						<div class="row">
							<div id="bot-header" class="col-xs-12">
								<span>HNG CHAT BOT</span>
								<span><i class="fa fa-close"></i></span>
							</div>

							<div id="output" class="col-xs-12"></div>

							<div id="user-input" class="col-xs-12">
								<form action="" method="post" onsubmit="return false">
									<div id="text-input">
										<input name="user_text" type="text">
									</div>
									<div id="send">
										<button name="submit">send</button>
									</div>
								</form>
							</div>

							<div id="chat-btn" class="col-xs-12">
								<button type="button">CHAT BOT</button>
							</div>
						</div>
					</div>
				</div>
				
			<!-- </div> -->
			
	</body>

	<script type="text/javascript" src="../vendor/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		
		$(function(){
			$bot = $("#bot");
			$user_input = $("#user-input");
			$output = $("#output");
			$bot_header = $("#bot-header");
			$chat_btn = $("#chat-btn button");
			$text_input = $("#text-input input");
			$send_btn = $("#send button");

			chatbot_margin = $(document).height() + "px";
			$bot.css("margin-top",chatbot_margin);


			$("#bot-header i").click(function(){
				$user_input.hide();
				$output.hide();
				$bot_header.hide();
				$chat_btn.show();
			});


			$chat_btn.click(function(){
				$user_input.show();
				$output.show();
				$bot_header.show();
				$(this).hide();

				$text_input.focus();
				add_bot_default();
			});

			$send_btn.click(function(){
				var a = $text_input.val();
				if(a != ""){
					alert(a);
					text_input.val("");
					text_input.focus();
				}
			});



			$text_input.keyup(function(event){
				if(event.keyCode == 13){
					$send_btn.click();
				}
			});

		});

	</script>

</html>