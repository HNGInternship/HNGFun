<?php
// If you can't find const DB_USER, this occurs when I'm testing locally or through hng.fun/profiles/adminral.php
		if(!defined('DB_USER')){
			require "../../config.php";
			//Renamed myconfig so as not to confuse with config.php in the main folder, remember to change this to config.php
			try {
			    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
			    
			} catch (PDOException $e) {
			    die("Could not connect to the database " . DB_DATABASE . ": " . $e->getMessage());
			}
		}
// Let's set up d profile first
if ($_SERVER['REQUEST_METHOD'] === "GET") {
	$query = $conn->query("Select * from secret_word LIMIT 1");
	$query = $query->fetch(PDO::FETCH_OBJ);
	$secret_word = $query->secret_word;

	$query_me = $conn->query("Select * from interns_data where username = 'admiral'");
	$user = $query_me->fetch(PDO::FETCH_OBJ);

}

// if we're sending a post message, i.e from the bot.
if($_SERVER['REQUEST_METHOD'] === "POST"){
	

		// let's start with some functions to simplify our work
		function stripquestion($question){
			// remove whitespace first
			$strippedquestion = trim(preg_replace("([\s+])", " ", $question));
			// now let's remove any other character asides :, (, ), ', and whitespace
			$strippedquestion = trim(preg_replace("/[^a-zA-Z0-9\s\'\-\:\(\)#]/", "", $strippedquestion));
			$strippedquestion = $strippedquestion;

			return strtolower($strippedquestion);
		}

		function is_training($data){
			$keyword = stripquestion($data);
			if ($keyword=='train') {
				return true;
			}else{
				return false;
			}
		}
		function authorize_training($password){
			if ($password=='password') {
				return true;
			}else{
				return false;
			}
		}
		function training_data($body){
			$array_data = explode('#', $body);
			// clean everything up
			foreach ($array_data as $key => $value) {
				$value = stripquestion($value);
			}
			return array('question' => $array_data[0], 'answer' => $array_data[1], 'password'=> $array_data[2]);
		}

		function train($question, $answer){
			global $conn;
			try {
				$insert_stmt = $conn->prepare("INSERT into chatbot (question, answer) values (:question, :answer)");
				$insert_stmt->bindParam(':question', $question);
				$insert_stmt->bindParam(':answer', $answer);
				$insert_stmt->execute();
				return "Thanks! The new information is mcuh appreciated.";
			} catch (PDOException $e) {
				return "An error occured: ". $e->getMessage();
			}

		}

		// set to debug mode
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		// Let's prepare a statement to just randomly fetch any answer and show it to us
		
		

		// This is how we select a random value, needed for later
		// $random_answer = $conn->prepare("SELECT answer FROM chatbot ORDER BY RAND() LIMIT 1");

		// Time for action
		
		if (isset($_POST['message']) && $_POST['message']!=null) {

			$question = $_POST['message'];
			// remove question marks and strip extra spaces
			$strippedquestion = stripquestion($question);

			// Let's first check if we're in training mode
			$array_data = explode(':', $strippedquestion);

			if (is_training($array_data[0])) { 
				
				// get training data
				extract(training_data(stripquestion($array_data[1])), EXTR_PREFIX_ALL, "train");
				

				if(authorize_training(stripquestion($train_password))){
				// store question in database
				$answer = train($train_question, $train_answer);}else{$answer=" incorrect password, authorization failed";}
				echo json_encode([
					'status' => 1,
					'answer' => $answer
				]);
				return;
				
			}
			else{
				// then we're askin a question
			
			$strippedquestion = "%$strippedquestion%";
			$answer_stmt = $conn->prepare("SELECT answer FROM chatbot where question LIKE :question ORDER BY RAND() LIMIT 1");
			$answer_stmt->bindParam(':question', $strippedquestion);
			$answer_stmt->execute();


			$results = $answer_stmt->fetch();

			if(($results)!=null){

				$answer = $results['answer'];
				echo json_encode([
					'status' => 1,
					'answer' => $answer
				]);
				return;
				
			}
			else{
				$answer = "Sorry, I cannot answer that question at the moment, you can also train me by entering the following command: <br>
				<code class='text-white'>train: your question # the correct answer # password</code>
				";
				echo json_encode([
					'status' => 0,
					'answer' => $answer
				]);
				return;
				
			}
			}



		}

		// $stmt = $conn->prepare("SELECT * from chatbot WHERE question LIKE '%hello there%' LIMIT 1");

		// $stmt->execute();
		// $stmt->execute();

		// $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

		// Just in case there are multiple answers, select a random one

}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="ha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
		<style>
		body {
			background-color: ghostwhite;
			font-weight: normal;
			font-family: sans-serif;
		}
		.con {
			width: 90%;
			margin: 0 auto;
		}
		div img {
			width: 200px;
			float: left;
			margin-right: 5px;
		}
		.sum {
			background-color: lightgray;
			height: 226px;
			width: 78%;
			float: left;
			text-align: center;
			padding: 10px;
		}
		.cols {
			float: left;
			text-align: center;
			padding: 10px;
			margin-left: 70px;
			margin-top: 20px;
		}
		h3 {
			font-style: italic;
			font-size: 14px;
			margin: o auto
			}
		.clear {
			clear: both;
		}
		.footer {
			text-align: center;
			margin-top: 30px;
		}
		.top {
			margin-top: 50px;
		}
