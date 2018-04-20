<?php
// If you can't find const DB_USER, this occurs when I'm testing locally or through hng.fun/profiles/temitope.php
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

	$query_me = $conn->query("Select * from interns_data where username = 'temitope'");
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
			<div class="col-md-6">
				<div class="card border-0 bot-panel ml-auto mr-auto">
				  <div class="card-header">
				    <img src="https://cdn0.iconfinder.com/data/icons/avatars-3/512/avatar_emo_girl-512.png" class="gracie-icon"> <h4 class="ml-3 d-inline" style="font-size: 1.2rem; font-weight: 500;">Gracie</h4>
				  </div>
				  <div class="card-body" id="chatWindow">
				    
				    <!-- Gracie's message -->
                        <div class="msj macro">
                        <div class="avatar"><img style="width: 100%;" src="https://cdn0.iconfinder.com/data/icons/avatars-3/512/avatar_emo_girl-512.png" class="gracie-icon"></div>
                            <div class="text text-l">
                                <p>Hi! My name is Gracie. How may I be of service today?</p>
                                
                            </div>
                        </div>
                    <!-- Gracie's message -->
                        <div class="msj macro">
                        <div class="avatar"><img style="width: 100%;" src="https://cdn0.iconfinder.com/data/icons/avatars-3/512/avatar_emo_girl-512.png" class="gracie-icon align-self-start"></div>
                            <div class="text text-l">
                                <p>You can ask me any questions, let's see if I can answer them. You could also train me by entering the following format: <br>
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
		<div class="footer">
			<footer class="socials">
                <i class="fab fa-github-square fa-2x"></i>
                <i class="fab fa-facebook-square fa-2x"></i>
                <i class="fab fa-twitter-square fa-2x"></i>
                <i class="fab fa-linkedin fa-2x"></i>
            </footer>
		</div>
		                    <script>
                        $('document').ready(function() {

                            $("body").css("opacity", 0).animate({ opacity: 1}, 3000);


                            $('#chat-form').submit(function(e) {
                                e.preventDefault();
                            
                                var message = $('.message').val();
                                var msg_container = $('.msg_container_base');

                                let bot_msg =  (answer)=>{

                                            return   '<div class="row msg_container base_sent">'+
                                                            '<div class="col-md-10 col-xs-10">'+
                                                                '<div class="messages msg_sent">'+
                                                                    '<p>'+answer+'</p>'+
                                                                '</div>'+
                                                                '</div>'+
                                                                '<div class="col-md-2 col-xs-2 avatar">'+
                                                                '<img src="" class="bot-img img-responsive" title="">'+
                                                            '</div>'+
                                                        '</div>';
                                }

                            let sent_msg =    (msg)=>{

                                              return   '<div class="row msg_container base_receive">'+
                                                            '<div class="col-md-2 col-xs-2 avatar"></div>'+
                                                            '<div class="col-md-10 col-xs-10">'+
                                                                '<div class="messages msg_receive">'+
                                                                    '<p>'+msg+'</p>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>';
                            }
                                       
                                       if (message != ''){

                                           if (message.split(':')[0] !='train')
                                            msg_container.append(sent_msg(message));
                                             msg_container.scrollTop(msg_container[0].scrollHeight);
                                       }
                                        // msg_container.append(bot_msg);
                                       
                                        
                                $('.message-div').removeClass('has-danger')

                               

                                // alert(message);
                                $.ajax({
                                    type: 'POST',
                                    url: '/profiles/admiral.php',
                                    dataType: 'json',
                                    data: {chat_message: message},
                                    success: function(data) {
                                        //console.log(data);
                                        if (data.status===1){

                                           $('.message').val('');
                                             msg_container.append(bot_msg(data.answer));  
                                             msg_container.scrollTop(msg_container[0].scrollHeight);
                                        }
                                        else if(data.status===2){
                                            $('.message').val('');
                                            msg_container.append(bot_msg('Oga I no know this one, abeg try again'));
                                            msg_container.scrollTop(msg_container[0].scrollHeight);
                                        }
                                        else if(data.status===0){
                                            msg_container.append(bot_msg('Opps what do you really expect from me with empty question?'))
                                            msg_container.scrollTop(msg_container[0].scrollHeight);
                                        }
                                        else if(data.status===3){
                                            $('.message').val('');
                                            msg_container.append(bot_msg(data.response));
                                            msg_container.scrollTop(msg_container[0].scrollHeight);
                                        }
                                        else if(data.status===4){
                                            $('.message').val('');
                                            msg_container.append(bot_msg(data.response));
                                            msg_container.scrollTop(msg_container[0].scrollHeight);
                                        }
                                        else if(data.status===5){
                                            $('.message').val('');
                                            msg_container.append(bot_msg(data.response));
                                            msg_container.scrollTop(msg_container[0].scrollHeight);
                                        }
                                        
                                    },
                                    error: function(error) {
                                    
                                        console.log(error);
                                    
                                        if (error) {
                                            
                                            $('.message-div').addClass('has-danger');
                                        }
                                    },
                                });
                            });

                            $(document).on('click', '.card-header span.icon_minim', function(e) {
                                var $this = $(this);
                                if (!$this.hasClass('card-collapsed')) {
                                    $this.parents('.card').find('.card-body').slideUp();
                                    $this.addClass('card-collapsed');
                                    $this.removeClass('fa-minus').addClass('fa-plus');
                                } else {
                                    $this.parents('.card').find('.card-body').slideDown();
                                    $this.removeClass('card-collapsed');
                                    $this.removeClass('fa-plus').addClass('fa-minus');
                                }
                            });
                            $(document).on('focus', '.card-footer input.chat_input', function(e) {
                                var $this = $(this);
                                if ($('#minim_chat_window').hasClass('card-collapsed')) {
                                    $this.parents('.card').find('.card-body').slideDown();
                                    $('#minim_chat_window').removeClass('card-collapsed');
                                    $('#minim_chat_window').removeClass('fa-plus').addClass('fa-minus');
                                }
                            });
                            $(document).on('click', '.icon_close', function(e) { //$(this).parent().parent().parent().parent().remove();
                                $("#chat_window_1").remove();
                            });
                });

                    </script>
    </body>
</html>
<?php 
	}
?>