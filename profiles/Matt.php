<?php
/*******************************Chat Bot Server Side Brain************************************/
// This is where the chat message will be received, I'm using $_GET because i'll pass the message via AJAX
if(isset($_GET['send_chat'])){//if chat was sent
	require('../../config.php');
	try {
          $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
      } catch (PDOException $e) {
          die("Could not connect to the database " . DB_DATABASE . ": " . $e->getMessage());
      }
 if(isset($_GET['q'])&& isset($_GET['a'])&& isset($_GET['p'])){//For training
	$question = $_GET['q'];
	$answer = $_GET['a'];
	$password = $_GET['p'];
	if($password == 'password'){
		$stmt = $conn->prepare("INSERT INTO chatbot (question,answer) VALUES(:q,:a)");
		$stmt->bindValue(':q',$question,PDO::PARAM_STR);
		$stmt->bindValue(':a',$answer,PDO::PARAM_STR);
		$stmt->execute();
		if($stmt->rowCount() == 1){
			echo "You just trained me to respond to <strong>$question</strong>, Next time I'm been asked, I'll answer <strong>$answer</strong>";
		}
		else{
			echo "My brain could not process that training for now";
		}
	}
	else{
		echo "That's not the correct password to my brain, the password is <strong>password</strong>";
	}
}
else if(isset($_GET['message'])){//Normal chat
	$msg = str_replace('?','',trim($_GET['message'])); // remove question mark
	$getAnswer = $conn->prepare("SELECT answer FROM chatbot WHERE question LIKE :q ");
	$getAnswer->bindValue(':q',"%$msg%",PDO::PARAM_STR);
	$getAnswer->execute();
	if($getAnswer->rowCount() == 1){
		$answer = $getAnswer->fetch(PDO::FETCH_ASSOC);
		echo $answer['answer'];
	}
	else if($getAnswer->rowCount() > 1){//If there is more than one answer
		$answers = array(); 
		$a = 0;
		while($answer = $getAnswer->fetch(PDO::FETCH_ASSOC)){
			$answers[$a] =  $answer['answer'];//store the answers in an array
			$a++;
		}
		//echo "There are ".count($answers)." answers for you";
		echo $answers[rand(0,count($answers)-1)]; // randomize the answer to be served
	}
	else{
		echo "I don't understand what you meant, you can train me to respond to <strong>'$msg'</strong> with the command <strong class=\"command\">train: #$msg #answer #password</strong>";
	}
}
	
	die();
}


