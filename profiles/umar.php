<?php
	if(!defined('DB_USER')){
		require_once __DIR__."/../../config.php";
		//require_once __DIR__."/../config.php";    
		try {
			$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		} catch (PDOException $pe) {
			die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
		}
	}

	$username = "umar";
	$sql = "SELECT `name`, `username`, `image_filename` FROM `interns_data` WHERE `username`='$username'";
	$sql0 = "SELECT * FROM `secret_word` LIMIT 1";
	$stmt0 = $conn->prepare($sql0);
	$stmt0->execute();
	$data = $stmt0->fetch(PDO::FETCH_ASSOC);
	$secret_word = $data['secret_word'];
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	if($_SERVER['REQUEST_METHOD'] === "POST"){
		$quest = $_POST['question'];
		$quest_low = strtolower($quest);
		$training_mode = stripos($quest_low, "train:");
		$menu_mode = stripos($quest_low, "menu");
		$crypto_mode = stripos($quest_low, "crypto:");

		if ($training_mode !== false) {
			$trtext = explode("#", $quest_low);
			$tempquestion = explode(":", $trtext[0]);
			$mquestion = trim($tempquestion[1]);
			$answer = trim($trtext[1]);
			try{
				$sql = "INSERT INTO chatbot (question, answer) values (:question, :answer)";
				$init = $conn->prepare($sql);
				$init->bindParam(':question', $mquestion);
				$init->bindParam(':answer', $answer);
				$init->execute();
				$init->setFetchMode(PDO::FETCH_ASSOC);
				if ($init) {
					echo json_encode(['status' => 1, 'reply' => 'Training Successful']);
					die();
				}
			} catch(PDOException $e){
				throw $e;
			}
		}elseif($crypto_mode !== false){
			$temp = explode(":", $quest_low);
			$ticker = trim($temp[1]);
			$price = getCryptoPrice($ticker);
			if (strcasecmp($price, "No value") == 0) {
				echo json_encode(['status' => 1, 'reply' => 'Wrong ticker, check again.']);
				die();
			}else{
				echo json_encode(['status' => 1, 'reply' => 'The price of '.$ticker.' is '.number_format($price, 2).' in dollars and '.number_format(($price*360)).' in naira.']);
				die();
			}
		}elseif (strcasecmp($quest_low, "what is your name?") == 0){
			echo json_encode(['status' => 1, 'reply' => 'My name is Umar']);
			die();
		}elseif($menu_mode !== false ){
			$menu = bot_menu();
			echo json_encode(['status' => 1, 'reply' => $menu]);
			die();
		}else{
			$quest_lowe = "%$quest_low%";
			try{
				$sql = "SELECT * FROM chatbot WHERE question LIKE :question";
				$init = $conn->prepare($sql);
				$init->bindParam(':question', $quest_lowe);
				$init->execute();
				$init->setFetchMode(PDO::FETCH_ASSOC);
				$dats = $init->fetchAll();
				if ($dats) {
					$dats_count = count($dats);
					if ($dats_count >= 1) {
						$random = rand(0, $dats_count-1);
						$data = $dats[$random];
						$answer = $data['answer'];
						if (strcasecmp($quest_low, "what is the time") == 0 || strcasecmp($quest_low, "time") == 0) {
							$time = get_time();
							//$cansa = str_replace("((time))", $time, $answer);
							$cansa = $str = preg_replace('/[[{(].*[]})]/U' , $time, $answer);
							echo json_encode(['status' => 1, 'reply' => $cansa]);
							die();
						}else{
							echo json_encode(['status' => 1, 'reply' => $answer]);
							die();
						}
					}
				}else {
					echo json_encode(['status' => 1, 'reply' => "Sorry, I don't have a suitable response."]);
					die();
				}
			}catch(PDOException $e){
				throw $e;
			}
		}
	}

	########DEFINING MY OWN FXNs HERE##################
	function bot_menu(){
		return  "Send <b>'time'</b> to get the time. \n
		  Send <b>'about'</b> to know my version number. \n
		  Send <b>'help'</b> or <b>'menu'</b> to see this again. \n
		  To train me, send in this format => \n
		  'train:question#answer' \n
		  To get price for any cryptocurrency, send in this format \n
		  <b>crypto:'cryptoname'</b>\n
		  To clear the chat logs, just type <b>'cls'</b> or <b>'clear'</b>";
	  }
	function getCryptoPrice($ticker){
		$url = "https://api.coinmarketcap.com/v1/ticker/".$ticker."/";
		$response = @file_get_contents($url); //the '@' is to surpress any errors if need be
		if (false === $response) {
			return "No value";
		}
		$resp = json_decode($response, true);
		$result = $resp[0]["price_usd"];
		return $result;
	}

	function get_time(){
		//instantiate date-time object
		$datetime = new DateTime();
		//set the timezone to Africa/Lagos
		$datetime->setTimezone(new DateTimeZone('Africa/lagos'));
		//format the time
		return $datetime->format('h:i A');
	  }

	#############################END################################
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Tajawal" rel="stylesheet">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>HNG Fun || <?php echo $result['name']; ?></title>
		<style>
			body{
				padding-top: 90px;
				font-family: 'Tajawal', sans-serif;
			}
			.card {
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
				max-width: 300px;
				/*margin: auto; */
				text-align: center;
				float: left;
			}
			
			.card1 {
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
				max-width: 300px;
				/*margin: auto; */
				float: right;
			}
			
			#wcontainer{
				max-width: 620px;
    			margin: auto;
				height: 550px;
			}
			
			.title {
				color: grey;
				font-size: 18px;
			}
			button {
				border: none;
				outline: 0;
				display: inline-block;
				padding: 8px;
				color: white;
				background-color: #000;
				text-align: center;
				cursor: pointer;
				width: 100%;
				font-size: 18px;
			}
			a {
				text-decoration: none;
				font-size: 22px;
				color: black;
			}
			button:hover, a:hover {
				opacity: 0.7;
			}
			
			#chatlogs{
				padding: 10px;
				height: 400px;
				overflow-y: scroll;
			}
			
			.bot{
				color: indianred;
			}
			
			#input{
				width: 100%;
				padding: 10px 10px;
    			margin: 5px 0;
    			box-sizing: border-box;
			}
			
			.user{
				color: green;
			}
		</style>
	</head>
	
	<body>
		<div id="wcontainer">
			<div class="card">
				<img src="<?php echo $result['image_filename']; ?>" alt="Umar" style="width:100%">
				<h1><?php echo $result['name']; ?></h1>
				<p class="title">Slack: @<?php echo $result['username'] ?></p>
				<p><button>Contact</button></p>
			</div>
			<div class="card1">
				<div id="chatlogs">
					<p><span class="bot">Umar: </span>Hello, how may i help you?</p>
				</div>

				<div id="chatform">
					<form id="form" class="qform">
						<input id="input" type="text" placeholder="Type 'menu' to start" >
						<button id="send" type="submit">SEND</button>
					</form>
				</div>
			</div>
		</div>
		
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script>
			$(function(){
				$('#form').submit(function(e){
					e.preventDefault();
					var holdiv = document.getElementById('chatlogs');
					var quest = $('#input').val().trim();
					$('#input').val("");
					if(0 !== quest.length){
						var inp = document.createElement('p');
						inp.innerHTML = "<span class='user'>You: </span>"+ quest + "";
						holdiv.appendChild(inp);
						$('#chatlogs').scrollTop($('#chatlogs')[0].scrollHeight);
						//to check if it includes about bot
						if(quest.toLowerCase().includes("about") || quest.toLowerCase().includes("aboutbot")){
							var inpi = document.createElement('p');
							inpi.innerHTML = "<span class='bot'>Umar: </span> This is v1.8.0";
							holdiv.appendChild(inpi);
							$('#chatlogs').scrollTop($('#chatlogs')[0].scrollHeight);
						}else if(quest.toLowerCase().includes("cls") || quest.toLowerCase().includes("clear")){
							while(holdiv.firstChild){
								holdiv.removeChild(holdiv.firstChild);
							}
							var inpi = document.createElement('p');
							inpi.innerHTML = "<span class='bot'>Umar: </span> Hello, how may i help you?";
							holdiv.appendChild(inpi);
						}else{
							$.ajax({
								//url: "./umar.php",
								url: "/profiles/umar.php",
								type: "POST",
								data: {question: quest},
								success: function(resp){
									var response = jQuery.parseJSON(resp);
									//console.log(response.reply);
									if(response.status == 1){
										var inpi = document.createElement('p');
										inpi.innerHTML = "<span class='bot'>Umar: </span>" + response.reply + "";
										holdiv.appendChild(inpi);
										$('#chatlogs').scrollTop($('#chatlogs')[0].scrollHeight);
									}
								},
								error: function(error){
									console.log(error);
									var inpi = document.createElement('p');
									inpi.innerHTML = "<span class='bot'>Umar: </span> Unexpected Error Occured";
									holdiv.appendChild(inpi);
									$('#chatlogs').scrollTop($('#chatlogs')[0].scrollHeight);
								}
							});
						}
					}else {
						var inp = document.createElement('p');
						inp.innerHTML = "<span class='bot'>Umar: </span> No content";
						holdiv.appendChild(inp);
						$('#chatlogs').scrollTop($('#chatlogs')[0].scrollHeight);
					}
				});
			});
		</script>
	</body>
</html>