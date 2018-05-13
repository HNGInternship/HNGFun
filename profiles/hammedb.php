<?php

if (!defined('DB_USER')) {
	require "../config.php";
	try {
		$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
	} catch (PDOException $pe) {
		die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
	}
}
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
		$sql = "SELECT * FROM `interns_data` WHERE username = 'hammedb' LIMIT 1";
		$q = $conn->query($sql);
		$q->setFetchMode(PDO::FETCH_ASSOC);
		$data = $q->fetch();

		$name = $data['name'];
		$image_filename = $data['image_filename'];

	} catch (PDOException $e) {

		$secret_word = "sample_secret_word";
		$name = "Hammed Busirah Olaitan";
		$image_filename = 'http://res.cloudinary.com/hammedb/image/upload/v1523977229/PicsArt_02-08-02.22.04guuj.jpg';
	}


} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$response = getAction($_POST);

	echo $response;

	exit();


}


//bot

function getAction($input)
{
	$data = [];

	switch ($input['stage']) {
		case 0: //bot intro
			$data = greet();
			break;
		case 1: // chat or train

			$human_response = preg_replace('([\s]+)', ' ', trim($input['human_response']));
			$data = chat_or_train($human_response);
			break;
	}

	return json_encode($data);
}







function RaniMenu()
{
	return '1. enter menu to show this help <br>
            2. clear screen: clear. <br>
            3. exit bot: exit. <br>
            4. To know more about me:aboutbot.<br>';
}

function train($human_response)
{

	$human_response = trim($human_response);

	if (!is_valid_training_format($human_response)) {
		$data = ["data" => "In correct train syntax", "stage" => 1];
	} else {

		$inputs = get_question_answer_password($human_response);
		if (strcmp($inputs['password'], 'password') !== 0) {
			$data = ["data" => "You don't have the pass key", "stage" => 2];
		} else {

			$data = set_question($inputs['question'], $inputs['answer']);
		}
	}

	return $data;
}


function chat($human_response)
{

	$data = [];

	if (strcmp(strtolower(trim($human_response)), 'menu') == 0) {
		$data = ["data" => RaniMenu(), "stage" => 2];
	} elseif (strcmp(strtolower(trim($human_response)), 'aboutbot') == 0) {
		$data = ['data' => 'Hello I am Rani', 'stage' => 1];
	} else {
		$data = get_answer($human_response);
	}

	return $data;
}


function chat_or_train($human_response)
{


	if (strpos(trim($human_response), 'train') !== false && strpos(trim($human_response), ':') !== false) {
		return train($human_response);
	} else {

		return chat($human_response);
	}

}

function get_answer($human_response)
{
	global $conn;

	$question = prepare_question_chat($human_response);

	$sql = "SELECT * FROM chatbot WHERE question = '{$question}' or question = '{$question}?'";
	$q = $conn->query($sql);
	$q->setFetchMode(PDO::FETCH_ASSOC);
	$results = $q->fetchAll();

	if (count($results) > 0) {
		$data = $results[rand(0, count($results) - 1)]['answer'];
	} else {
		$data = "So sorry but i don't understand your message.<br> But you could teach me.<br> To teach me use the format below train:your question #answer:your answer #password";
	}

	return ["data" => $data, "stage" => 1];
}

function set_question($question, $answer)
{
	global $conn;

	$sql = "SELECT * FROM chatbot WHERE question = '{$question}'";

	$q = $conn->query($sql);
	$q->setFetchMode(PDO::FETCH_ASSOC);
	$results = $q->fetchAll();

	if (count($results) > 0) {

		$sql = 'INSERT INTO chatbot (question, answer) VALUES (:question, :answer)';

		try {
			$query = $conn->prepare($sql);

			if ($query->execute([':question' => $question, ':answer' => $answer]) == true) {
				$data = 'Cool, I have learnt a new answer to that question. thanks';
			};

		} catch (PDOException $e) {
			$data = "Something went wrong, please try again";
		}

	} else {

		$sql = 'INSERT INTO chatbot (question, answer) VALUES (:question, :answer)';

		try {
			$query = $conn->prepare($sql);

			if ($query->execute([':question' => $question, ':answer' => $answer]) == true) {
				$data = 'Cool, I have learnt a new question. thanks';
			};

		} catch (PDOException $e) {
			$data = "Something went wrong, please try again";
		}
	}
	return ["data" => $data, "stage" => 1];
}

function greet()
{
	$greetings = [
		'Hi, I am Rani, type menu to check commands.<br>
		To teach me use the format below train: your question # your answer # password'
	];

	return ["data" => $greetings[array_rand($greetings)], "stage" => 1];
}

function prepare_question_train($question)
{

	$question = trim($question);
	$question = preg_replace('([\s]+)', ' ', $question);
	return $question;
}


function prepare_question_chat($human_response)
{
	$human_response = trim($human_response);
	$question = str_replace('?', '', $human_response);
	$question = preg_replace('([\s]+)', ' ', $question);
	return $question;
}

function is_valid_training_format($human_response)
{

	$human_response = trim($human_response);

	$input_parts = explode('#', $human_response);

	return count($input_parts) === 3;
}

