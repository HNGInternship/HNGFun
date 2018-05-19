<?php
	// Profile

	require "../../config.php";
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

	<?php
		if(!isset($_POST['chat'])){
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
				padding: 10px!important;
				padding-bottom: 2px!important;
				margin-bottom: 5px;
			}

			.user-text{
				width: 80%;
				background: #CEE7F1;
				border: 1px solid #CEE7F1;
				border-radius: 10px 3px 3px 10px;
				float: right;
				padding: 10px!important;
				padding-bottom: 2px!important;
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
					add_user_text(a);

					$output.animate({scrollTop: $output[0].scrollHeight}, 500);

					if(a == "aboutbot"){
						add_about_bot();
						$text_input.focus();
					}

					else{
						$.ajax({
							url: "./profiles/jane",
							type: "POST",
							data: {chat: a},
							success: function(data){
								// var result = $($.parseHTML(data)).find(".container").text();
								// console.log(data);
								if(data != ""){
									if (data.indexOf("::def") >= 0) {
										data = data.replace("::def","");
										add_bot_text(data);
										add_bot_default();
									}
									else{
										add_bot_text(data);
									}
									
								}					
							}
						});
					}
					

					$text_input.val("");
				}


				else{
					$text_input.focus();
				}
				
			});

			function add_user_text(user_text){
				var div = document.createElement("div");
				var p = document.createElement("p");

				div.classList.add("user-text");

				var inp = document.createTextNode(user_text);

				p.appendChild(inp);
				div.appendChild(p);

				$output.append(div);
			}

			function add_bot_text(bot_text){
				var div = document.createElement("div");
				var p = document.createElement("p");

				div.classList.add("bot-text");

				var inp = document.createTextNode(bot_text);

				p.appendChild(inp);
				div.appendChild(p);

				$output.append(div);
				$text_input.focus();
			}

			function add_bot_default(){
				var div = document.createElement("div");
				var p1 = document.createElement("p");
				var p2 = document.createElement("p");
				var p3 = document.createElement("p");
				var p4 = document.createElement("p");
				var p5 = document.createElement("p");
				var p6 = document.createElement("p");
				var span1 = document.createElement("span");
				var span2 = document.createElement("span");
				var span3 = document.createElement("span");
				var span4 = document.createElement("span");
				var span5 = document.createElement("span");
				var span5 = document.createElement("span");
				var span6 = document.createElement("span");

				div.classList.add("bot-text");
				span1.classList.add("bmi");
				span6.classList.add("bmi");
				span2.classList.add("languages");
				span4.classList.add("languages");

				var a = "Hi there! I'm jane...my friends call me dusty";
				var b = "I can calculate your Body Mass Index(BMI) if you simply enter your weight(in kg) and your height(in metres). Kindly follow the format:";
				var c1 = "bmi[weight,height]";
				var c2 = "";
				var c3 = "";
				var c4 = "";
				var c5 = "";
				var d = "";
				var e = "Also, you can train me to answer new questions in this format ";
				var f = "train: question # answer # password";
				var g = ". For example:";
				var h = "train: How are you today # Doing great # password";


				var p1text = document.createTextNode(a);
				var p2text = document.createTextNode(b);
				var span1text = document.createTextNode(c1);
				var span2text = document.createTextNode(c2);
				var span3text = document.createTextNode(c3);
				var span4text = document.createTextNode(c4);
				var span5text = document.createTextNode(c5);
				var p4text = document.createTextNode(d);
				var p5text = document.createTextNode(e);
				var p5text2 = document.createTextNode(g);
				var span5text = document.createTextNode(f);
				var span6text = document.createTextNode(h);

				span1.appendChild(span1text);
				span2.appendChild(span2text);
				span3.appendChild(span3text);
				span4.appendChild(span4text);
				span5.appendChild(span5text);

				span5.appendChild(span5text);
				span6.appendChild(span6text);

				p1.appendChild(p1text);
				p2.appendChild(p2text);
				p3.appendChild(span1);
				p3.appendChild(span2);
				p3.appendChild(span3);
				p3.appendChild(span4);
				p3.appendChild(span5);
				p4.appendChild(p4text);
				p5.appendChild(p5text);
				p5.appendChild(span5);
				p5.appendChild(p5text2);
				p6.appendChild(span6);

				div.appendChild(p1);
				div.appendChild(p2);
				div.appendChild(p3);
				div.appendChild(p4);
				div.appendChild(p5);
				div.appendChild(p6);

				$output.append(div);
				$text_input.focus();
			}

			function add_about_bot(){
				var div = document.createElement("div");
				var p1 = document.createElement("p");
				var p2 = document.createElement("p");

				div.classList.add("bot-text");

				var p1text = document.createTextNode("dusty v1.0");
				var p2text = document.createTextNode("I can calculate your Body-Mass-Index(BMI) if you provide me with your details");

				p1.appendChild(p1text);
				p2.appendChild(p2text);

				div.appendChild(p1);
				div.appendChild(p2);

				$output.append(div);
				$text_input.focus();
			}

			$text_input.keyup(function(event){
				if(event.keyCode == 13){
					$send_btn.click();
				}
			});

		});

	</script>

