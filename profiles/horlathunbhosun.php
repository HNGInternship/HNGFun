<?php


 session_start();
 require('answers.php');
if(!defined('DB_USER')){
  require "../../config.php";
	// require_once ('../db.php');
}


global $conn;



  $query = $conn->query("SELECT * FROM secret_word");
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $secret_word = $result['secret_word'];


    $result2 = $conn->query("SELECT * FROM interns_data WHERE  username = 'horlathunbhosun'");
    $user = $result2->fetch(PDO::FETCH_OBJ);
   // $user = $result2->fetch();
   
    
 
 if(isset($_POST['message']))
    {
                    array_push($_SESSION['chat_history'], trim($_POST['message']));
                    if(stripos(trim($_POST['message']), "train") === 0)
        {
          
         $args = explode("#", trim($_POST['message']));
          $question = trim($args[1]);
          $answer = trim($args[2]);
          $password = trim($args[3]);
          if($password == "password")
          {
              // Password perfect
            $trainQuery = $conn->prepare("INSERT INTO chat_bot (question , answer) VALUES ( :question, :answer)");
            if($trainQuery->execute(array(':question' => $question, ':answer' => $answer)))
            {
                array_push($_SESSION['chat_history'], "That works! okay continue chatting");
            }
            else
            {
                array_push($_SESSION['chat_history'], "Something went wrong somewhere");
            }
          }
          else
          {
              // Password not correct
             array_push($_SESSION['chat_history'], "The password entered was incorrect");
          }
        }
        else
        {
            // Not Training
          $questionQuery = $conn->prepare("SELECT * FROM chat_bot WHERE question LIKE :question");
          $questionQuery->execute(array(':question' => trim($_POST['message'])));
          $qaPairs = $questionQuery->fetchAll(PDO::FETCH_ASSOC);
          if(count($qaPairs) == 0)
          {
            
            $answer = "Sorry, I cant understand your question";

          } 
          else
          {
            $answer = $qaPairs[mt_rand(0, count($qaPairs) - 1)]['answer'];
            $bracketIndex = 0;
            while(stripos($answer, "{{", $bracketIndex) !== false)
            {
              $bracketIndex = stripos($answer, "{{", $bracketIndex);
              $endIndex = stripos($answer, "}}", $bracketIndex);
              $bracketIndex++;
                  $function_name = substr($answer, $bracketIndex + 1, $endIndex - $bracketIndex -1);
                  $answer = str_replace("{{".$function_name."}}", call_user_func($function_name), $answer);
            }
          }
          array_push($_SESSION['chat_history'] , $answer);
        }
    }
    if(!isset($_SESSION['chat_history']))
    {
                $_SESSION['chat_history'] = array('Hello i am scoobydoo! How can I help? Ask for my help. To train me, enter the command "train # question # answer # password');
    }
    $messages = $_SESSION['chat_history'];
?>


















<!DOCTYPE html>
<html>
<head>
<title>	Horlathunbhosun</title>
<link rel="stylesheet" type="text/css" href="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://rawgit.com/tiarayuppy/chatscript/master/chatbot.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
 <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<style>
@import url('https://fonts.googleapis.com/css?family=Lato');

#boh1{
  text-align: center;
  font-family:'Lato', sans-serif;
  width: 300px;
}
body{

background: grey;
}
p {
  color: black;
  font-size: 20px;
}
.containerb{
  list-style-type: none;
  color: white;
  padding: 30px;
  padding-top: 200px;
  display: inline-flex;
  background: grey;
}

.contain{
  padding: 10px;
  margin: 50px;
  border-radius: 2px;
  margin-left: 80px;
}
.socialicons{
    text-align: justify;
    padding-top: 10px;
}


/****************************************chat Bot style ****************************/
.chatbox {
	width: 500px;
	min-width: 390px;
	height: 600px;
	background: #fff;
	padding: 25px;
	margin: 20px auto;
	box-shadow: 0 3px #ccc;
}

.chatlogs {
	padding: 10px;
	width: 100%;
	height: 450px;
	overflow-x: hidden;
	overflow-y: scroll;
}

.chatlogs::-webkit-scrollbar {
	width: 10px;
}

.chatlogs::-webkit-scrollbar-thumb {
	border-radius: 5px;
	background: rgba(0,0,0,.1);
}

.chat {
	display: flex;
	flex-flow: row wrap;
	align-items: flex-start;
	margin-bottom: 10px;
}


/*.chat .user-photo {
	width: 60px;
	height: 60px;
	background: #ccc;
	border-radius: 50%;
	 content:url('http://res.cloudinary.com/horlathunbhosun/image/upload/v1524247081/avatar.png');
}


.chat .user-friend {
	width: 60px;
	height: 60px;
	background: #ccc;
	border-radius: 50%;
	 content:url('http://res.cloudinary.com/horlathunbhosun/image/upload/v1524247081/avatar-user-coder-3579ca3abc3fd60f-512x512.png');
}*/

.chat .chat-message {
	width: 80%;
	padding: 15px;
	margin: 5px 10px 0;
	border-radius: 10px;
	color: #fff;
	font-size: 20px;
}

.friend .chat-message {
	background: #1adda4;
}

.self .chat-message {
	background: #1ddced;
	order: -1;
}

.chat-form {
	margin-top: 20px;
	display: flex;
	align-items: flex-start;
}