/*************************Fetching my profile from the database*****************************/
	 if(!DEFINED('DB_USER')){//if database informations are not available, acquire them
      require('../../config.php');
		try {
			  $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		  } catch (PDOException $e) {
			  die("Could not connect to the database " . DB_DATABASE . ": " . $e->getMessage());
		  }
    }
	
	$secret_word = "";
	$getProfile = $conn->query("SELECT * FROM interns_data WHERE username='Matt'");
	if($getProfile->rowCount() != 0){
		$matt = $getProfile->fetch(PDO::FETCH_ASSOC);
		$name = $matt['name'];
		$username = $matt['username'];
		$image = $matt['image_filename'];
	}
	$getSecretWord = $conn->query("SELECT * FROM secret_word");
	if($getSecretWord->rowCount() != 0){
		$sw = $getSecretWord->fetch(PDO::FETCH_ASSOC);
		$secret_word = $sw['secret_word'];
	}
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='https://fonts.googleapis.com/css?family=Encode Sans Semi Expanded' rel='stylesheet'>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
		<style>
			body{
				font-family: 'Encode Sans Semi Expanded';
				font-size: 22px;
				margin: 0px;
			}
			.container{
				margin: 0px;
				padding: 0px;
				max-width: 100% !important;
			}
			#matt-container{
				background: rgba(52, 100, 64, 1) url('http://res.cloudinary.com/adedayomatt/image/upload/v1524847390/background.jpg') center no-repeat;
				background-size: cover;
				height: 150vh;
				width: 100%;
			}
			#matt-container-inner{
				color: #FFF;
				height: 100%;
				padding-top: 20px;
			}
			.text-major{
				font-size: 80px;
				font-weight: 1000 !important;
			}
			.help-text{
				color: grey;
				font-size: 12px;
			}
			.text-center{
				text-align: center;
			}
			.text-left{
				text-align: left;
			}
			.text-right{
				text-align: right;
			}
			a.matt-link{
				color: #FFF;
				text-decoration: none;
			}
			a.matt-link:hover{
				text-decoration: none;
				opacity: 0.8;
			}
			#matt-social-container{
				margin-top: 150px;
				background-color: rgba(0,0,200,0.8);
				line-height: 30px;
			}
			.matt-social-li{
				list-style-type: none;
				display: inline-block;
				margin: 0px 5px;
			}			
			#matt-bio{
				background-color: rgba(0,0,0,0.8);
				padding: 10px 50px;
				box-shadow: 0px 5px 5px rgba(200,200,200,0.5);
				border-radius: 5px;
				margin: 10px 20%;
			}
			#matt-img{
				width: 200px;
				height: 200px;
				border-radius: 50%;
			}
			@media all and (max-width: 768px){/*In mobile view*/
				#matt-bio{
					margin: 10px 10px;
				}
			}
			
	/**************Chat Bot Styling*******************/
			#bot-wrapper{
				position: fixed;
				bottom: 0;
				z-index: 10000;
				left: 65%;
				width: 30%;
				right:5%;
			}
			#bot-container{
				font-size: 14px;
				background-color: #FFF;
				border-radius:5px 5px 0px 0px ;
				box-shadow: 5px 5px 0px rgba(0, 0, 0, 0.1);
			}
			#chat-toggler{
				height: 60px;
				color: #FFF;
				text-align: center;
				padding: 10px;
				cursor: pointer;
				font-size: 20px;
			}
			#chat-toggler[data-chat-role='open'],#manage-chat[data-chat-role='restore']{
				background-color: rgba(0,200,0,1);
			}
			#chat-toggler[data-chat-role='close'],#manage-chat[data-chat-role='clear']{
				background-color: rgba(200,0,0,1);
			}

			#chat-area{
				padding: 10px;
				max-height: 300px;
				overflow-y: auto;
			}
			input#message-input{
				width: 100%;
				border-radius: 5px;
				padding: 8px 10px;
			}
			.incoming-chat,.outgoing-chat{
				border-radius: 5px;
				padding: 10px;
				margin-top: 5px;
				margin-bottom: 5px;
			}
			.outgoing-chat{
				margin-right: 40px;
				background-color: rgba(0,200,0,0.2);
			}
			.incoming-chat{
				margin-left: 40px;
				background-color: #E3E3E3;
			}
			
			#chat-container[data-bot-active = 'true']{
				display: block;
			}
			#chat-container[data-bot-active = 'false']{
				display: none;
			}
			#message-input-area{
				padding: 10px;
			}
			#chat-log{
				font-size: 12px;
				color: grey;
				font-style: italic;
				margin: 0px;
				margin-bottom: 5px;
			}
			#manage-chat{
				color: #FFF;
				border: none;
				border-radius: 3px;
			}
			.command{
				 font-family:Consolas; 
				background-color: rgba(0,0,0,0.5);
				color: #FFF;
				padding: 2px 5px;
			}
			.messenger-name{
				color: grey;
				font-size: 10px;
			}
			@media all and (max-width: 768px){/*In mobile view*/
				#bot-wrapper{
					width: 100%;
					left: 0;
					right:0;
				}
			}
		</style>
	
	</head>
	<body>
		<div id="matt-container">
			<!--Chat Bot-->
			<div id="bot-wrapper">
				<div id="bot-container">
					<div id="chat-container" data-bot-active="false">
						<div style="padding: 5px 10px; box-shadow: 0px 10px 10px rgba(0,0,0,0.1)">
							<p class="help-text text-left" style="font-size:20px;margin: 0px; color: green">MODE:  <strong id="bot-mode">Chat</strong></p>
						</div>
						<div id="chat-area" >
							<div id="chats">
								<noscript>
									<div class="outgoing-chat">
										Ooops! I'm sorry, i can't talk to you without JavaScript enabled on your browser
									</div>
								</noscript>
							</div>
						</div>
						<div id="message-input-area">
							<p id="chat-log"></p>
							<form id="chat-msg" action="<?php $_PHP_SELF ?>" method="POST">
								<input type="text" name="message"  placeholder="Enter your message here" id="message-input">
								<input type="submit" name="send_chat" value="send" style="visibility: hidden;background-color: rgb(0,200,0); color: #FFF; width: 20%">
								<p class="help-text text-center" style="margin: 2px 0px">Hit <strong>Enter</strong> to send message</p>
							</form>	
							<div class="text-right">
								<button id="manage-chat" data-chat-role="clear"> &times clear chats </button>
							</div>
						</div>
					</div>
					<div id="chat-toggler" data-chat-role="open">Let's Chat Here</div>
				</div>
			</div>
			<!-- Chat Bot-->
			
			<div id="matt-container-inner" class="text-center">
				<h1 class="text-major">You are viewing</h1>
				<h3><?php echo $name ?>'s Profile</h3>
				<img id="matt-img" src="<?php echo $image ?>">
				<p id="matt-bio">Hey there, my name is <?php echo $name ?>, I am a web developer and i have been in the journey since 2016. I also have interest in Data Science and AI.</p>
				<div id="matt-social-container" class="text-center" style="padding: 10px">
				<h4>Get in touch</h4>
				<ul id="matt-social-ul">
					<li class="matt-social-li"><a href="https://facebook.com/kayode.adedayo1" class="matt-link"><i class="fab fa-facebook"></i>  Kayode Adedayo Matthew</a></li>
					<li class="matt-social-li"><a href="https://instagram.com/adedayomatt" class="matt-link"><i class="fab fa-instagram"></i>  adedayomatt</a></li>
					<li class="matt-social-li"><a href="https://twitter.com/adedayomatt" class="matt-link"><i class="fab fa-twitter"></i>  adedayomatt</a></li>
					<li class="matt-social-li"><a href="https://github.com/adedayomatt" class="matt-link"><i class="fab fa-github"></i>  adedayomatt</a></li>
					<li class="matt-social-li"><a href="https://www.linkedin.com/in/adedayo-kayode-613007140/" class="matt-link"><i class="fab fa-linkedin"></i>  Adedayo (Matthew) Kayode</a></li>
					<li class="matt-social-li"><a href="mailto: adedayomatt@gmail.com" class="matt-link"><i class="fas fa-envelope"></i>  adedayomatt@gmail.com</a></li>
				</ul>
				</div>
			</div>
		</div>
		
		<script>
			USER = "";
			CLEAREDCHATS = "";
			RETURNING = false;
			MODE = 'Chat';
		
		/*initializing AJAX*/
			var AJAX = function(url){
				this.connect = function(){
				ajax = null;
					try{
					//opera 8+, firefox,safari,chrome
					ajax = new XMLHttpRequest();
				}
				catch(e){
					//Internet Explorer
					try{
						ajax = new ActiveXObject('Msxml2.XMLHTTP');
					}
				catch(e){
					try{
					ajax = new ActiveXObject('Microsoft.XMLHTTP');
					}
					catch(e){
						console.log("This browser does not support AJAX");
						}
					}	
				}	
				return ajax;
				};
			this.load = function(callback){
					ajaxObject = this.connect();
				if(ajaxObject != null){
					ajaxObject.onreadystatechange = function(){
						if(ajaxObject.status == 200){//if url is found
								switch(ajaxObject.readyState){
									case 0:
									console.log("Request not yet initialized. initializing...");
									trackCode = 0;
									trackMsg = "Your request is intializing...";
									break;
									case 1:
									console.log("Request set up!");
									trackCode = 1;
									trackMsg = "Your request is set up!";
									break;
									case 2:
									console.log("Request sent!");
									trackCode = 2;
									trackMsg = "Your request is sent!";
									break;
									case 3: 
									console.log("Request in process...");
									trackCode = 3;
									trackMsg = "Your request is processing...";
									break;
									case 4:
									trackCode = 204;
									trackMsg = "Response ready!";
									console.log("Request completed!");
									break;
								}
								
			if(typeof(callback) == 'function'){//if there is a valid callback function
							try{
								callback(trackCode,ajaxObject.responseText);
								}catch(err){
									console.log("The function "+callback+" did not execute well: "+err);
						}
					}
				
			 }
				else if(ajaxObject.status == 404){
						console.log("The ajax returns a status code of 404."+url+" is not found");
						}
					
					
					}
			   ajaxObject.open("GET",url, true);
			   ajaxObject.send();	
					}
				};

			};
