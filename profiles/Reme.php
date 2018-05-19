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
					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" width="32" height="32">
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

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v4.2.0/default/css/alta/oj-alta-min.css" type="text/css"/>
	<title>Portfolio | Olohireme</title>
	<style type="text/css">
	 @import url('https://fonts.googleapis.com/css?family=Montserrat');
	
  body{

  }
	#name-div::after{
		 content: "";
   opacity: 0.35;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  position: absolute;
  z-index: -1;  
   background-repeat: no-repeat;
    background-position: 50% 0;
    -ms-background-size: cover;
    -o-background-size: cover;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    background-size: cover;
		height: 100vh;
				
				background-image: url(http://res.cloudinary.com/olohiremeajayi/image/upload/v1526558097/laptop-1512838_1280.png);
				/*opacity: 50%;*/
	}
			#name-div{
				
				font-family: "Montserrat" Monospace;
				font-weight: 500;
				align-items: bottom;
			}
			#about-div, #name-div, #abt-me-div{
				height: 100vh;
			}
			#name-div h1, #name-div h4{position: absolute;}
			#name-div h1{
				/*margin-top: 300px;*/
				text-align: right;
				font-size: 72px;
				font-family: "Lori";
				align-items: bottom;
				position: absolute;
				bottom: 10%;
				right: 10%;
			}
			#name-div h4{
				font-family: "Muli";
				font-size: 20px;
				position: absolute;
				bottom: 9%;
				bottom: 7%;
				right: 10%;
			}
		#about-div
  {
    background-color: #ffffff;
  }
		#abt-me-div{
			width: 100%;
			height: auto;
			margin:  70px auto;
			margin-bottom: 70px;
			padding: 100px 100px 0px 100px;
      background-color: #ffffff;
		}
		#about-me{
			width:400px ;
			min-height: 400px;
			border-radius: 50%;
			background-color: #2c3e50;
      color: white;
			align-items: center;
			margin-left: -20px;
		}
		#about-me p{
			margin: 30px 22px 20px 22px;
			font-size: 20px;
		}
		#pic{
			background-image: url();
			height: 300px;
      width: 300px;
		/*	margin-top: 50px;
			margin-left: -20px;*/
		}
		#pic img{
			border-radius: 50%;
		}
		#contact{
			display: inline-block;
			background-color: #e4e4e4;
			padding:10px 0;
			width: 30%;
			font-size: 0.9em;
			border-radius: 20px;/*
			margin: 0 auto;*/
		}
		#contact,#contact a{
			text-decoration-line: none;
			text-align: center;
			display: block;
			vertical-align: middle;
      padding: 0 2px;
		}
		#social-media{
			margin-top: 80px;
			width: 50%;
		}
		
		#social-media ul{
			display:inline-flex;
			text-decoration: none;
			list-style: none;
		}
		#social-media ul li a{
			color:#e4e4e4;
                         font-size: 30px;
                         text-decoration: none;
                         transition: all 0.4s ease-in-out;
                         width: 400px;
                         height: 30px;
                         line-height: 50px;
                         text-align: center;
                         margin:20px 30px 0 -40px;
                         vertical-align: middle;
                         position: relative;
                         color:black;
		}
			fieldset {
			border: 0;
			margin: 0;
			padding: 0;
		}
				input {
			border: 0;
			color: inherit;
		    font-family: inherit;
		    font-size: 100%;
		    line-height: normal;
		    margin: 0;
		}
		p { margin: 0; }
		/* ---------- chat-box ---------- */
		#chat-box {
			bottom: 0;
			font-size: 12px;
			right: 24px;
			position: fixed;
			width: 300px;
		}
		#chat-box header {
			background: #293239;
			border-radius: 5px 5px 0 0;
			color: #fff;
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
			width: 234px;
		}
		header h4{
			color: #fff;
		}
		.chat {
			background: #fff;
					
		}
			.hide{
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
				
	</style>

</head>
<body>
 	<?php
	$data = $conn->query("SELECT * FROM  interns_data WHERE username = 'Reme' ");
	$my_data = $data->fetch(PDO::FETCH_BOTH);
	$name = $my_data['name'];
	$src = $my_data['image_filename'];
	$username =$my_data['username'];
?>
<div class="div1" align="center">
	<div class="ot oj-flex oj-flex-item oj-sm-only-flex-direction-column oj-md-only-flex-direction-column">
  
    <div id="name-div">
    <h1><?php echo $name;?></h1>
    <h4>Web Developer| Writer| B.Engr(In View)</h4>
</div>
  </div>
</div>
<div class="view" align="center">
	<div id="abt-me-div">
<div class="ot oj-flex oj-flex-item oj-sm-only-flex-direction-column oj-md-only-flex-direction-column" >
 <div class="oj-sm-flex-1 oj-xl-web-padding-top oj-sm-web-padding-bottom oj-md-down-web-padding-start oj-lg-padding-2x-start oj-sm-web-padding-end oj-xl-6 oj-flex-item ">
       <div id="pic" ><img onload="this.width/=(2.5);this.onload=null;" src= "<?php echo $src;?>"alt="<?php echo $name;?>"></div>
    
    </div>
    <div class="oj-sm-flex-2  oj-xl-web-padding-bottom  oj-md-down-web-padding-start oj-lg-down-web-padding-end oj-xl-padding-2x-end oj-xl-6 oj-flex-item">
  <div id="about-div">

  <div id="about-me">
    <div id="social-media">
        <ul>
        <li><a href="https://github.com/RemeAjayi"><i class="fa fa-github"></i></a></li>
        <li><a href="https://twitter.com/olohireme_ajayi"><i class="fa fa-twitter"></i></a></li>
        <li><a href="https://medium.com/@Olohireme"><i class="fa fa-medium"></i></a></li>
        <li><a href="https://www.instagram.com/remeajayi/"><i class="fa fa-instagram"></i></a></li>
                </ul>
      </div>
    <p>I am a self-taught, internally motivated person, and aspiring web developer. I have been building capacity with HTML, CSS, Bootstrap, Javascript and most recently Node.js. I want to create solutions in education and healthcare. <blockquote>"Stay Hungry. Stay Foolish" - <i>Steve Jobs</i></blockquote></p>
    <div id="contact" align="center"><a href="mailto:remeajayi@gmail.com">CONTACT</a></div>

      

                          
  </div>
 
</div>
</div>
    </div>
    </div>

</div>
<div id="chat-box">	
		<header class="clearfix" onclick="change()">
			<h4>Online...</h4>
		</header>
		<div class="chat hide" id="chat">
			<div class="chatlogs" id="chatlogs">
				<div class="chat bot chat-message">
					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" width="32" height="32">
					<div class="chat-message-content clearfix">
						<p>Welcome.</p>
						<span class="chat-time"> </span>
					</div> 
				</div>
				<div class="chat bot chat-message">
					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" width="32" height="32">
					<div class="chat-message-content clearfix">
						<p>I am here to help you.</p>
						<span class="chat-time"></span>
					</div> 
				</div>
				<div class="chat bot chat-message">
					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" width="32" height="32">
					<div class="chat-message-content clearfix">
						<p>You can ask me questions, and I will do my best to answer. You can train me to answer specific questions. Just make use of the format train: question # answer # password.</p>
						<span class="chat-time"></span>
					</div> 
				</div>

				
				 
				<div id="chat-content"></div>
				
			</div> <!-- end chat-history -->
			<form action="#" method="post" class="form-data">
				<fieldset>
					<input type="text" placeholder="Type your message…" name="question" id="question" autofocus>
					<input type="submit" name="bot-interface" value="SEND"/>
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
        xhttp.open('POST', 'profiles/Abigail.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('question='+ question.value);
        e.preventDefault();
		}
		function userChat(chats, reply){
			if(question.value !== ''){
				var chat = `<div class="chat user chat-message">
					<img src="http://emilcarlsson.se/assets/mikeross.png" alt="" width="32" height="32">
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