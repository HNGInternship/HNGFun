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
					<img src="http://gravatar.com/avatar/2c0ad52fc5943b78d6abe069cc08f320?s=32" alt="" width="32" height="32">
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
<html lang ="en-US"> 
<head>
    <title>Tonistacks Profile</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Federant" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Galada" rel="stylesheet">
    <link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v4.2.0/default/css/alta/oj-alta-min.css" type="text/css"/>

    <style>

    .card {
    /* Add shadows to create the "card" effect */
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.container {
    padding: 2px 16px;
}

       .header-top{
           height: 500px;
           background-color: #0A356F;

       }

          /* Custom, iPhone Retina */ 
    @media only screen and (min-width : 320px) {
        .header-top{
            height: 400px;
        }
}

/* Extra Small Devices, Phones */ 
@media only screen and (min-width : 480px) {
    .header-top{
            height: 400px;
        }
}

/* Small Devices, Tablets */
@media only screen and (min-width : 768px) {
    .header-top{
            height: 480px;
        }
}



       .top-5{
        margin-top: 5rem!important;
       }

       
       .full-bio{
        position: absolute;
        width: 80%;
        /* margin-top: 10rem; */
        text-align: center;
       }
       

       .profile img{
           height: 200px ;
           width: 200px ;
           border: 6px solid rgba(0, 0, 0, 0.4);
       }

                /* Custom, iPhone Retina */ 
        @media only screen and (min-width : 320px) {
            .profile img {
        height: 120px;
        width: 120px ;
    }
}
       .full-name {
        font-family: Federant;
        font-style: normal;
        font-weight: normal;
        line-height: normal;
        font-size: 50px;
        color: #FFFFFF;
     }


        @media only screen and (min-width : 320px) {
            .full-name {
           font-size: 25px;
    }
        }

     .ux{
        font-family: Didact Gothic;
        font-style: normal;
        font-weight: normal;
        line-height: normal;
        font-size: 25px;
        color: #FFFFFF;
     }
     .location{
        font-family: Galada;
        font-style: normal;
        font-weight: normal;
        line-height: normal;
        font-size: 20px;

        color: #FFFFFF;
     }
     .about{

     }

     .about p{
         padding: 5px;
     }

     .title{
        font-family: Franklin Gothic Medium;
        font-style: normal;
        font-weight: normal;
        line-height: normal;
        font-size: 30px;
        color: #000000;
        border-bottom: 0px dotted #000000;
        border-bottom-width: 6px;
        text-align: center;
     }
/***********************
CHAT CSS

**************/

/* .chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
}

.chat li.left .chat-body
{
    margin-left: 60px;
}

.chat li.right .chat-body
{
    margin-right: 60px;
}


.chat li .chat-body p
{
    margin: 0;
    color: #777777;
}

.panel .slidedown .glyphicon, .chat .glyphicon
{
    margin-right: 5px;
}

.panel-body
{
    overflow-y: scroll;
    height: 400px;
}

::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}

div.panel-heading#accordion {
    background-color: #007bff;
    text-align: center;
    color: white;
}

span.chat-img img {
    width: 100px !important;
    border-radius: 100%;
} */

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

<div class="container-fluid header-top">

<div class="full-bio">
<div class="d-flex justify-content-center top-5">
                    <img src="http://res.cloudinary.com/tonistack/image/upload/c_scale,h_150,w_150/v1526118744/32186506_190330148270134_8580498699174543360_n.jpg" class="rounded-circle w-25 h-25 img-fluid profile">              
                </div>


   <h1 class="full-name">Mcdonald Aladi </h1>

<div class="ux">Frontend Developer, UI & UX Developer</div>
 <div class="location"> <i class="fa fa-map-marker-alt"></i> Lagos,Nigeria</div>

</div>

</div>


<div class="container-fluid mt-5 card">
<div class="title">About Me</div>
<div class="about ">
<p> A UI and UX designer with an eye for design, development and a strong desire to learn and create.</p>
<p>I firmly believe in life long learning and I'm constantly exploring new ideas and technologies. MOOC's have enabled me to update my skills and keep abreast of the latest trends in design and coding.</p>
</div>

</div>

<!-- <div class="top-5">
    <div class="d-flex justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading" id="accordion">
                    <span class="glyphicon glyphicon-comment"><i class="fa fa-comment"></i></span> Chat
                    <div class="btn-group pull-right">
                        <a type="button" class="btn btn-primary btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <span>  </span>
                        </a>
                    </div>
                </div>
            <div class="panel-collapse collapse show" id="collapseOne">
                <div class="panel-body">
                    <ul class="chat">
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>15 mins ago</small>
                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <form action="profiles/tonistack.php"  method="post">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <!-- <button class="btn btn-warning btn-sm" id="btn-chat">
                                Send</button> -->
                                <!-- <input class="btn btn-warning btn-sm"  id="btn-chat" type="submit" value="Submit">
                        </span>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>  -->

<div class="top-5" id="chat-box">	
		<header class="clearfix" onclick="change()">
			<h4>Online...</h4>
		</header>
		<div class="chat hide" id="chat">
			<div class="chatlogs" id="chatlogs">
				<div class="chat bot chat-message">
					<img src="http://gravatar.com/avatar/2c0ad52fc5943b78d6abe069cc08f320?s=32" alt="" width="32" height="32">
					<div class="chat-message-content clearfix">
						<p>Welcome.</p>
						<span class="chat-time"> </span>
					</div> 
				</div>
				<div class="chat bot chat-message">
					<img src="http://gravatar.com/avatar/2c0ad52fc5943b78d6abe069cc08f320?s=32" alt="" width="32" height="32">
					<div class="chat-message-content clearfix">
						<p>I am here to help you.</p>
						<span class="chat-time"></span>
					</div> 
				</div>
				<div class="chat bot chat-message">
					<img src="http://gravatar.com/avatar/2c0ad52fc5943b78d6abe069cc08f320?s=32" alt="" width="32" height="32">
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
					<img src="http://gravatar.com/avatar/2c0ad52fc5943b78d6abe069cc08f320?s=32" alt="" width="32" height="32">
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


</html