/*AJAX ends*/

var GAME = function(){
	this.GAMEREADY = false;
	this.PUZZLESERVED = false;
	this.PUZZLESERVED = null;
	this.puzzleBank = ['oby','tthwema','glogoe','teloh','ernnit','tobthac','potlap','ptscrivaja','aavj','yglonotehc','oofaeckb'];
	this.answerBank = ['boy','matthew','google','hotel','intern','chatbot','laptop','javascript','java','technology','facebook'];
	
	this.startGame = function(){
		MODE = "Game";
		reply("<strong>MattBot Game</strong><br/> "+"Hey <strong>"+USER+"</strong> , you really want to play my game, Ok, i have got this <strong>Word Game</strong> for you.");
		slowReply("This is how it works, I'll give you scrabbled letters, and let's see how many words you can make out of it.",3000);
		slowReply("Ready huh???",3000);
		slowReply("Reply with <strong class=\"command\">ready:</strong> if you are ready to play",3000);
		clearStatusIn(8000);
		}
	
	this.proceed = function(message){
		if(message == 'gameoff:'){
					this.endGame();
					setMode('Chat');
		}
		else if(this.isON() && this.isReady() && this.puzzleServed()){
			this.checkAnswer(message)
		}
		else if(this.isON() && this.isReady()){
			if(isNaN(parseInt(message))){
				reply("Invalid response");
			}
			else{
				reply("You chose the number <strong>"+(message)+"</strong>");
				var puzzleIndex = parseInt(message);
				this.PUZZLESERVED = puzzleIndex;
				reply("For your chosen number, your puzzle world is <strong>"+this.puzzleBank[puzzleIndex]+"</strong>, rearrange the letters to get the correct world");
			}
		}
		
		else if(this.isON()){
			if(message == 'ready:'){
				this.GAMEREADY = true;
				reply("You are now set for the game,reply with a number from 0 to "+(this.puzzleBank.length - 1)+" to select puzzle");
			}
			else{
				reply("Guess you are not ready for this game yet, you can quit the game mode by reply <strong class=\"command\">gameoff:</strong>");
			}
		}
		else{
			reply("I don't understand that, we are currently in Game Mode, maybe when you leave game mode with the command <strong class=\"command\">gameoff:</strong>, i'll understand");
			reply("But for now, i'm enjoying this word game with you <strong>"+USER+"</strong>");
		}
	}
	
	this.checkAnswer = function(answer){
		if(this.answerBank[this.PUZZLESERVED] == answer){
			reply("Yeah! <strong>"+USER+"</strong> that was correct, <strong>"+this.answerBank[this.PUZZLESERVED]+"</strong> is the correct arrangement for <strong>"+this.puzzleBank[this.PUZZLESERVED]+"</strong>");
			reply("Reply with another number from 0 to "+(this.puzzleBank.length - 1)+" to select another puzzle or <strong class=\"command\">gameoff:</strong> to quit playing");
			this.PUZZLESERVED = null;
		}
		else{
			reply("No <strong>"+USER+"</strong>, <strong>"+answer+"</strong> is not the correct arrangement for <strong>"+this.puzzleBank[this.PUZZLESERVED]+"</strong>");
			reply("Try again");
		}
	}
	this.endGame = function(){
		if(!this.isON()){
			slowReply("Common <strong>"+USER+"!</strong>, Game mode was never on before, reply with <strong class=\"command\">GAMEON</strong> to turn game mode on",3000);
			clearStatusIn(2000);
		}
		else{
			this.GAMEREADY = false;
			this.PUZZLESERVED = false;
			this.PUZZLESERVED = '';
			reply("Game turned off!");
			slowReply("So you want some serious talk?",3000);
			slowReply("Let's talk!",3000);
			slowReply("What's on your mind",3000);
			setMode('Chat');
			clearStatusIn(8000);
		}
	}
	
	this.isON = function(){
		return (MODE == 'Game' ? true : false);
	}

	this.isReady = function(){
		return this.GAMEREADY;
	}
	this.puzzleServed = function(){
		return (this.PUZZLESERVED == null ? false : true );
	}
}
/*Game Mode*/


