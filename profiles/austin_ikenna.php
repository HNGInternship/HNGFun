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
					<img src="https://res.cloudinary.com/ikeyy2000/image/upload/v1524732786/austin.jpg" alt="" width="32" height="32">
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
			$bot = botAnswer("Thanks for helping!.");

		}elseif($rows !== 0){
			$bot = botAnswer("I already know how to do that. You can ask me a new question, or teach me something else. Remember, the format is train: question # answer # password");
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
	 			$bot = botAnswer("You have entered a wrong password. Let's try that again with the right password, shall we?");
	 			//array_push($_SESSION['chat-log'] , $bot);
	 		}
	 		
	 	}elseif($userInput === 'about' || $userInput === 'aboutbot'){
	 		$bot = botAnswer("Version 1.0");
     		//array_push($_SESSION['chat-log'] , $bot);
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


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Austin Ikenna</title>
<meta name="viewport" content="width=device-width,initial-scale=1" />
<link href="//netdna.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!------ CSS Styling ---------->
<style>
body{
	font-family:Lato,'Helvetica Neue',Helvetica,Arial,sans-serif;
}

h1,h2,h3,h4,h5,h6 {
	font-family:Lato,'Helvetica Neue',Helvetica,Arial,sans-serif;
	font-weight:700;
}

.card {
    background-color: #fff;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.8);
	font-size: 80%;
	max-width: 400px;
	height: 520px;
	margin: 8% auto;
	padding: 0;
	border-radius: 0.8em;
	text-align: center;
	font-family: arial;
}

.profile-cover img {
	border-radius: 0.8em 0.8em 0 0;
	margin-bottom: 15%;
    z-index: 0;
}

.profile-avater {
    top: 32%;
    bottom: 0;  
    left: 0;
    right: 0;
    z-index: 5;
	position: absolute;
}

.profile-avater img {
	border-radius: 50%;
	border: 0.5em solid #fff;
}

.intro {
	margin-top: 18%;
}

a {
	cursor:pointer;
	text-decoration: none;
	font-size: 22px;
	color: black;
}

.social {
	word-spacing: 15px;
}

/*===========================
     CHAT BOT MESSENGER
   ===========================*/
#chat-box {
	bottom: 0;
	font-size: 15px;
	right: 24px;
	position: fixed;
	width: 280px;
}

#chat-box header {
	background: #0099ff;
	border-radius: 6px 6px 0 0;
	color: #fff;
	cursor: pointer;
	padding: 16px 20px;
}

#chat-box h4, #chat-box h5 {
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
	font-size: 12px;
}
#chat-box h5 {
	font-size: 10px;
}
#chat-box form {
	padding: 24px;
}
#chat-box input[type="text"] {
	border: 1px solid #ccc;
	border-radius: 3px;
	padding: 8px;
	outline: none;
	width: 230px;
}
header h4{
	color: #fff;
}
.chat {
	background: #ADD8E6;
}
.hide {
	display: none;
}
.chatlogs {
	height: 252px;
	padding: 8px 24px;
	overflow-y: scroll;
}
.chat-message {
	margin: 16px 0;
}
.bot img {
	border-radius: 50%;
	float: left;
}
.bot .chat-message-content{
	margin-left: 40px;
	border-radius:0  15px 15px 15px;
	background: #e4e4e4;
	padding: 15px 10px;
}
.user .chat-message-content{
	margin-right: 40px;
	border-radius: 15px 15px 0 15px;
	background: #e4e4e4;
	padding: 15px 10px;
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
/* End of chatbox script */
</style>
</head>
<body>
  
<div class="card">
	<div class="profile-cover"><img src="https://res.cloudinary.com/ikeyy2000/image/upload/v1526440656/graffiti-art.jpg" alt="profile-cover" style="width:100%" width="400" height="100%"></div>
	<div class="profile-avater"><img src="https://res.cloudinary.com/ikeyy2000/image/upload/v1524732786/austin.jpg" alt="Austin" style="width:45%" style="height:40%"></div>

	<div class="intro">
		<h3>Austin Ikenna</h3>
		<p>@austin_ikenna
		<p>UI/UX Design and Front-end Development</p>
	</div>
	
	<div class="social">
		<a href="github.com/austin.ikenna"><i class="fa fa-github"></i></a>
		<a href="twitter.com/austin_ikenna"><i class="fa fa-twitter"></i></a>
		<a href="linkedin.com/in/augustine-ikenna-aku-782448a3"><i class="fa fa-linkedin"></i></a>
		<a href="facebook.com/austin.ikenna"><i class="fa fa-facebook"></i></a>
	</div>
</div>

<!--======CHAT-BOX STRART=======-->
<div id="chat-box"> 
	<header class="clearfix" onclick="change()">
		<h4>Chat with me!</h4>
    </header>
    <div class="chat hide" id="chat">
		<div class="chatlogs" id="chatlogs">
			<div class="chat bot chat-message">
				<img src="https://res.cloudinary.com/ikeyy2000/image/upload/v1524732786/austin.jpg" alt="" width="32" height="32">
				<div class="chat-message-content clearfix">
					<p>Hello! this is Austin's bot</p>
					<span class="chat-time"> </span>
				</div> 
			</div>
			<div class="chat bot chat-message">
				<img src="https://res.cloudinary.com/ikeyy2000/image/upload/v1524732786/austin.jpg" alt="" width="32" height="32">
				<div class="chat-message-content clearfix">
					<p>Ask me anything and if i can't answer train me using the following format "train: question # answer # password"</p>
					<span class="chat-time"></span>
				</div> 
			</div>
			<div class="chat user chat-message">
				<img src="https://res.cloudinary.com/ikeyy2000/image/upload/v1526549963/users.png" alt="" width="32" height="32">
				<div class="chat-message-content clearfix">
					<p>How are you?</p>
					<span class="chat-time"></span>
				</div> 
			</div>
			
			<div id="chat-content"></div>
		</div> <!-- end of default chat -->
		
		<form action="#" method="post" class="form-data">
			<fieldset>
				<input type="text" placeholder="Type your message…" name="question" id="question" autofocus>
				<input type="submit" name="bot-interface" value="SEND"/>
			</fieldset>
		</form>
    </div> 
</div> <!--=======CHAT-BOX END======-->


<script>
// CHAT BOT MESSENGER////////////////////////

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
        xhttp.open('POST', 'profiles/Abigail', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('question='+ question.value);
        e.preventDefault();
    }

    function userChat(chats, reply){
		if(question.value !== ''){
			var chat = `<div class="chat user chat-message">
				<img src="https://res.cloudinary.com/ikeyy2000/image/upload/v1526549963/users.png" alt="" width="32" height="32">
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

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/jquery.form.min.js"></script>
<script type="text/javascript" src="js/mail.js"></script>

</body>
</html>

