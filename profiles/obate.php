<?php

if(!defined('DB_USER')){
		require "../../config.php";
		try {
				$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		} catch (PDOException $pe) {
				die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
		}
	}

	try {
		$sql = "SELECT * FROM secret_word";
		$secret_word_query = $conn->query($sql);
		$secret_word_query->setFetchMode(PDO::FETCH_ASSOC);
		$query_result = $secret_word_query->fetch();

		$sql_query = 'SELECT * FROM interns_data WHERE username="obate"';
		$query_my_intern_db = $conn->query($sql_query);
		$query_my_intern_db->setFetchMode(PDO::FETCH_ASSOC);
		$intern_db_result = $query_my_intern_db->fetch();

	} catch (PDOException $exceptionError) {
		throw $exceptionError;
	}

	$secret_word = $query_result['secret_word'];
	$name = $intern_db_result['name'];
	$username = $intern_db_result['username'];
	$image_url = $intern_db_result['image_filename'];
?>


<?php
//check if server method = post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	//Get the input text from the user and store in a new vaariable called "question"
	$question = $_POST['input_text'];
	$question = preg_replace('([\s]+)', ' ', trim($question));
	$question = preg_replace("([?.])", "", $question);
	 // check if question is "aboutbot"
    if(preg_replace('([\s]+)', ' ', trim(strtolower($question))) === 'aboutbot'){
      echo json_encode([
        'status' => 1,
        'answer' => "Hi dear! My name is obabot, version 1.0"
      ]);
      return;
    };
    //Check if user want to train the bot or ask a normal question
	$check_for_train = stripos($question, "train:");
    if($check_for_train === false){ //then user is asking a question

	//remove extra white space, ? and . from question
	$question = preg_replace('([\s]+)', ' ', trim($question));
	$question = preg_replace("([?.])", "", $question);

	 //check database for the question and return the answer
	$question = $question;
        $sql = 'SELECT * FROM chatbot WHERE question = "'. $question . '"';
        $q = $GLOBALS['conn']->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetchAll();
        if(empty($data)){ //That means your answer was not found on the database
            echo json_encode([
        		'status' => 1,
       			 'answer' =>  "I can't answer your question! Please train me by typing-->  train: question #answer #password"
     		 ]);
          return;
        }else {
            $rand_keys = array_rand($data);
            $answer = $data[$rand_keys]['answer'];
            echo json_encode([
        		'status' => 1,
       			 'answer' => $answer,  //return one of the the answers to client
     		 ]);
           return;
        	};


	}else{
		//train the chatbot to be more smarter
		//remove extra white space, ? and . from question
	    $train_string  = preg_replace('([\s]+)', ' ', trim($question));
	    $train_string  = preg_replace("([?.])", "",  $train_string);
	    //get the question and answer by removing the 'train'
	    $train_string = substr( $train_string, 6);
	    $train_string = explode("#", $train_string);
        //get the index of the user question
        $user_question = trim($train_string[0]);
	        if(count($train_string) == 1){ //then the user only enter question and did'nt enter answer and password
		        echo json_encode([
		          'status' => 1,
		          'answer' => "Invalid training format. Please the correct format is-->  train: question #answer #password"
		        ]);
	        return;
	        };
	        //get the index of the user answer
	        $user_answer = trim($train_string[1]);
	        if(count($train_string) < 3){ //then the user only enter question and answer But did'nt enter password
		        echo json_encode([
		          'status' => 1,
		          'answer' => "Please enter training password to train me. The password is--> password"
		        ]);
	        return;
	        };
	         //get the index of the user password
		    $user_password = trim($train_string[2]);
	        //verify if training password is correct
	        define('TRAINING_PASSWORD', 'password'); //this is a constant variable
	        if($user_password !== TRAINING_PASSWORD){ //the password is incorrect
		        echo json_encode([
		          'status' => 1,
		          'answer' => "The password you entered is wrong! Please enter the correct password which is-->  password "
		        ]);
	     	return;
	    	};
		    //check database if answer exist already
		    $user_answer = "$user_answer"; //return things that have the question
		    $sql = "select * from chatbot where answer like :user_answer";
		    $stmt = $conn->prepare($sql);
		    $stmt->bindParam(':user_answer', $user_answer);
		    $stmt->execute();
		    $stmt->setFetchMode(PDO::FETCH_ASSOC);
		 	$rows = $stmt->fetchAll();
		    if(empty($rows)){// then it means the database could not fetch any existing question and answer, so	we can insect the query.
			    $sql = "insert into chatbot (question, answer) values (:question, :answer)";  //insert into database
			    $stmt = $conn->prepare($sql);
			    $stmt->bindParam(':question', $user_question);
			    $stmt->bindParam(':answer', $user_answer);
			    $stmt->execute();
			    $stmt->setFetchMode(PDO::FETCH_ASSOC);

			    echo json_encode([
			    	'status' => 1,
			        'answer' => "WOW! I'm learning new things everyday. Thanks Buddy! for making me more smarter. You can ask me that same question right now and i will tell you the answer OR just keep training me more Buddy! "
			      ]);
	     	return;

	     	}else{ //then it means the the question already in the database and no need to insert it again
	     		 echo json_encode([
			    	'status' => 1,
			        'answer' => "Answer already exist. Try train again"
			      ]);
			return;
	     	};
	    return;
	 	};

} else {
?>

<!DOCTYPE html>
<html>
<head>
	<!--This site is sample project for HNG internship 4.0 for stage1. by Jeremiah Righteous -->
	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Obasi Uchechukwu | Software developer</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	  <link href="https://fonts.googleapis.com/css?family=Lato|Work+Sans:400,900&amp;subset=latin-ext" rel="stylesheet">
	 <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">

	<style type="text/css">
		body{
			padding:0;
			margin:0;
			font-family: 'Lato', sans-serif;
			font-size: 100%;
			background-color:white;
		}
		footer{
			display: none;
		}
		.flex-container{
			display: flex;
			flex-flow: row wrap;
			justify-content:center;
			margin-top: 90px;
		}
		.content-containter{
		/**  background-color: #F3F3F3; **/
		  width: 500px;
		  height: 500px;
		  margin: 10px;
		  text-align: center;
		  box-sizing: border-box;
		}
		#hello {
	      font-size: 30px;
        color:grey;
   		}
   		.about{
   			margin-top:  -20px;
   			font-family: 'Ubuntu';
   			font-size: 1.1em;
   		}.link {
   			color: blue;
   		}.link a{
   			text-decoration: none;
   		}
		.chatbot-container{
		  background-color: #F3F3F3;
		  width: 500px;
		  height: 500px;
		  margin: 10px;
		  box-sizing: border-box;
		  box-shadow: -3px 3px 5px gray;
		}
		.chat-header{
			width: 500px;
			height: 50px;
			background-color: #483d8b;
			color: white;
			text-align: center;
			padding: 10px;
			font-size: 1.5em;
		}
		#chat-body{
		    display: flex;
		    flex-direction: column;
		    padding: 10px 20px 20px 20px;
		    background: white;
		    overflow-y: scroll;
		    height: 395px;
		    max-height: 395px;
		}
		.message{
			font-size: 0.8em;
			width: 300px;
			display: inline-block;
          		padding: 10px;
			margin: 5px;
          		border-radius: 10px;
            		line-height: 18px;
		}
		.bot_chat{
			text-align: left;
		}
		.bot_chat .message{
			background-color: #34495E;
			color: white;
			opacity: 0.9;
			box-shadow: 3px 3px 5px gray;
		}
		.user_chat{
			text-align: right;
		}
		.user_chat .message{
			background-color: #E0E0E0;
			color: black;
			box-shadow: 3px 3px 5px gray;
		}
		.chat-footer{
			background-color: #F3F3F3;
		}
		.input-text-container{
			margin-left: 20px;
		}
		.input_text{
			width: 370px;
			height: 35px;
			padding: 5px;
			margin-top: 8px;
			border: 0.5px solid #34495E;
			border-radius: 5px;
		}
		.send_button{
			width: 75px;
			height: 35px;
			padding: 5px;
			margin-top: 8px;
			color: white;
			border:none;
			border-radius: 5px;
			background-color: #34495E;
		}
	</style>