/*Game Mode ends*/

/*Chat Bot non-server brain */
			var chatForm = document.querySelector('form#chat-msg');
			var game = new GAME();
			chatForm.addEventListener('submit',function(event){
				event.preventDefault();
				var message = document.querySelector("input#message-input").value;
				if(message !== ''){ //if message is not empty
				send(message);
				clearMessage();
				
				if(message.substring(0,5) == 'name:'){ //telling the bot user name
						if(USER == ''){
						USER = message.substring(5);
						reply("Nice to meet you <strong>"+ USER+"</strong>");
						}
						else{//if name was already mentioned, change the user name
						var newName = message.substring(5);
						reply("Hmmm...you earlier mentioned that your name was <strong>"+ USER+"</strong>, and now you're mentioning <strong>"+newName+"</strong>");
						reply("Anyways, I have changed your name in my brain to <strong>"+newName+"</strong>");
						status("Name changed from <strong>"+USER+"</strong> to <strong>"+newName+"</strong>");
						USER = newName;
						}
					}
					else if(message == 'aboutbot'){
						status("About MattBot");
						reply("<strong>About MattBot</strong><ul><li>Bot Version: 1.0.0</li><li>Designed and Built by : Adedayo Matthews</li><li>Slack username on hnginternship4.slack.com : Matt</li></ul>");
					}
					else if(message == 'commands:'){
						reply("So great to have you want to learn about my commands");
						slowReply("You have first learnt the <strong class=\"command\">commands:</strong> command, other commands include",3000);
						slowReply("<ul><li><strong class=\"command\">aboutbot</strong> to know abot MattBot</li><li><strong class=\"command\">train: #question #answer #password</strong> to train me to answer a particular question</li><li><strong class=\"command\">gameon:</strong> to play word game with me</li><li><strong class=\"command\">gameoff:</strong> to quit playing word game with me</li></ul>",3000);
						clearStatusIn(5000);
					}
					else if(message.substring(0,6) == 'train:'){ //training the bot
						reply("Yay! I love to train!");
						var train = message.substring(6).split('#'); //Split the command to qustion,answer and password.
						status("Processing your training, just a moment...");
							//var url = "https://hng.fun/profiles/Matt.php?send_chat=send&q="+train[1]+"&a="+train[2]+"&p="+train[3];
							var url = "profiles/Matt.php?send_chat=send&q="+train[1]+"&a="+train[2]+"&p="+train[3];
								var ajax = new AJAX(url);
								ajax.load(function(responseCode,responseText){
									if(responseCode == 204){
										reply(responseText);
										status("");
									}
								});						
					}
					else{
						if(game.isON()){//In game mode
							game.proceed(message);
						}
						// for other messagess
						else{
							switch(message){
							case 'gameon:': //command GAMEON
								setMode('Game');
								game.startGame();
							break;
							case 'gameoff:':
								game.endGame();
							break;
							default: //Any other message will be processed with PHP script
								//var url = "https://hng.fun/profiles/Matt.php?send_chat=send&message="+message;
								var url = "profiles/Matt.php?send_chat=send&message="+message;
								var ajax = new AJAX(url);
								status("MattBot is typing...");
								ajax.load(function(responseCode,responseText){
									if(responseCode == 204){
										reply(responseText);
										status("");
									}
								});
							break;
							}
						}
					}

				}
				else{
					if(GAME == true){
					reply("<strong>"+USER+"</strong> Seems like you don't want to play, reply with GAMEOFF to stop playing");
					}else{
					reply("<strong>"+USER+"</strong> You are sending me an empty message, let's talk!");
					}
				}
				document.querySelector('#bot-mode').innerHTML = MODE;
			});

