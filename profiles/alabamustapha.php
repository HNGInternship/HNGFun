<?php
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
// include_once realpath(__DIR__ . '/..') . "/answers.php";
=======
//require_once $_SERVER['DOCUMENT_ROOT'] . '/HNGFun' . '/answers.php'; //tweak

>>>>>>> 564343188b1bcbdcbaf94a02a1cf3e627069bb51
=======
//require_once $_SERVER['DOCUMENT_ROOT'] . '/HNGFun' . '/answers.php'; //tweak
>>>>>>> bd2f0bd6ed0524d8ebad0192685f46723fe7657b
=======
//require_once $_SERVER['DOCUMENT_ROOT'] . '/HNGFun' . '/answers.php'; //tweak
>>>>>>> fd9b122a5b6f212003a947cab91714cde2dd93da
if (!defined('DB_USER')) {
	require "../../config.php";
	try {
		$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
	} catch (PDOException $pe) {
		die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
	}
}

<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 564343188b1bcbdcbaf94a02a1cf3e627069bb51
=======
>>>>>>> bd2f0bd6ed0524d8ebad0192685f46723fe7657b
=======
>>>>>>> fd9b122a5b6f212003a947cab91714cde2dd93da
global $conn;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

	try {
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

	} catch (PDOException $e) {
		
		$secret_word = "sample_secret_word";
		$name = "Alaba Mustapha O.";
		$image_filename = 'https://res.cloudinary.com/alabamustapha/image/upload/v1523619685/me.jpg';
	}


}else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	

	$data = getAction($_POST);

	echo $data;
	exit();
		// return;

}

// $data = getAction(['stage' => 2, 'human_response' => 'hi']);

// var_dump($data);

// die;
	
	


	function getAction($input){
		$data = [];
		
		switch ($input['stage']){
			case 0: //bot intro
				$data = greet();
				break;
			case 1: //welcome user
				$data = intro($input['human_response']);	
				break;
			case 2: // chat or train
				$data = chat_or_train($input['human_response']);
				break;
		}

		return json_encode($data);
	}