<<<<<<< HEAD
		.bot {
			position: fixed;
			bottom: 2%;
			right: 8%;
			width: 350px;
			display: block;
		}
		.chat {
			display: block;
			background-color: blue;
			color: #fff;
			text-align: center;
			padding: 10px 0;
		}
<<<<<<< HEAD
<<<<<<< HEAD
		.col-lg-4 {
    	-ms-flex: 0 0 33.333333%;
    	flex: 0 0 33.333333%;
    	max-width: 33.333333%;
    	}
    	  .col-sm {
    		-ms-flex-preferred-size: 0;
    		flex-basis: 0;
    		-ms-flex-positive: 1;
    		flex-grow: 1;
    		max-width: 100%;
  		}
  		.row {
  			display: -ms-flexbox;
  			display: flex;
  			-ms-flex-wrap: wrap;
  			flex-wrap: wrap;
  			margin-right: -15px;
  		}
  		.card-header {
  			padding: 0.75rem 1.25rem;
  			margin-bottom: 0;
  			background-color: rgba(0, 0, 0, 0.03);
  			border-bottom: 1px solid rgba(0, 0, 0, 0.125);
		}
		.top-bar {
            background: #666;
            color: white;
            padding: 10px;
            position: relative; 
            overflow: hidden;
        }
        .col-md-8 {
    		-ms-flex: 0 0 66.666667%;
    		flex: 0 0 66.666667%;
    		max-width: 66.666667%;
  		}
  		.col-md-10 {
    		-ms-flex: 0 0 83.333333%;
    		flex: 0 0 83.333333%;
    		max-width: 83.333333%;
  		}
  		.col-md-2 {
    		-ms-flex: 0 0 16.666667%;
    		flex: 0 0 16.666667%;
    		max-width: 16.666667%;
  		}
        .msg_container_base {
            background: #e5e5e5;
            margin: 0 auto;
            width: 100%;
            padding: 0 10px 10px;
            max-height: 350px;
            overflow-x: hidden;
        }
        .msg_container {
            padding: 10px;
            overflow: hidden;
            display: flex;
        }
        .base_sent {
            justify-content: flex-end;
            align-items: flex-end;
            
        }
        .base_receive>.avatar:after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 0;
            height: 0;
            border: 5px solid #FFF;
            border-left-color: rgba(0, 0, 0, 0);
            border-bottom-color: rgba(0, 0, 0, 0);
        }
        .base_sent>.avatar:after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 0;
            border: 5px solid white;
            border-right-color: transparent;
            border-top-color: transparent;
            box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close } .msg_sent > time{
            float: right;
        }
        .card-body {
  			-ms-flex: 1 1 auto;
  			flex: 1 1 auto;
  			padding: 1.25rem;
		}
		.messages {
            background: white;
            padding: 10px;
            border-radius: 2px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            max-width: 80%;
        }
        .msg_receive {
            padding-left: 0;
            margin-left: 0;
            background: #666 !important;
            color: #FFF;
        }
        
        .msg_sent {
            padding-bottom: 20px !important;
            margin-right: 0;
        }
        
        .messages {
            background: white;
            padding: 10px;
            border-radius: 2px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            max-width: 80%;
        }
        
        .messages>p {
            font-size: 13px;
            margin: 0 0 0.2rem 0;
            overflow-wrap: break-word;
        }
        
        .messages>time {
            font-size: 11px;
            color: #ccc;
        }
        .msg_sent {
            padding-bottom: 20px !important;
            margin-right: 0;
        }
        .card-footer {
  			padding: 0.75rem 1.25rem;
  			background-color: rgba(0, 0, 0, 0.03);
  			border-top: 1px solid rgba(0, 0, 0, 0.125);
		}

		.card-footer:last-child {
  			border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);
		}
		.input-group {
  			position: relative;
  			display: -ms-flexbox;
  			display: flex;
  			-ms-flex-wrap: wrap;
  			flex-wrap: wrap;
  			-ms-flex-align: stretch;
  			align-items: stretch;
  			width: 100%;
		}
		.input-group-prepend,
		.input-group-append {
  			display: -ms-flexbox;
  			display: flex;
		}
		.input-group-prepend .btn,
		.input-group-append .btn {
  			position: relative;
  			z-index: 2;
		}
		.input-group-append {
  			margin-left: -1px;
		}
		.mb-3,
		.my-3 {
  			margin-bottom: 1rem !important;
		}
		.btn {
  			display: inline-block;
  			font-weight: 400;
  			text-align: center;
  			white-space: nowrap;
  			vertical-align: middle;
  			-webkit-user-select: none;
  			-moz-user-select: none;
  			-ms-user-select: none;
  			user-select: none;
  			border: 1px solid transparent;
  			padding: 0.375rem 0.75rem;
  			font-size: 1rem;
  			line-height: 1.5;
  			border-radius: 0.25rem;
  			transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out;
			}
			.btn-primary {
  				color: #fff;
  				background-color: #007bff;
  				border-color: #007bff;
			}
			.btn-sm, .btn-group-sm > .btn {
  				padding: 0.25rem 0.5rem;
  				font-size: 0.875rem;
  				line-height: 1.5;
  				border-radius: 0.2rem;
			}