.chat-form textarea {
	background: #fbfbfb;
	width: 75%;
	height: 50px;
	border: 2px solid #eee;
	border-radius: 3px;
	resize: none;
	padding: 10px;
	font-size: 18px;
	color: #333;
}

.chat-form textarea:focus {
	background: #fff;
}

.chat-form button {
	background: #1ddced;
	padding: 5px 15px;
	font-size: 30px;
	color: #fff;
	border: none;
	margin: 0 10px;
	border-radius: 3px;
	box-shadow: 0 3px 0 #0eb2c1;
	cursor: pointer;

	-webkit-transaction: background .2s ease;
	-moz-transaction: backgroud .2s ease;
	-o-transaction: backgroud .2s ease;
}

.chat-form button:hover {
	background: #13c8d9;
}



</style>
</head>










<div class="container" style="padding-top: 100px;">
		<div class="row">	
	<div class="col-md-6" >
		<div class="chatbox" id="boh1" style="height: 700px;">
			<img src="<?php echo $user->image_filename; ?>" alt="2boh" width= "300px" height="300px" class="img-circle">
					<h1 style="color: black;"><?php echo  $user->name; ?></h1>
					<p style=" font-size: 30px;">(<?php echo $user->username; ?>) </p>
							<p>	(Web Developer)</p>
						<p>I love tech stuff and cools things</p>
						 <h6 style="font-size: 20px;"><b>Skills:</b>PHP(Code Igniter, Laravel)</h6>
						<a href="https://github.com/horlathunbhosun" target="_blank" style="color: black;" class="btn btn-success"><i class="fa fa-github"></i> Github</a>
						<a href="https://twitter.com/@horlathunbhosun" target="_blank" style="color: black;" class="btn btn-info"><i class="fa fa-twitter"></i> Twitter</a>
						<a href="https://www.linkedin.com/in/olulode-olatunbosun-458927135/" target="_blank" style="color: black;" class="btn btn-warning"><i class="fa fa-linkedin"></i> Linkedin</a>
						<a href="https://web.facebook.com/olaolulode" target="_blank" style="color: black;" class="btn btn-primary"><i class="fa fa-facebook"></i>Facebook</a>
						
			</div>
				</div>
			<div class="col-md-6">	
				<!-- http://localhost/HNGFun/profiles/horlathunbhosun.php -->
			<!-- localhost/Hprofile.php?id=horlathunbhosun	 -->
			<div class="chatbox">
					<h5 style="font-size: 30px;"><center><span class="">Hi, My name is scoobydoo.</span></center>
	</h5>
				<div class="chatlogs">
					
             <div class="chat friend">
				 <?php for($index = 0; $index < count($messages); $index++ ) :?>
				<div class="user-photo <?= ($index % 2 == 0) ? "recieved-message-ctn" : "input-ctn"  ?> "></div>
				<p class="chat-message <?= ($index % 2 == 0) ? "recieved-message" : "input"  ?>"><?= $messages[$index] ?></p>	
				 <?php endfor; ?>

			</div>
			
			<div class="chat self">
				
				<div class="user-friend"></div>
				<!-- <p class="chat-message">What's up ..!!</p>	 -->
			</div>
			
			
		</div>
		<!-- /profile.php?id=horlathunbhosun.php -->

		<form action="/profile.php?id=horlathunbhosun" method="POST" >	

		<div class="chat-form">
			<textarea placeholder="Ask/Train me.." name="message"></textarea>
			<button class="send-query" value="ask Me question">Send</button>
		</div>
	</div>
	</form>

</div>

		
		</div>
	</div>	
</body>
</html>
<script type="text/javascript">
<script>
    var sampleConversation = [
        "Hi",
        "My name is [name]",
        "Where is Hotels.ng?",
        "Where is  Nigeria",
        "Bye",
        "What is the time"
        
    ];
    var config = {
        botName: 'Horlathunbhosun',
        inputs: '#humanInput',
        inputCapabilityListing: true,
        engines: [ChatBot.Engines.duckduckgo()],
        addChatEntryCallback: function(entryDiv, text, origin) {
            entryDiv.delay(200).slideDown();
        }
    };
    ChatBot.init(config);
    ChatBot.setBotName("Horlathunbhosun");
    ChatBot.addPattern("^hi$", "response", "Hello, friend", undefined, "Say 'Hi' to be greeted back.");
    ChatBot.addPattern("^What is the time$", "response", "The Time is getTime()", undefined, "Say 'What is the time' to be greeted back.");
    ChatBot.addPattern("^bye$", "response", "See you later...", undefined, "Say 'Bye' to end the conversation.");
    ChatBot.addPattern("(?:my name is|I'm|I am) (.*)", "response", "hi $1, thanks for talking to me today", function (matches) {
        ChatBot.setHumanName(matches[1]);
    },"Say 'My name is [your name]' or 'I am [name]' to be called that by the bot");
    ChatBot.addPattern("(what is the )?meaning of life", "response", "42", undefined, "Say 'What is the meaning of life' to get the answer.");
    ChatBot.addPattern("compute ([0-9]+) plus ([0-9]+)", "response", undefined, function (matches) {
        ChatBot.addChatEntry("That would be "+(1*matches[1]+1*matches[2])+".","bot");
    },"Say 'compute [number] plus [number]' to make the bot your math calculator");
</script>  

<script>
    
  $(function(){
$("#addClass").click(function () {
          $('#qnimate').addClass('popup-box-on');
            });
          
            $("#removeClass").click(function () {
          $('#qnimate').removeClass('popup-box-on');
            });
  })
</script>
