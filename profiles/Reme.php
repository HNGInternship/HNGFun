<?php
<<<<<<< HEAD

$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;
//echo $secret_word;

$result2 = $conn->query("Select * from interns_data where username = 'Reme'");
$user = $result2->fetch(PDO::FETCH_OBJ);

//echo $user->name;
?>
<style class="cp-pen-styles">
body {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: #27ae60;
  font-family: "proxima-nova", "Source Sans Pro", sans-serif;
  font-size: 1em;
  letter-spacing: 0.1px;
  color: #32465a;
  text-rendering: optimizeLegibility;
  text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
  -webkit-font-smoothing: antialiased;
}

.navbar{
  padding: 0 16px 0 50px !important;
  width: 100%;
}

footer{
  width: 100%;
}

#frame {
  width: 95%;
  min-width: 360px;
  max-width: 1000px;
  height: 92vh;
  min-height: 300px;
  max-height: 720px;
  background: #E6EAEA;
  margin: 10% auto;
}
@media screen and (max-width: 360px) {
  #frame {
    width: 100%;
    height: 100vh;
  }
}
#frame #sidepanel {
  float: left;
  min-width: 280px;
  max-width: 340px;
  width: 40%;
  height: 100%;
  background: #2c3e50;
  color: #f5f5f5;
  overflow: hidden;
  position: relative;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel {
    width: 58px;
    min-width: 58px;
  }
}
#frame #sidepanel #profile {
  width: 80%;
  margin: 25px auto;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile {
    width: 100%;
    margin: 0 auto;
    padding: 5px 0 0 0;
    background: #32465a;
  }
}

#frame #sidepanel #profile .wrap {
  height: 100px;
  line-height: 60px;
  overflow: hidden;
  -moz-transition: 0.3s height ease;
  -o-transition: 0.3s height ease;
  -webkit-transition: 0.3s height ease;
  transition: 0.3s height ease;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap {
    height: 55px;
  }
}
#frame #sidepanel #profile .wrap img {
  width: 80px;
  padding: 3px;
 /* border: 2px solid #e74c3c;*/
  height: auto;
  float: left;
  cursor: pointer;
  -moz-transition: 0.3s border ease;
  -o-transition: 0.3s border ease;
  -webkit-transition: 0.3s border ease;
  transition: 0.3s border ease;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #profile .wrap img {
    width: 40px;
    margin-left: 4px;
  }
}

#frame #sidepanel #contacts {
  height: calc(100% - 177px);
  overflow-y: scroll;
  overflow-x: hidden;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #contacts {
    height: calc(100% - 149px);
    overflow-y: scroll;
    overflow-x: hidden;
  }
  #frame #sidepanel #contacts::-webkit-scrollbar {
    display: none;
  }
}