function alabotGetMenu()
{
	return '1. enter menu to show this help <br>
            2. Find synonyms E.g: Synonyms of love? <br>
            3. train me e.g: train synonyms of goat # goatie,goater,etc # passkey. <br>
            3. clear screen: cls. <br>
            4. exit bot: exit. <br>
           ';
}

	function train($human_response){
		$human_response = prepare_input($human_response);
		$parts = explode('#', $human_response);
		if(count($parts) !== 3){
			$data = ["data" => "In correct train syntax", "stage" => 2];	
			return $data;
		}
		$password = array_pop($parts);
		$part_one = trim($parts[0]);
		$part_one_split = explode(' ', $part_one);
		$word = array_pop($part_one_split);
		$word = trim($word);
		$word = str_replace('?', '', $word);
		$answer = trim(str_replace(' ', '', $parts[1]));
		if(strcmp(trim($password), 'password') !== 0 ){
			$data = ["data" => "You don't have the pass key", "stage" => 2];
		}else if (strpos($human_response, 'synonym') !== false) {
			$data = setSynonyms($word, $answer);
		} else {
			$data = ["data" => "Just a bot, still learning :-)", "stage" => 2];
		}

		
		return $data;
	}


	function setQuiz(){

	}

	function chat($human_response){
		
		$data = [];
		$human_response = prepare_input($human_response);
		
		$human_response_words = explode(' ', $human_response);
		if(strcmp(strtolower(trim($human_response)), 'menu') == 0){
			$data = ["data" => alabotGetMenu(), "stage" => 2];	
		}elseif (strpos($human_response, 'synonym') !== false && count($human_response_words) > 1) {
			$data = getSynonyms($human_response);
		} else {
			
		$data = getGeneral($human_response);
		}

		return $data;
	}


	function getSynonyms($human_response){
		global $conn;
		$human_response_words = explode(' ', $human_response);
		$word = array_pop($human_response_words);
		$db_word = 'alabot_synonyms_' . $word;
		$sql = "SELECT * FROM chatbot WHERE question like '{$db_word}%' LIMIT 1";
		$q = $conn->query($sql);
		$q->setFetchMode(PDO::FETCH_ASSOC);
		$data = $q->fetch();
		if(is_null($data) || !isset($data) || $data == null){
			$data = "I have not learn the word: " . $word . ' You can help others by adding it.';
		}else{
			$data = $data['answer'];
		}
		return ["data" => $data, "stage" => 2];
	}

	function setSynonyms($word, $answer){
		global $conn;
		$db_word = 'alabot_synonyms_' . $word;
		$sql = "SELECT * FROM chatbot WHERE question = '{$db_word}' LIMIT 1";
		$q = $conn->query($sql);
		$q->setFetchMode(PDO::FETCH_ASSOC);
		$data = $q->fetch();
		if (is_null($data) || !isset($data) || $data == null) {

			$sql = 'INSERT INTO chatbot (question, answer) VALUES (:question, :answer)';
			
			try {
				$query = $conn->prepare($sql);
				
				if ($query->execute([':question' => $db_word, ':answer' => $answer]) == true) {
					$data = ['Great! thank you so much for teaching that'];
				};

			} catch (PDOException $e) {
				$data = "Something went wrong, please try again";
			}

		} else {
			$data = "Synonyns of " . $word . ' already learnt: ' . $data['answer'];
		}

		return ["data" => $data, "stage" => 2];
	}
	
	function getAntonyms(){

	}
	
	function getMeaning(){

	}
	
	function setSpellingQuiz(){

	}

	function chat_or_train($human_response){

		$human_response_words = explode(' ', $human_response);
		if (strpos(trim($human_response_words[0]), 'train') !== false && count($human_response_words) > 4) {
			return train($human_response);
		}else{
			return chat($human_response);
		}

	}

	function prepare_input($input){
		return strtolower($input);	
	}




	function getGeneral($human_response){
		global $conn;
		$word = trim($human_response);
		$sql = "SELECT * FROM chatbot WHERE question = '{$word}'";
		$q = $conn->query($sql);
		$q->setFetchMode(PDO::FETCH_ASSOC);
		$data_res = $q->fetchAll();
		if (count($data_res) > 0) {
			
			$index = rand(0, count($data_res) - 1);
			$data = $data_res[$index]['answer'];

		}else{
			$data = "Just a bot, still learning :-)";
		}

		return ["data" => $data, "stage" => 2];
	}

	

	function greet(){
		$greetings = [
<<<<<<< HEAD
<<<<<<< HEAD
						'Hi, I am Alabot, Learn, play and take quiz?',
		'Howdy, I am Alabot, Learn, play and take quiz?',
		'I am Alabot, Learn, play and take quiz'
=======
						'Hi, I am Alabot, Learn, play and take quiz. type menu to check commands',
		'Howdy, I am Alabot, Learn, play and take quiz. type menu to check commands',
		'I am Alabot, Learn, play and take quiz. type menu to check commands'
>>>>>>> bd2f0bd6ed0524d8ebad0192685f46723fe7657b
=======
						'Hi, I am Alabot, Learn, play and take quiz. type menu to check commands',
		'Howdy, I am Alabot, Learn, play and take quiz. type menu to check commands',
		'I am Alabot, Learn, play and take quiz. type menu to check commands'
>>>>>>> fd9b122a5b6f212003a947cab91714cde2dd93da
					];

		return ["data" => $greetings[array_rand($greetings)], "stage" => 2];
	}
	
	function intro($name){
		$data = "Welcome " . $name . " You can learn, play or train me to be better Check the menu for guide";
		return ["data" => $data, "stage" => 2];
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
				width: 100%;
			}
			
			div#chat-bot-container > .conversation > .message > .bot-message {
				clear: both;
				float: left;
			}
			
			div#chat-bot-container > .conversation > .message > .human-message {
				float: right;
				clear: both;
			}

			div#chat-bot-container > .conversation > .message > .message-content {
				color: #3908fc;
				background-color: #fff;
				font-size: 16px;
				line-height: 1.2;
				padding: 7px 13px;
				border-radius: 15px;
				width: auto;
				max-width: 85%;
				display: inline-block;
				letter-spacing: 1px;
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
				<h3 class="text-center">Being Kind is better than being right.</h3>
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
	

	<div id="chat-bot">
			<div id="chat-bot-container">
				
				<div class="conversation">

					
					<!-- <div class="message">
						<div class="bot-message message-content text">
							<span>Awesome! You can hdhd .</span> 
						</div>
					</div>
				
					<div class="message">
						<div class="human-message message-content text">
							<span>Awesome! You.</span> 
						</div>
					</div> -->
					
					
				</div>
				<input type="text" class="human_input" name="human_input">		
					
				
			</div>
	</div>
	
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src='https://code.responsivevoice.org/responsivevoice.js'></script>

	<script>
		$(document).ready(function() {

			// Perform other work here ...
			let stage = 0;
			var visitor = '';
			var done_intro = 0;
			let url = "profiles/alabamustapha.php";
			

			$("div#chat-bot").hide();
			
			$("a#start-chat-bot").click(function(e){
				
				$("div#chat-bot").toggle();
				
				stage = 0;

				doIntro();

				$(".human_input").on('keyup', function (e) {
					if (e.keyCode == 13) {
						
						if($("input.human_input").val().trim().length < 1){
							// $("div.conversation").append(makeMessage("Please provide an input"));
						}else if($("input.human_input").val() == "cls"){
							$("div.conversation").html('');
							$("div.conversation").append(makeMessage("Clean slate, Check menu if needed"));
							$('input.human_input').val('');
						}else if($("input.human_input").val() == "exit"){
							$("div.conversation").html('');
							$('input.human_input').val('');
							stage = 0;
							$("div#chat-bot").hide();	
						}else{

							human_response = $("input.human_input").val().trim();
							$("div.conversation").append(makeHumanMessage(human_response));
							$('input.human_input').val('');

							$.post(url, {human_response: human_response, stage: stage})
							.done(function(response) {
								// console.log(response);
								response = jQuery.parseJSON(response);
								if(stage == 1){
									$("div.conversation").append(makeMessage(response.data));
								}else if(stage == 2){
									if(Array.isArray(response.data)){
										$("div.conversation").append(makeMessage(response.data));
									}else{
										$("div.conversation").append(makeMessage(response.data));
									}
									
								}
								stage = response.stage;	
							}).fail(function() {
								alert( "error" );
							})

						}	
					}
				});

			});

		

			function makeMessage(message){
				return "<div class='message'> <div class='bot-message message-content text'><span>" + message + "</span></div></div>";
			}
			
			function makeHumanMessage(message){
				return "<div class='pull-right message'><div class='human-message message-content text'><span>" + message + "</span></div></div>";
			}

			function doIntro(human_input){
					$.post(url, {human_response: human_input, stage: stage})
						.done(function(response) {
							$("div.conversation").html('');
							response = jQuery.parseJSON(response);
							stage = response.stage;
							$("div.conversation").append(makeMessage(response.data));
							responsiveVoice.speak(response.data);
						}).fail(function() {
							alert("error");
						})


			}

			
			function visitorIsTyping(){
				$(".human_input").on('keyup', function (e) {
					return true;
				});
			}
		
			
		});
	</script>
</body>
</html>