</html>

<?php
	}
	else{
		$a = $_POST['chat'];
			$question = $answer = $password = "";
			$wrong_password = ["You entered a wrong password",
								"Enter the right password to teach me new things",
								"You can try again with the right password"];

			$no_answer = ["Sorry, I'm not familiar with that question, could you teach it to me?",
							"Ouch, I really wish there was something I could do about that",
							"Right now, I can't answer that, but I could if you train me to",
							"I can't help you with that, if only you could teach me",
							"This is so embarrassing....and I thought I was the smart one"];

			$bmi_result = ["You are underweight\nLooks like you need to put on some extra weight",
							"You are within good range\nNice!! you're on track",
							"You are overweight\nLooks like you need a little work on your weight",
							"OMG!! You are obese\nYou need a complete transformation"];

			$train_success = "Training successful!";



			if (substr($a,0,7) == "train: ") {
				if(preg_match('/train: /', $a, $match)){
					$string = substr($a, 7, strlen($a)-7);
					$arr = explode("# ", $string);
					if(sizeof($arr) != 3){
						$answer = $no_answer[rand(0,3)]."::def";
						echo $answer;
						
					}
					else{
						$question = $arr[0];
						$answer = $arr[1];
						$password = $arr[2];

						if ($password == "password") {
							try {

								$sql = "INSERT INTO chatbot(question,answer) VALUES('$question','$answer')";
								$stmt = $conn->query($sql);
								
							} catch (PDOException $e) {
								echo $e->getMessage();
								
							}

							echo $train_success;
							
						}

						else{
							echo $wrong_password[rand(0,2)];
							
						}

					}


					
				}
			}
			else if (substr($a,0,4) == "bmi[" && substr($a,strlen($a)-1,1) == "]") {
				$array = explode('[', $a,2);
				$stmt = substr($array[1],0,strlen($array[1])-1);
				$array2 = explode(',', $stmt);
				$weight = $array2[0];
				$height = $array2[1];
				if(is_numeric($weight) && is_numeric($height)){
					$result = $weight/($height*$height);

					if ($result <= 18.5) {
						echo "Your BMI is ".round($result,3)."\n".$bmi_result[0];
					} 

					else if($result > 18.5 && $result <= 24.9){
						echo "Your BMI is ".round($result,3)."\n".$bmi_result[1];
					}

					else if ($result >= 25 && $result <= 29.9) {
						echo "Your BMI is ".round($result,3)."\n".$bmi_result[2];
					}

					else{
						echo "Your BMI is ".round($result,3)."\n".$bmi_result[3];
					}
				}
				else{
					echo "Enter a valid input";
				}
			}

			else{

				try {

					$sql = "SELECT * FROM chatbot WHERE question = '$a'";
					$stmt = $conn->query($sql);

					if($stmt){
						foreach($stmt as $row){
							$response[] = $row['answer'];
						}
						if(is_array($response)){
							$answer = $response[rand(0,sizeof($response))];
						}
						else{
							$answer = $response;
						}
					}
					
				} catch (PDOException $e) {
					echo $e->getMessage();
						
				}

				if($answer == ""){
					$answer = $no_answer[rand(0,4)]."::def";
				}
				echo $answer;
			}
		}
?>