@media screen and (max-width: 735px) {
  #frame #sidepanel #contacts ul li.contact {
    padding: 6px 0 46px 8px;
  }
}
#frame #sidepanel #contacts ul li.contact:hover {
  background: #32465a;
}
#frame #sidepanel #contacts ul li.contact.active {
  background: #32465a;
  border-right: 5px solid #435f7a;
}
#frame #sidepanel #contacts ul li.contact.active span.contact-status {
  border: 2px solid #32465a !important;
}
#frame #sidepanel #contacts ul li.contact {
  padding: 10px 2px;
}
@media screen and (max-width: 735px) {
  #frame #sidepanel #contacts ul li.contact{
    width: 100%;
  }
}
#frame .content {
  float: right;
  width: 60%;
  height: 100%;
  overflow: hidden;
  position: relative;
}
@media screen and (max-width: 735px) {
  #frame .content {
    width: calc(100% - 58px);
    min-width: 300px !important;
  }
}
@media screen and (min-width: 900px) {
  #frame .content {
    width: calc(100% - 340px);
  }
}
#frame .content .contact-profile {
  width: 100%;
  height: 60px;
  line-height: 60px;
  background: #f5f5f5;
}
#frame .content .contact-profile img {
  width: 40px;
  border-radius: 50%;
  float: left;
  margin: 9px 12px 0 9px;
}
#frame .content .contact-profile p {
  float: left;
}
#frame .content .contact-profile .social-media {
  float: right;
}
#frame .content .contact-profile .social-media i {
  margin-left: 14px;
  cursor: pointer;
}
#frame .content .contact-profile .social-media i:nth-last-child(1) {
  margin-right: 20px;
}
#frame .content .contact-profile .social-media i:hover {
  color: #435f7a;
}
#frame .content .messages {
  height: auto;
  min-height: calc(100% - 93px);
  max-height: calc(100% - 93px);
  overflow-y: scroll;
  overflow-x: hidden;
}
@media screen and (max-width: 735px) {
  #frame .content .messages {
    max-height: calc(100% - 105px);
  }
}
#frame .content .messages::-webkit-scrollbar {
  width: 8px;
  background: transparent;
}
#frame .content .messages::-webkit-scrollbar-thumb {
  background-color: rgba(0, 0, 0, 0.3);
}
#frame .content .messages ul li {
  display: inline-block;
  clear: both;
  float: left;
  margin: 15px 15px 5px 15px;
  width: calc(100% - 25px);
  font-size: 0.9em;
}
#frame .content .messages ul li:nth-last-child(1) {
  margin-bottom: 20px;
}
#frame .content .messages ul li.sent img {
  margin: 6px 8px 0 0;
}
#frame .content .messages ul li.sent p {
  background: #435f7a;
  color: #f5f5f5;
}
#frame .content .messages ul li.replies img {
  float: right;
  margin: 6px 0 0 8px;
}
#frame .content .messages ul li.replies p {
  background: #f5f5f5;
  float: right;
}
#frame .content .messages ul li img {
  width: 22px;
  border-radius: 50%;
  float: left;
}
#frame .content .messages ul li p {
  display: inline-block;
  padding: 10px 15px;
  border-radius: 20px;
  max-width: 205px;
  line-height: 130%;
}
@media screen and (min-width: 735px) {
  #frame .content .messages ul li p {
    max-width: 300px;
  }
}
#frame .content .message-input {
  position: absolute;
  bottom: 0;
  width: 100%;
  z-index: 99;
}
#frame .content .message-input .wrap {
  position: relative;
}
#frame .content .message-input .wrap input {
  font-family: "proxima-nova",  "Source Sans Pro", sans-serif;
  float: left;
  border: none;
  width: calc(100% - 90px);
  padding: 11px 32px 10px 8px;
  font-size: 0.8em;
  color: #32465a;
}
@media screen and (max-width: 735px) {
  #frame .content .message-input .wrap input {
    padding: 15px 32px 16px 8px;
  }
}
#frame .content .message-input .wrap input:focus {
  outline: none;
}
#frame .content .message-input .wrap .attachment {
  position: absolute;
  right: 60px;
  z-index: 4;
  margin-top: 10px;
  font-size: 1.1em;
  color: #435f7a;
  opacity: .5;
  cursor: pointer;
}
@media screen and (max-width: 735px) {
  #frame .content .message-input .wrap .attachment {
    margin-top: 17px;
    right: 65px;
  }
}
#frame .content .message-input .wrap .attachment:hover {
  opacity: 1;
}
#frame .content .message-input .wrap button {
  float: right;
  border: none;
  width: 50px;
  padding: 12px 0;
  cursor: pointer;
  background: #32465a;
  color: #f5f5f5;
}
@media screen and (max-width: 735px) {
  #frame .content .message-input .wrap button {
    padding: 16px 0;
  }
}
#frame .content .message-input .wrap button:hover {
  background: #435f7a;
}
#frame .content .message-input .wrap button:focus {
  outline: none;
}
/*fixed the footer position online*/
</style>


<div id="frame">
	<div id="sidepanel">
		<div id="profile">
			<div class="wrap">
				<?php echo '<img src="'.$user->image_filename.'" class="img-responsive" id="profile-img">'; ?>
				<p>Chat Bot</p>
				<!--<i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>-->
			</div>
		</div>
		
		<div id="contacts">
			<ul>
<li class="contact"><i class="fa fa-user"></i> <?php echo $user->name; ?></li>
<li class="contact"><i class="fa fa-slack"></i> @<?php echo $user->username; ?></li>
<li class="contact"><i class="fa fa-lock"></i> <?php echo $secret_word; ?></li>
            </ul>
                
		</div>
		
	</div>
	<div class="content">
		<div class="contact-profile">
			<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
			<p>Reme's Chatbot</p>
			<div class="social-media">
				<i class="fa fa-facebook" aria-hidden="true"></i>
				<i class="fa fa-twitter" aria-hidden="true"></i>
				 <i class="fa fa-instagram" aria-hidden="true"></i>
			</div>
		</div>
		<div class="messages">
			<ul>
            <li class="replies">
					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
					<p>Welcome!</p>
				</li>
				<li class="replies">
					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
					<p>Search a famous person or topic like you would on Google e.g "Christiano Ronaldo",  "Ngozi Iweala", "Edo people" </p>
				</li>
			</ul>
		</div>
		<div class="message-input">
			<div class="wrap">
			<input type="text" placeholder="Write your message..." />
			<i class="fa fa-paperclip attachment" aria-hidden="true"></i>
			<button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
			</div>
		</div>
	</div>
</div>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script >$(".messages").animate({ scrollTop: $(document).height() }, "fast");

$("#profile-img").click(function() {
	$("#status-options").toggleClass("active");
});

$(".expand-button").click(function() {
  $("#profile").toggleClass("expanded");
	$("#contacts").toggleClass("expanded");
});



function newMessage() {
	message = $(".message-input input").val();
	if($.trim(message) == '') {
		return false;
	}
	$('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
	$('.message-input input').val(null);
	$('.contact.active .preview').html('<span>You: </span>' + message);
	$(".messages").animate({ scrollTop: $(document).height() }, "fast");
};

$('.submit').click(function() {
  newMessage();
});

$(window).on('keydown', function(e) {
  if (e.which == 13) {
    newMessage();
    return false;
  }
});
//# sourceURL=pen.js
</script>

=======
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
>>>>>>> 79349ab158576c0c603d15d180c4484b10aad440