/**Chat Bot non-server brain **/
			CHATS = document.querySelector('#chats');
			function openChat(){
				document.querySelector('#chat-container').setAttribute('data-bot-active','true');
					if(RETURNING == false){
					slowReply("Hey there, I am MattBot, can i meet you? If you don't mind, reply your name with this command <br/> <strong class=\"command\">name:your name</strong>",2000);
					slowReply("You can play word game here, check out how by replying with <strong class=\"command\">commands:</strong> and to see other cool stuffs i can do",2000);
					slowReply("You should also know something about me <strong>I am case sensitive</strong>",2000);
					clearStatusIn(3000);
					}
					else{
					reply("Welcome back, I missed you already within that few seconds you closed our chat?");
					if(USER == ""){
						slowReply("You still haven't told me your name",3000);
						clearStatusIn(2000);
					}
					else{
						slowReply("Do i still remember your name?",3000);
						slowReply("....",3000);
						slowReply("Of course YES!, just messing with you.",3000);
						slowReply("<strong>"+USER+"</strong>",3000);
						clearStatusIn(11000);
					}
					slowReply("Forgotten my commands? just reply me with <strong class=\"command\">commands:</strong> and I'll teach you again, I'm very nice",3000);
					clearStatusIn(200);
				}
			}
			
			function closeChat(){
				document.querySelector('#chat-container').setAttribute('data-bot-active','false');
				RETURNING = true;
			}
			function clearChats(){
				CLEAREDCHATS = document.querySelector('#chats').innerHTML; //save up the chats for restoration
				document.querySelector('#chats').innerHTML = '';
			}
			function status(msg){
				document.querySelector('#chat-log').innerHTML = msg;
			}
			function clearStatusIn(sec){
				setTimeout(function(){status("")},sec);
			}

			function reply(msg){
				CHATS.innerHTML += "<div class=\"outgoing-chat\"><div class=\"messenger-name\">MattBot</div>"+msg+"</div>";
				inputFocus();
				scrollDown();
				//document.querySelector('#chat-container').scrollBy(100,100);
			}
			function slowReply(msg,sec){
				status("MattBot is typing...");
				setTimeout(function(){
					CHATS.innerHTML += "<div class=\"outgoing-chat\"><div class=\"messenger-name\">MattBot</div>"+msg+"</div>";
					scrollDown();
					},sec);
					inputFocus();
				//document.querySelector('#chat-container').scrollBy(100,100);
			}
			
			function send(msg){
				CHATS.innerHTML += "<div class=\"incoming-chat\"><div class=\"messenger-name\">"+(USER != '' ? USER : 'You')+"</div>"+msg+"</div>";
				inputFocus();
				scrollDown();
				//document.querySelector('#chat-container').scrollBy(100,100);
			}
			function clearMessage(){
				document.querySelector("input#message-input").value = "";
			}
			function restoreChats(){
				if(CLEAREDCHATS != ""){
					var currentChats = document.querySelector('#chats').innerHTML;
					document.querySelector('#chats').innerHTML = CLEAREDCHATS + currentChats;
					scrollDown();
					return true;
				}
				else{
					return false;
				}
			}
			function setMode(mode){
				MODE = mode;
			}
			function scrollDown(){
			  document.querySelector('#chat-area').scrollBy(0,document.querySelector('#chats').clientHeight);
			}
			function inputFocus(){
				document.querySelector("input#message-input").focus();
			}
				var chatToggler = document.querySelector('#chat-toggler');
				chatToggler.addEventListener('click', function(event){
					if(chatToggler.getAttribute('data-chat-role') == 'open'){
					openChat();
					chatToggler.innerHTML = "Close Chat";
					chatToggler.setAttribute('data-chat-role','close');						
					}
					else if(chatToggler.getAttribute('data-chat-role') == 'close'){
					closeChat();
					chatToggler.innerHTML = "Open Chat Again";
					chatToggler.setAttribute('data-chat-role','open');
					}
				});
				
				var chatManager = document.querySelector('#manage-chat');
				chatManager.addEventListener('click', function(event){
					if(chatManager.getAttribute('data-chat-role') == 'clear'){
						clearChats();
						var msg = (USER == "" ? "" : "Hey <strong>"+USER+"</strong>")+" You just cleared our chats, I hope no problem, you can restore our chats though down there";
						reply(msg);
						chatManager.setAttribute('data-chat-role','restore');
						chatManager.innerHTML = 'Restore Chats';
						status("chats cleared");
					}
					else if(chatManager.getAttribute('data-chat-role') == 'restore'){
						var msg = (USER == "" ? "" : "Hey <strong>"+USER+"</strong>");
						if(restoreChats()){
							msg += " So glad to have you back, our chat have been restored back, YAY!";
								status("chats restored");
						}else{
							msg += " We never had any chat before, so there is no chat to retore";
						}
						reply(msg);
						chatManager.setAttribute('data-chat-role','clear');
						chatManager.innerHTML = " &times Clear Chats";
					}
				});
		</script>
	</body>
</html>