=======
		
=======
>>>>>>> 5f8c248c2d9413d18f8ff7a2141503cdd212b9c4
		.main{
			margin-top: 20vh;
		}

		.card.profile-card{
			
			width: 90%;
			max-width: 400px;
			background-color: #fff;
			color: #777;
			/*min-height: 90%;*/
			
		}

		.profile-card h1{
			font-size: 1.8rem;
		}


		.span-width{
			width: 80%;
		}

		.bot-panel{
			height: 80vh;
			width: 90%;
			max-width: 400px;
		}

		@media(min-width: 750px){
			.bot-panel{
				position: fixed;
				right: 0;
				bottom: 0;
			}
=======
		.main{
			margin-top: 20vh;
		}

		.card.profile-card{
			
			width: 90%;
			max-width: 400px;
			background-color: #fff;
			color: #777;
			/*min-height: 90%;*/
			
		}

		.profile-card h1{
			font-size: 1.8rem;
		}


		.span-width{
			width: 80%;
		}

		.bot-panel{
			height: 80vh;
			width: 90%;
			max-width: 400px;
		}

		@media(min-width: 750px){
			.bot-panel{
				position: fixed;
				right: 0;
				bottom: 0;
			}
>>>>>>> fd9b122a5b6f212003a947cab91714cde2dd93da
		}

		.bot-panel .card-header{
			background-color: rgba(173, 88, 31, 0.85);
			color: #fff;
		}

		.bot-panel .card-body{	
			overflow-y: scroll;
		}

		.gracie-icon{
			max-width: 60px;
			border: 1px solid #fff;
			border-radius: 50%;
		}

		.msj:before{
		    width: 0;
		    height: 0;
		    content:"";
		    top:-5px;
		    left:-14px;
		    position:relative;
		    border-style: solid;
		    border-width: 0 13px 13px 0;
		    border-color: transparent #0085A1 transparent transparent;            
		}
		.msj-rta:after{
		    width: 0;
		    height: 0;
		    content:"";
		    top:-5px;
		    left:14px;
		    position:relative;
		    border-style: solid;
		    border-width: 13px 13px 0 0;
		    border-color: whitesmoke transparent transparent transparent;           
		}  

		.text{
		    width:75%;display:flex;flex-direction:column;
		}

		.text-r{
		    float:right;padding-left:10px;
		}

		.avatar{
		    display:flex;
		    justify-content:center;
		    align-items:center;
		    width:25%;
		    float:left;
		    padding-right:10px;
		}
		.macro{
		    margin-top:5px;width:85%;border-radius:5px;padding:5px;display:flex;
		}
		.msj-rta{
<<<<<<< HEAD
		    float:right;background:whitesmoke;
		}
		.msj{
		    float:left;background:#f1a97a;
		}
>>>>>>> bd2f0bd6ed0524d8ebad0192685f46723fe7657b
=======
		    float:right;
		    background:whitesmoke;
		}
		.msj{
		    float:left;
		    background-color: #0085A1;
		}
