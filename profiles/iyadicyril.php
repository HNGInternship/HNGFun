<?php 
	 if($_SERVER['REQUEST_METHOD'] === "GET"){
	if(!defined('DB_USER')){
		require "/config.example.php";	
	   
		try {
			$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		} catch (PDOException $pe) {
			die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
		}
	}

    try {
        $q = 'SELECT * FROM secret_word';
        $sql = $conn->query($q);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $data = $sql->fetch();
        $secret_word = $data["secret_word"];
    } catch (PDOException $err) {
        throw $err;
	}
}
?>

<?php
  function validateinput($input) {
	$input = trim($input);
	$input = chop($input);
	$input = trim($input, "?");
	$input = stripslashes($input);
	$input = htmlspecialchars($input);
  return $input;
  }
 
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	require "../answers.php";
	date_default_timezone_set("Africa/Lagos");

		
	if(empty($_POST['question'])){
		$reply = "You have to enter a question.";
		$response =array('status' => 0,'answer' => $reply);
		echo json_encode($response); 

		return;		
	}
       
	$question = validateinput($_POST['question']);
    
	//display bot version
	if($question == "about bot" ||$question == "aboutbot" ){
		$reply = "Andy bot v1.0";
				   $response = array('status'=>1,'answer'=> $reply);
				   echo json_encode($response); 
				   return;
	}else{
	
	//check for train
	$train = explode(':', $question);
	if($train[0] == 'train'){
		$inputQuestion = explode('#', $train[1]);
		$password = 'password';
		if(!count($inputQuestion)<3 && validateinput($password) === validateinput($inputQuestion[2])){
			if (validateinput($inputQuestion[0]) && validateinput($inputQuestion[1]) != " "){
				$dataQuestion = validateinput($inputQuestion[0]);
				$dataAnswer = validateinput($inputQuestion[1]);
				
				//is the question or answer already in the database
				$select = $conn->query("Select * from chatbot where question LIKE '%$question%'");
				$select->bindParam(':question', $question);
				$select->execute();
				$select ->setFetchMode(PDO::FETCH_ASSOC);
				$fetch = $select->fetchAll();
				if($fetch){
					$reply = "I already know that fam!";
				   $response = array('status'=>0,'answer'=> $reply);
				   echo json_encode($response); 
				}
				else{
					//save into the database as a new question
					$insert = "Insert into chatbot (question, answer) values ('$dataQuestion', '$dataAnswer')";
					
					if($conn->query($insert)){
						$reply = "Thanks alot, i feel smarter already.";
						$response = array('status'=>1, 'answer'=>$reply);
						echo json_encode($response);
					}else{
						$reply = "Sorry i didn't get that </br> i need you to repeat that lesson.";
						$response = array('status'=>0, 'answer'=>$reply);
						echo json_encode($response);
					}
				}
				//saving to database ends here
				
			}else{
				$reply = "Sorry fam, i only learn this way =><br> Training Format: train:question#answer#password";
						$response = array('status'=>0, 'answer'=>$reply);
						echo json_encode($response);
			}
		}else{
				$reply = "Thats not how to train buddy.<br> Training Format: train:question#answer#password";
						$response = array('status'=>0, 'answer'=>$reply);
						echo json_encode($response);
			}
	}else{
  //retrieving answers to questions from the database 
	 $question = validateinput($_POST['question']);
	 $answer = $conn->query("Select * from chatbot where question LIKE '%$question%'");
	
	 $answer ->setFetchMode(PDO::FETCH_ASSOC);
	 $ans = $answer->fetchAll();
	 if (count($ans) > 0) {

	   $choseRandom = rand(0, count($ans)-1);
	   $response = $ans[$choseRandom]['answer'];
	   $response = array('status'=>1,'answer'=> $response);
	   echo json_encode($response);

	 }
	 else{
		$index_of_parentheses_closing = stripos($answer, "))");
					if($index_of_parentheses_closing !== false){
						$function_name = substr($answer, $index_of_parentheses+2, $index_of_parentheses_closing-$index_of_parentheses-2);
						$function_name = trim($function_name);
						if(stripos($function_name, ' ') !== false){ //if method name contains spaces, do not invoke method
							echo json_encode([
								'status' => 0,
								'answer' => "No white spaces allowed in function name"
							]);
							return;
						}
						if(!function_exists($function_name)){
							echo json_encode([
								'status' => 0,
								'answer' => "Function not found"
							]);
						}else{
							echo json_encode([
								'status' => 1,
								'answer' => str_replace("(($function_name))", $function_name(), $answer)
							]);
						}
						return;
					}
					else{
						$error = "I don't seem to understand you <br> You can train me on that.";
						$response = array('status'=>2, 'answer'=> $error);
						echo json_encode($response); 
					}
				}
			}
			
		}
			

	} 
  
