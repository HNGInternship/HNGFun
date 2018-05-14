<!DOCTYPE html>
<html>
<head>
	<title>Samuel Profile</title>
	<?php 
 if(!defined('DB_USER')){
     require "../../config.php";
     try {
         $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
     } catch (PDOException $pe) {
         die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
     }
   }
$query = $conn->query("SELECT * FROM secret_word");
$result = $query->fetch(PDO::FETCH_ASSOC);
$secret_word = $result['secret_word'];
$question;

  global $pass;
	$pass = "password";

if($_SERVER['REQUEST_METHOD'] === 'POST'){ 
	
	function botAnswer($message){
		$botAnswer = '<div class="chat bot chat-message">
					
					<div class="chat-message-content clearfix">
						<p>' . $message . '</p>';
			return $botAnswer;
	}


	function train($dbcon, $data){
		$trainCheck = $dbcon->prepare("SELECT * FROM chatbot WHERE question LIKE :question and answer LIKE :answer");
		$trainCheck->bindParam(':question', $data['question']);
		$trainCheck->bindParam(':answer', $data['answer']);
		$trainCheck->execute();
		$result = $trainCheck->fetch(PDO::FETCH_ASSOC);
		$rows = $trainCheck->rowCount();
			if($rows === 0){
			$trainQuery = $dbcon->prepare("INSERT INTO chatbot (id, question, answer) VALUES(null, :q, :a)");
			$trainQuery->bindParam(':q', $data['question']);
			$trainQuery->bindParam(':a', $data['answer']);
			$trainQuery->execute();
			$bot = botAnswer("Thanks for helping me be better.");

		}elseif($rows !== 0){
			$bot = botAnswer("I can answer that. Ask me a new question, or teach me something else.");
		}
		echo $bot;
	}
	
		
	
	 	$userInput = strtolower(trim($_POST['question']));
	 	if(isset($userInput)){
	 		$user = $userInput;
	 		 //array_push($_SESSION['chat-log'] , $user);
	 	}
	 	
	 	if(strpos($userInput , 'train:') ===0){
	 		list($t, $r ) = explode(":", $userInput);
			list($trainquestion, $trainanswer, $trainpassword) = explode("#", $r);
			$data['question'] = $trainquestion;
	 		$data['answer'] = $trainanswer;
	 		if($trainpassword === $pass){
	 			$bot = train($conn, $data);
	 			//array_push($_SESSION['chat-log'] , $bot);
	 		}else{
	 			$bot = botAnswer("You have entered a wrong password. Input the correct password");
	 			//array_push($_SESSION['chat-log'] , $bot);
	 		}
	 		
	 	}elseif($userInput === 'about' || $userInput === 'aboutbot'){
	 		$bot = botAnswer("Version 1.0");
     		//array_push($_SESSION['chat-log'] , $bot);
	 	}elseif($userInput === 'hey' || $userInput === 'hi' || $userInput === 'wassup'){
	 		$bot = botAnswer("Hi, How are you doing?");
	 	}elseif($userInput === 'name' || $userInput === 'What is your name'){
	 		$bot = botAnswer("Samuel's Bot");
	 	}else{
			 $userInputQuery = $conn->query("SELECT * FROM chatbot WHERE question like '".$userInput."' ");
		     $userInputs = $userInputQuery->fetchAll(PDO::FETCH_ASSOC);
		    $userInputRows = $userInputQuery->rowCount();
		     if($userInputRows == 0){
		     	$bot = botAnswer("I am unable to answer your question right now. But you can train me to answer this particular question. Use the format train: question #answer #password");
		     //	array_push($_SESSION['chat-log'] , $bot);

		     }else{
		     	$botAnswer = $userInputs[rand(0, count($userInputs)-1)]['answer'];
		     	$bot = botAnswer($botAnswer);
		     	//array_push($_SESSION['chat-log'] , botAnswer($botAnswer));
		     }
     	}
     	echo $bot;

     	exit();
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

		/* ---------- chat-box ---------- */

		#chat-box {
			bottom: 0;
			font-size: 12px;
			right: 24px;
			position: fixed;
			width: 300px;

		}
		#chat-box header {
			background: #075e54;
			border-radius: 7px 7px 0 0;
			color: #ffffff;
			cursor: pointer;
			padding: 16px 24px;
		}

		#chat-box h4, #chat-box h5{
			line-height: 1.5em;
			margin: 0;

		}
		#chat-box h4:before {
			background: #1a8a34;
			border-radius: 50%;
			content: "";
			display: inline-block;
			height: 8px;
			margin: 0 8px 0 0;
			width: 8px;

		}

		#chat-box h4 {
			font-size: 20px;
		}

		#chat-box h5 {
			font-size: 10px;
		}

		#chat-box form {
			padding-left: 15px;
			padding-top: 10px;
			background-color: #ece5dd;
			height: 57px;
		}

		#chat-box input[type="text"] {
			border: 1px solid #ccc;
			border-radius: 30px;
			padding-top:4px;
			padding-bottom: 4px;
			padding-left: 10px;
			outline: none;
			width: 258px;
			height: 38px;
			font-size: 18px;

		}
		#chat-box ::placeholder{
			color:#707B7C;
			opacity: 1;
		}


		header h4{
			color: #fff;
		}

		.chat {
			background: #fff;
			min-height: 20px;
					
		}

		.chat p{
			margin: 0;
			padding-top: 7px;
		}
			.hide{
			display: none;
		}

		.chatlogs {
			background-color:#ece5dd;
			height: 260px;
			padding: 8px 24px;
			overflow-y: scroll;

		}

		.chat-message {
			margin: 16px 0;
			width: 215px;
		}

		.bot img {
			border-radius: 50%;
			float: left;
		}
		.bot .chat-message-content{
			margin-left: 10px;
			padding: 3px 10px;
		}
		.user .chat-message-content{
			margin-right: -20px;
			background: #dcf8c6;
			padding: 3px 10px;
		}
		.user .chat-message-content.chat{
			background: #dcf8c6;
		}


		.user img{
			border-radius: 50%;
			float: right;
		}
		.chat-message-content {
			/*margin-left: 56px;*/
		}

		.bot .chat-time {
			float: right;
			font-size: 10px;
		}
		.user .chat-time {
			float: right;
			font-size: 10px;
		}
		.chat-time{
			margin-top: -7px;
			color: #707B7C;
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
					<a href="https://web.facebook.com/segun.weke">..<i class="fa fa-facebook" ></i></a>
					<a href="https://twitter.com/samuelweke"><i class="fa fa-twitter" style="padding-left: 10px" ></i></a>
					<a href="#"><i class="fa fa-instagram" style="padding-left: 10px" ></i></a>
				</div>
			</div>
		</div>

		<div id="chat-box">	
		<header class="clearfix" onclick="change()">
			<h4>Chat with Bot</h4>
		</header>
		<div class="chat hide" id="chat">
			<div class="chatlogs" id="chatlogs">
				<div class="chat bot chat-message">
					
					<div class="chat-message-content clearfix">
						<p>Welcome, I am a chatbot. </p>
						<span class="chat-time"> </span>
					</div> 
				</div>
				<div class="chat bot chat-message">
					
					<div class="chat-message-content clearfix">
						<p>To know my version enter<br> "aboutbot".</p>
						<span class="chat-time"></span>
					</div> 
				</div>
				<div class="chat bot chat-message">
					
					<div class="chat-message-content clearfix">
						<p>Ask me questions and I will try to answer. You can train me to answer some questions. Just make use of the format (train: question # answer # password).</p>
						<span class="chat-time"></span>
					</div> 
				</div>

				
				 
				<div id="chat-content"></div>
				
			</div> <!-- end chat-history -->
			<form action="#" method="post" class="form-data">
				<fieldset>
					<input type="text" placeholder="Type a message" name="question" id="question" autofocus>
				</fieldset>
			</form>
		</div> <!-- end chat -->
	</div> <!-- end chat-box -->


	<script >
		
		
		function change(){
			document.getElementById("chat").classList.toggle('hide');
			
    }
     var btn = document.getElementsByClassName('form-data')[0];
		var question = document.getElementById("question");
		var chatLog = document.getElementById("chatlogs");
		var chatContent = document.getElementById("chat-content");
		var myTime = new Date().toLocaleTimeString(); 
		document.getElementsByClassName('chat-time')[0].innerHTML = myTime;
		document.getElementsByClassName('chat-time')[1].innerHTML = myTime;
		document.getElementsByClassName('chat-time')[2].innerHTML = myTime;
		btn.addEventListener("submit", chat);


		function chat(e){
		    if (window.XMLHttpRequest) { // Mozilla, Safari, IE7+ ...
			     var xhttp = new XMLHttpRequest();
			} else if (window.ActiveXObject) { // IE 6 and older
			  var  xhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
		   
			xhttp.onreadystatechange = function() {
	          if(this.readyState == 4 && this.status == 200) {
	          	// console.log(this.response);
	          	 userChat(question.value, this.response);
     			e.preventDefault();
	            question.value = '';
	          }
      	    }
        xhttp.open('POST', 'profiles/samuelweke.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('question='+ question.value);
        e.preventDefault();
		}

		function userChat(chats, reply){
			if(question.value !== ''){
				var chat = `<div class="chat user chat-message">
					
					<div class="chat-message-content clearfix">
						<p>` + chats + `</p>
						<span class="chat-time">` + new Date().toLocaleTimeString(); + `</span>
					 </div>
				</div>`;
			}
			chatContent.innerHTML += chat;
		     
		    setTimeout(function() {
			    chatContent.innerHTML += reply + `<span class="chat-time">`+ new Date().toLocaleTimeString(); +` </span>
					</div> 
				</div>`;
				document.getElementById('chatlogs').scrollTop = document.getElementById('chatlogs').scrollHeight;	
			}, 1000);
		}
	</script>

	</body>

</html>