</head>
<body>
	<div class="flex-container">
		<!--This the section for my profile details -->
		<div class="content-containter">
			<img class="circle_img" src="<?php echo $image_url ?>" atl="obate" style="/**border-radius:50%; border:6px solid black; **/width:200px">

			<div>
				<h2 id="hello">CEO and Founder, software developer And Data Scientist</h2>
			</div>
			<div class="about">
				<p>I'm <strong> <?php
					echo $name;
				?> </strong> From Enugu, Nigeria. I'm a Software Engineer and also the CEO of obdesign technologies Ltd<br></p>
				<p style=" line-height: -100px;"> </p>
			</div>

		</div>

		<!--This section contains the chatbot container-->
		<div class="chatbot-container">
			<div class="chat-header">
				<span>My Chatbot</span>
			</div>
			<div id="chat-body">
				<div class="bot_chat">
						<div class="message">Hello! My name is Obabot.<br>You can ask me questions and get answers.<br>Type <span style="color: #90CAF9;"><strong> Aboutbot</strong></span> to know more about me.
						</div>
						<div class="message">You can also train me to be smarter by typing; <br><span style="color: #90CAF9;"><strong>train: question #answer #password</strong></span><br><strong></div>
				</div>
			</div>
			<div class="chat-footer">
				<div class="input-text-container">
					<form action="" method="post" id="chat-input-form">
						<input type="text" name="input_text" id="input_text" required class="input_text" placeholder="Type your question here...">
						<button type="submit" class="send_button" id="send">Send</button>
					</form>
				</div>
			</div>
		</div>
	</div>






<!--My script here-->
<script>
    var chat_output = $("#chat-body");
	    $("#chat-input-form").on("submit", function(e) {
	        e.preventDefault();
	        var input_text = $("#input_text").val();
	        chat_output.append("<div class='user_chat'><div class='message'>"+input_text+"</div></div>");
	       	chat_output.scrollTop(chat_output[0].scrollHeight);
			//send question to server
			$.ajax({
				url: '/profiles/obate.php', //i will need to change this when pushing
				type: 'POST',
				data: {input_text: input_text},
				dataType: 'json',
				success: (response) => {
			        response.answer = response.answer.replace(/(?:\r\n|\r|\n)/g, '<br />');
			        let response_answer = response.answer;
			        chat_output.append("<div class='bot_chat'><div class='message'>" +response_answer+ "</div></div>");
			       	$('#chat-body').animate({scrollTop: $('#chat-body').get(0).scrollHeight}, 1100);
				},
				error: (error) => {
	          		alert('error occured')
						console.log(error);
				}

			});
			document.getElementById("chat-input-form").reset(); //clear the fields
		});
</script>
</body>
</html>
<?php } ?>