function get_question_answer_password($human_response)
{

	$parts = explode('#', trim($human_response));

	$password = array_pop($parts);
	$password = trim($password);


	$question_part = trim($parts[0]);

	$question_part_split = explode(':', $question_part);

	array_shift($question_part_split);

	$question = array_shift($question_part_split);

	$answer = trim($parts[1]);

	return ['question' => trim($question), 'answer' => $answer, 'password' => $password];
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>HNGInternship 4.0</title>
	<link rel="stylesheet" href="https://static.oracle.com/cdn/jet/v4.2.0/default/css/alta/oj-alta-min.css">
	<style type="text/css">
		.fb{color: #3b5998;}
	.tw{color: #1da1f2;}
	.git{color: #333333;}
	.ln{color: #0077b5}
	/*img{
		border-radius: 10%;
		border-style: groove;
		border-color: #fefefe;
		height: 40em;
		width: 20px;
	}
	*/
	img{
		height: 15em;
		width: 15em;
		border: 2px groove #fefefe;
		border-radius: 100%;
	}

	div#start-bot{
		position: fixed;
		bottom: 0;
		right: 0;
		z-index: 100;
		color: black;
	}
	div#chat-bot{
		min-width: 30%;
		min-height: 90%;
		position: fixed;
		background: #D8D8D8;
		z-index: 10;
		top: 20px;
		right: 0;
		opacity: 1;
		padding-bottom: 20px;
		/*margin-left: 400px;*/
		align-self: center;
	}
	div#chat-bot-container{
		width: 90%;
		height: 500px;
		margin: 0 auto;
		position: relative;
		z-index: 100;
		margin-bottom: 20px;
	}


			
	div#chat-bot-container  input.human_input{
		border: 0;
		border-bottom: 2px solid #fff;
		width: 100%;
		background: white;
		color: black;

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
		color: black;
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


	<div role="main" class="oj-web-applayout-max-width oj-web-applayout-content">

		<div id="avatar-container" class="demo-flex-display oj-flex-items-pad">
				<div id="avater-container" class="oj-flex oj-sm-align-items-center oj-sm-margin-2x oj-sm-justify-content-space-around">
					<!-- <div class="of-flex-item time-circle" style="background-image: url(http://res.cloudinary.com/hammedb/image/upload/v1523977229/PicsArt_02-08-02.22.04guuj.jpg)">
					</div> -->
					<img role="img" class="of-flex-item time-circle" src="http://res.cloudinary.com/hammedb/image/upload/v1523977229/PicsArt_02-08-02.22.04guuj.jpg" height="10px"></div>
				</div>
			</div>
				<div class="about">
				<div class="oj-panel oj-panel-alt1 oj-margin demo-mypanel">
					<div class="demo-flex-display oj-flex-items-pad">
						<div class="oj-flex oj-sm-align-items-center oj-sm-justify-content-space-around">
							<h4 class="oj-lg-align-items-center name">Hello I'm <b><?= $name ?></b></h4>
						</div>
					</div>
					<div class="demo-flex-display oj-flex-items-pad">
						<div class="oj-flex oj-sm-align-items-center oj-sm-justify-content-space-around">
					
							<p>Web developer,Python Lover and a computer Engineering Student from Obafemi Awolowo University.</p>
						</div>
					</div>
					<div class="demo-flex-display oj-flex-items-pad">
						<div class="oj-flex oj-sm-align-items-center oj-sm-justify-content-space-around">
					
							<p class="mail"><span class="fa fa-envelope">hammedb197@gmail.com </span></p>
						</div>
					</div>
					<div class="demo-flex-display oj-flex-items-pad">
						<div class="oj-flex oj-sm-align-items-center oj-sm-justify-content-space-around">
					
							<p>
								<a href="https://www.linkedin.com/in/"><span class="fa fa-linkedin-square fa-3x ln"></span></a>&nbsp;
								<a href="https://web.facebook.com/Hbushroh"><span class="fa fa-facebook-square fa-3x fb"></span></a>&nbsp;
								<a href="https://twitter.com/h_bushroh"><span class="fa fa-twitter-square fa-3x tw"></span></a>&nbsp;
								<a href="https://github.com/Hammedb197/"><span class="fa fa-github fa-3x git"></span></a>
							</p>
						</div>
					</div>
				</div>
			</div>
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
					
				</div>
				<input type="text" class="human_input" name="human_input">		
					
			</div>
	</div>



	<script src="vendor/jquery/jquery.min.js"></script>
	<script>
		$(document).ready(function() {

			
			let stage = 0;
			var visitor = '';
			var done_intro = 0;
			let url = "profiles/hammedb.php";
			

			$("div#chat-bot").hide();
			
			$("a#start-chat-bot").click(function(e){
				
				$("div#chat-bot").toggle();
				
				stage = 0;

				doIntro();

				$(".human_input").on('keyup', function (e) {
					if (e.keyCode == 13) {
						
						if($("input.human_input").val().trim().length < 1){
						}else if($("input.human_input").val() == "clear"){
							$("div.conversation").html('');
							$("div.conversation").append(makeMessage("Type menu to get to command list"));
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

							$.post(url, {human_response: human_response, stage: 1})
							.done(function(response) {
								response = jQuery.parseJSON(response);
								if(stage == 1){
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
						}).fail(function() {
							alert("error");
						})

			}
		
		});
	</script>
</body>
</html>