?>

<title>Iyadi Cyril</title> 	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Work+Sans:Regular|Lato:regular" rel="stylesheet"> 

 <style type="text/css">


  body
 {
	margin-top: 15px;
	padding: 0px;
	background:#7f7fff;
	font-family: 'Open Sans', sans-serif;
	font-size: 10pt;
	color: #737373;
 }

 h1, h2, h3
 {
	margin: 0;
	padding: 0;
	font-family: 'Englebert', sans-serif;
	color: #74C5F2;
 }

 h2
 {
	font-weight: 400;
	font-size: 2.00em;
	color: #8B2287;
 }

p, ol, ul
{
	margin-top: 0px;
}

p
{
	line-height: 180%;
	margin: 30px 0px 30px 0px;
}


a
{
	color: #8C2287;
}

a:hover
{
	text-decoration: none;
}

a img
{
	border: none;
}

img.alignleft
{
	float: left;
}

img.alignright
{
	float: right;
}

img.aligncenter
{
	margin: 0px auto;
}

hr{
	display: none;
}

/** WRAPPER */

#wrapper
{
	overflow: hidden;
	background: #FFFFFF;
	box-shadow: 0px 0px 20px 5px rgba(0,0,0,.10);
	border-radius: 40px;	
}

.containers
{
	width: 380px;
	margin: 0px auto;
	height: 950px;	
}

.clearfix
{
	clear: both;
}

/** HEADER */

#header
{
	overflow: hidden;
	width: 920px;
	padding: 0px 0px;
	padding-top: 10px;
}

/** LOGO */

#logo
{
	float: left;
	width: 400px;
	height: 100px;
}


#logo h1 a
{
	line-height: 100px;
	text-decoration: none;
	font-size: 2em;
	font-weight: 400;
	color: #FFFFFF;
	width: 400px;
}

/** MENU */

#menu
{
	float: right;
	width: 650px;
	height: 80px;
	margin-top: 20px;
	background: #8C2287;
	box-shadow: 0px 0px 10px 1px rgba(0,0,0,.10);
	border-radius: 20px 20px 0px 0px;
}

#menu ul
{
	margin: 0px;
	padding: 0px;
	list-style: none;
	line-height: normal;
	text-align: center;
}

#menu li
{
	display: inline-block;
	padding: 0px 20px;
}

#menu a
{
	display: block;
	line-height: 80px;
	text-decoration: none;
	font-family: 'Englebert', sans-serif;
	font-size: 1.50em;
	color: #FFFFFF;
}

#menu a:hover
{
	text-decoration: underline;
}

/** PAGE */

#page
{
	overflow: hidden;
	padding: 50px 0px;
	
}

#page h2
{
	padding-bottom: 20px;
}

/** CONTENT */

#content
{
	float: left;
	width: auto;
}

/** SIDEBAR */

#sidebar
{
	float: right;
	width: 280px;
}

#sidebar #sbox1
{
	margin-bottom: 30px;
}

/* Footer */

#footer
{
	overflow: hidden;
	padding:  0px 30px 0px;
	color: #C54F7F;
}

#footer p
{
	text-align: center;
}

#footer a
{
	color: #CE6790;
}

.image-style img
{
	margin-bottom: 2em;
	border-radius: 30px;
	padding: 0px 40px;
	width: 300px;
}

/** LIST STYLE 1 */

.list-style1
{
	margin: 0px;
	padding: 0px;
	list-style: none;
	font-family: 'Open Sans', sans-serif;
	color: #777777;
}

.list-style1 li
{
	padding: 10px 0px 10px 0px;
	border-top: 1px solid #D6D6D6;
}