>>>>>>> fd9b122a5b6f212003a947cab91714cde2dd93da
	</style>
</head>
<body>
	<div class="top clear"></div>
	<div class="con clear">
		<div class="img">
			<img src= "http://res.cloudinary.com/intellitech/image/upload/v1523779243/admiral.jpg" alt="Admiral">
		</div>
		<div class="sum">
    		<h1>Hi Guys!</h1>
    		<p>This is a summary of my profile and my skills</p>
  		</div>
  		<div class = "cols">
			<h2> PROFILE</h2>
			<h3>My Name is Bright Robert</h4>
		</div>
		<div class = "cols">
			<h2> SKILLS</h2>
			<h3> Software Development, System Engr, Network Admin</h3>
		</div>
		<div class = "cols" >
			<h2> CONTACT </h2>
			<h3> Slack: @admiral </h3>
		</div>
		<div class="clear"></div>
<<<<<<< HEAD
<<<<<<< HEAD
			<div class="bot col-lg-4">
                <div class="row chat-window" id="chat_window_1">
                    <div class="card">
                        <div class="row card-header top-bar">
                            <div class="col-md-8">
                                <h2>Bot Chat</h2>   
                            </div>
                        </div>
                            <div class="card-body  msg_container_base">
                        		<div class="row msg_container base_sent">
                                    <div class="col-md-10">
                                        <div class="messages msg_sent">
                                            <p><code>Hello, I am a bot, I am smart but you can make me smarter, I am always willing to learn</code></p>
                                        </div>
                                    </div>
                        			<div class="col-md-2"></div>
                                </div>
                            	<div class="row msg_container base_sent">
                                <div class="col-md-10">
                                    <div class="messages msg_sent">
                                        <p><code>To teach me, package your lesson in the format below</code></p>
                                        <p><code>train:your question#your answer#password</code></p>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            	</div>
                            </div>   <!-- message form -->
                            <div class="card-footer message-div">
                                <form action="" id="chat-form" method="post">
                                    <div class="input-group mb-3">
                                        <input class="form-control message chat_input" name="chat_message" aria-label="With input" placeholder="Let's Chat  Now...">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary btn-sm send-message" id="btn-chat"><i class="fa fa-send-o"></i></button> 
                                        </div>
                                    </div>
                                </form>
                        	</div>
                    </div>
                </div>
            </div>