.list-style1 a
{
	color: #777777;
}

.list-style1 h3
{
	padding: 10px 0px 5px 0px;
	font-weight: 500;
	color: #444444;
}

.list-style1 .posted
{
	padding: 0px 0px 0px 0px;
}

.list-style1 .first
{
	border-top: 0px;
	padding-top: 0px;
}

/** LIST STYLE 2 */

.list-style2
{
	margin: 0px;
	padding: 0px;
	list-style: none;
}

.list-style2 li
{
	padding: 10px 0px 20px 0px;
	border-top: 1px solid #C9C9C9;
}

.list-style2 a
{
	color: #777777;
}

.list-style2 .first
{
	padding-top: 0px;
	border-top: 0px;
}

.link-style1
{
	display: inline-block;
	margin-top: 20px;
	background: #8C2287;
	border-radius: 10px;
	padding: 10px 30px;
	text-decoration: none;
	font-family: 'Englebert', sans-serif;
	font-size: 1.50em;
	color: #FFFFFF;
}

.chat-messages {
			background-color: lightblue;
			padding: 5px;
			height: 300px;
			overflow-y: auto;
			margin-left: 15px;
			margin-right: 15px;
			border-radius: 6px;
			
	
}

#chatMessages{ 
    width: 100%;
    overflow-x: hidden;
    max-height: 250px;
	margin-top: 20px;
}

#chat_message{
    height: 40px;
}

</style>
<div id="header" class="containers" style="height:100px">
	<div id="logo">
		<h1><a href="#">@IyadiCyril</a></h1>
	</div>	
</div>
<div id="wrapper" class="containers">
	<div id="page" style="width: 350px;">
		<div id="content"> <a href="#" class="image-style" style="padding-right: 40px;padding-left: 30px;width: 370.797px;"><img src="https://res.cloudinary.com/dj7y9zirl/image/upload/v1523825090/IMG_20180411_111139_1.jpg" width="300" height="200" alt=""></a>
			<h2 class="text-center">Software developer</h2>					
					<p style="margin-top: 0px;margin-left: 20px;border-right-width: 20px;margin-right: 20px;">The only edge i have is my ever in-depth desire to learn. </br> Have fun with my bot...He's name is Andy.</p>										
	</div>
</div>
<style type="text/css">
					.chat-bot {
						background-color: #fff;
						margin: 10px 0px 0px 5px;
						border-radius: 5px 5px 0px 0px;
						padding-bottom: 40px;
						position: relative; 
					}

					.chat-bot-title {
						width: 100%;
						height: 50px;
						padding-left: 10px;
						border-radius: 5px 5px 0px 0px;
						border: 1px solid #fff;
						background: rgba(45,156,219,.75);
						color: #fff;
					}

					.message-area {
						max-height: 220px;
						overflow: auto;
						padding: 10px
					}

					.sent-message {
						display: flex;
						justify-content: flex-end;
						margin: 0 0 4px;
					}

					.received-message {
						display: flex;
						justify-content: flex-start;
						margin: 0 0 4px;
					}

					.message {
						padding: 5px 15px;
						background-color: rgba(45,156,219,.75);
						line-height: 14px;
						font-size: 12px;
						font-weight: 600;
						max-width: 50%
					}

					.sent {
						border-radius: 10px 0px 10px 10px;
						color: #fff;
					}

					.received {
						border-radius: 0px 10px 10px 10px;
						color: #fff;
					}

					.message-input-area {
						position: absolute;
						bottom: 0;
						width: 100%;
						display: flex;
						background-color: #fff;
						border: 1px solid rgba(45,156,219,.75);
						align-items: center;
						height: 40px
					}

					.message-input {
						width: 90%;
						height: 100%;
						border: none;
						background: transparent;
						padding: 0 10px
					}


					@media (min-width: 1200px) {
						
						.btn {
							width: 10%;
							height: 100%;
							color: #fff;
							background-color: rgba(45,156,219,.75)
							border: 1px solid #fff;
						}

					}

					@media (min-width: 768px) and (max-width: 979px) {
						
						.btn {
							width: 10%;
							height: 100%;
							color: #fff;
							background-color: rgba(45,156,219,.75)
							border: 1px solid #fff;
						}

					}

			        @media (max-width: 767px){
			        	
			        	.btn {
							width: auto;
							height: 100%;
							color: #fff;
							background-color: rgba(45,156,219,.75)
							border: 1px solid #fff;
						}

			        }

				</style>
 <!--Andy Bot-->
 <div class="row">
					<div class="col-md-2 col-sm-1"></div>
					<div class="col-md-8 col-sm-10">
						<!-- chat bot -->
				<div class="chat-bot">
					<!-- chat title area -->
					<div class="chat-bot-title">
						AndyBot v2.0
					</div>
					<div class="message-area">
						<div class="received-message">
							<p class="message sent">
								Hi i'm Andy,how can i help you?.
							</p>
							
						</div>

						<div class="received-message">
							<p class="message received">
								Ask me anything and if i can't answer train me with the format
								train:question#answer#password
							</p>	
						</div>
											

					</div>
					<div class="message-form">
						<div class="message-input-area">
							<label for="user-message"></label>
							<input type="text" class="message-input" id="user-message" name="user-message" placeholder="Ask me anything" required>
							<button class="btn btn-primary" type="button" onclick="sendMsg()">Send</button>
						</div>
					</div>

				</div>
				<br>	
					</div>
					<div class="col-md-2 col-sm-1"></div>
				</div>
		</div>