=======
			<div class="col-md-6">
				<div class="card border-0 bot-panel ml-auto mr-auto">
				  <div class="card-header">
				    <h4 class="ml-3 d-inline" style="font-size: 1.2rem; font-weight: 500;">CHAT BOT</h4>
				  </div>
				  <div class="card-body" id="chatWindow">
				    
				    <!-- Gracie's message -->
                        <div class="msj macro">
                            <div class="text text-l">
                                <p>How may I be of service today?</p>
                            </div>
                        </div>
                    <!-- Gracie's message -->
                        <div class="msj macro">
                        <div class="avatar"><img style="width: 100%;" src="https://cdn0.iconfinder.com/data/icons/avatars-3/512/avatar_emo_girl-512.png" class="gracie-icon align-self-start"></div>
                            <div class="text text-l">
                                <p>You can ask me any questions, You could also train me by entering the following format: <br>
                                	<code class="text-white">train: your question # the correct answer # password</code>
                                </p>
                                
                            </div>
                        </div>
                        <?php if (isset($question)) {
                        	?>
                        
                    <!-- User's message -->
                  
                        <div class="msj-rta macro">
                            <div class="text text-r">
                                <p><?php echo $question; ?></p>
                                
                            </div>
                        <div class="avatar" style="padding:0px 0px 0px 10px !important"><img class="img-circle" style="width:100%;" src="http://simpleicon.com/wp-content/uploads/user1.png" /></div>

                    	</div>

                    	<?php } ?>

				    <?php if (isset($answer)) { ?>
				    	<!-- Gracie's message -->
                        <div class="msj macro">
                        <div class="avatar"><img style="width: 100%;" src="https://cdn0.iconfinder.com/data/icons/avatars-3/512/avatar_emo_girl-512.png" class="gracie-icon"></div>
                            <div class="text text-l">
                                <p><?php echo $answer; ?></p>                                
                            </div>
                        </div>
=======
			<div class="col-md-6">
				<div class="card border-0 bot-panel ml-auto mr-auto">
				  <div class="card-header">
				    <h4 class="ml-3 d-inline" style="font-size: 1.2rem; font-weight: 500;">CHAT BOT</h4>
				  </div>
				  <div class="card-body" id="chatWindow">
                        <div class="msj macro">
                            <div class="text text-l">
                                <p>How may I be of service today?</p>
                            </div>
                        </div>
                    <!-- Gracie's message -->
                        <div class="msj macro">
                            <div class="text text-l">
                                <p>ask me any questions, You can also train me by entering the following format: <br>
                                	<code class="text-white">train: your question # the correct answer # password</code>
                                </p>
                                
                            </div>
                        </div>
                        <?php if (isset($question)) {
                        	?>
                        
                    <!-- User's message -->
                  
                        <div class="msj-rta macro">
                            <div class="text text-r">
                                <p><?php echo $question; ?></p>
                                
                            </div>
                        <div class="avatar" style="padding:0px 0px 0px 10px !important"><img class="img-circle" style="width:100%;" src="http://simpleicon.com/wp-content/uploads/user1.png" /></div>

                    	</div>

                    	<?php } ?>

				    <?php if (isset($answer)) { ?>
				    	<!-- Gracie's message -->
                        <div class="msj macro">
                            <div class="text text-l">
                                <p><?php echo $answer; ?></p>                                
                            </div>
                        </div>
>>>>>>> fd9b122a5b6f212003a947cab91714cde2dd93da
				    <?php } ?>

				  </div>

				  <div class="card-footer">
				  	<form class="form-inline" method="post" id="messageForm">
				  		<div class="form-group mb-2 col-10 mr-auto">
					    	<label for="message" class="sr-only">Message</label>
					    	<input type="text" class="col-12 form-control" id="message" name="message" placeholder="Type Here">
					  	</div>
					  	<button type="submit" class="col-2 mx-auto btn btn-primary mb-2"><i class="fa fa-paper-plane"></i></button>

				  	</form>
				  	
				  </div>
				</div>
			</div>
<<<<<<< HEAD
>>>>>>> bd2f0bd6ed0524d8ebad0192685f46723fe7657b
=======
>>>>>>> fd9b122a5b6f212003a947cab91714cde2dd93da
		<div class="footer">
			<footer class="socials">
                <i class="fab fa-github-square fa-2x"></i>
                <i class="fab fa-facebook-square fa-2x"></i>
                <i class="fab fa-twitter-square fa-2x"></i>
                <i class="fab fa-linkedin fa-2x"></i>
            </footer>
		</div>
		<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

<script>
	$(document).ready(function() {
		// let's scroll to the last message
		$('#chatWindow').animate({scrollTop: $('#chatWindow').prop("scrollHeight")}, 1000);

			$('#messageForm').submit(function(e){
				e.preventDefault();
				sendMessage(e);	
			});

			
			
			
		});

	function sendMessage(e) {
		var message = $('#message').val();
		if (message.length>0) {
			// I'm adding this because of delay in network, so the messages don't overlap
			var rand = Math.floor(Math.random()*100);
			var classname = 'sending-'+rand;
			var selector = '.'+classname;
			$('#message').val('');
			$('#chatWindow').append('<div class="msj-rta macro "><div class="text text-r"><p class="'+classname+'">Sending...</p></div>'+
                        '<div class="avatar" style="padding:0px 0px 0px 10px !important"><img class="img-circle" style="width:100%;" src="http://simpleicon.com/wp-content/uploads/user1.png" /></div></div>');
			$('#chatWindow').animate({scrollTop: $('#chatWindow').prop("scrollHeight")}, 1000);
			
		  $.ajax({
				url: "/profiles/admiral.php",
				type: "post",
				data: {message: message},
				dataType: "json",
				success: function(response){
		    var answer = response.answer;
		  	$(selector).html(''+message+'');
			$(selector).removeClass(classname).addClass('sent');
			$('#chatWindow').append(' <div class="msj macro"><div class="avatar"><img style="width: 100%;" src="https://cdn0.iconfinder.com/data/icons/avatars-3/512/avatar_emo_girl-512.png" class="gracie-icon align-self-start"></div><div class="text text-l"><p>'+answer+'</p></div></div>');
		  
		  },
		  error: function(error){
					console.log(error);
				}
		  // .catch(function (error) {
		  //   $('#chatWindow').append(' <div class="msj macro"><div class="avatar"><img style="width: 100%;" src="https://cdn0.iconfinder.com/data/icons/avatars-3/512/avatar_emo_girl-512.png" class="gracie-icon align-self-start"></div><div class="text text-l"><p>sorry, an error occured</p></div></div>');
		  // });
		  
		  // e.preventDefault();
		});
	}
}
</script>
    </body>
</html>