<script  type="text/javascript">
  window.addEventListener("keydown", function(e){
	    		if (e.keyCode == 13){
	    			//check is input for is empty
	    			if (document.querySelector("#user-message").value == "" || document.querySelector("#user-message").value == null){

	    				var replyFromBot = 'Please enter a command or type HELP to see my command list';
	    				dispMessage(replyFromBot, 'received');

	    			}else{

	    				sendMsg();
	    				
	    			}
	    		}
	    	});

	    	//send message to bot 
	    	function sendMsg(){
	    		//get message
	    		var inputForm = document.querySelector("#user-message");
	    		var messageToBot = inputForm.value;

	    		dispMessage(messageToBot,'sent');
	    		
	    		//clear the form
		    	inputForm.value = "";

	    		if (messageToBot == "" || messageToBot == null) {
	    			var replyFromBot = 'You have to ask a question.';
	    			dispMessage(replyFromBot, 'received');

	    			return;
	    		}
		    		
		    	if (messageToBot == 'aboutbot' || messageToBot == 'Aboutbot' || messageToBot == 'about bot' || messageToBot == 'About bot') {
		    		var replyFromBot = 'Name: AndyBot<br>Version: 2.0';
		    		dispMessage(replyFromBot, 'received');

		    		return;
		   		}

		    		//send message
		    		var xhttp = new XMLHttpRequest();
		    		xhttp.onreadystatechange = function(){
		    			if(xhttp.readyState ==4 && xhttp.status ==200){
				            processData(xhttp.responseText);
				        }
		    		};

		    		    xhttp.open("POST", "/profiles/iyadicyril.php", true);
						xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						xhttp.send("question="+messageToBot);
	    	}

	    	function processData(data){
	    		data = JSON.parse(data);
	    		console.log(data);
	    		var answer = data.response;

    			if(Array.isArray(answer)){
    				if(answer.length != 0){
    					var res = Math.floor(Math.random()*answer.length);
    					dispMessage(answer[res][0], "received");
    				}else{
    					dispMessage("Ok now i'm lost<br>To teach me use this format<br>train: question#answer#password","received");
      				}
    			}else{
    				dispMessage(answer,"received");
	    		}
	    	}

	    	function dispMessage(data,position){
	    		console.log(data + ' from dispMessage');

	    		//generate inner chat element
	    		var messageArea = document.querySelector(".message-area");
	    		var div = document.createElement("div");
	    		var par = document.createElement("p");

	    		if (position == 'sent') {	    			
	    			div.classList = position + "-message";
	    		}else if (position == 'received'){
	    			div.classList = position + "-message text-left"
	    		}
	    		
	    		par.classList = "message " + position;
	    		par.innerHTML = data;

	    		//join/append all the element together
	    		div.appendChild(par);
	    		messageArea.appendChild(div);

	    		//add autoscroll function
	    	}
	    	
		</script>



