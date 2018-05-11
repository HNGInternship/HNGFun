<?php 
  if(!defined('DB_USER')){
		require "../config.php";		
		try {
				$conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
		} catch (PDOException $pe) {
				die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
		}
	}

	if ($_SERVER['REQUEST_METHOD']==="POST") {
		$question = $_POST['question'];
		$question = trim(htmlspecialchars($question));
		$question = trim($question, "?");
		$question = strtolower($question);

		//turn question to an array
		$questionArr = explode(':', $question);
		
    //Training Mode
		if($questionArr[0] === 'train'){
			$password = "password";
			$questionPart = explode('#', $questionArr[1]);
			
			if(count($questionPart) === 3 && $password === trim($questionPart[2])) {
				$question = $questionPart[0];
				$userAnswer = $questionPart[1];
				//check if question AND answer are already stored in database
				$sql = "SELECT * FROM chatbot WHERE question LIKE :question AND answer LIKE :userAnswer";
        $statement = $conn->prepare($sql);
        $statement->bindParam(':question', $question);
        $statement->bindParam(':userAnswer', $userAnswer);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
				$result = $statement->fetchAll();
				//if question and answer are already stored, ask for a new training
        if ($result){
          echo json_encode(['answer'=> 'I know this answer already, you can teach me something new']);
				}
				//if it is a new question, insert into database
				else{
					$sql = "INSERT INTO chatbot(question, answer) VALUES(:quest, :userAnswer)";
					$statement =$conn->prepare($sql);
					$statement->bindParam(':quest', $question);
					$statement->bindParam(':userAnswer', $userAnswer);
					$result = $statement->execute();
					if ($result){
						echo json_encode(['answer'=>'Thanks for teaching me something new today']);
					}
				}
			}
			else{
				echo json_encode(['answer'=>'Ensure training format and password is correct']);
			}
			
		}

		//check if aboutbot was the question asked
		elseif($question === "aboutbot"){
			echo json_encode(['answer'=>'This is BjAfam bot Version 1.0.0']);	
						
		}
		//Retrieve answer from specified question
		else{
			  $query = "%$question%";
				$sql = ("SELECT answer FROM chatbot where question LIKE :question ORDER BY RAND() LIMIT 1");
				$statement = $conn->prepare($sql);
				$statement->bindParam(':question', $query);
				$statement->execute();
				$result = $statement->fetch();
				if ($result ==null) {
					echo json_encode(['answer'=>'dont know this, but you can train me']);
				}
				else{
					$answer = $result['answer'];
					echo json_encode(['answer'=>$answer]);
				}
		}
		
}

?>
<?php
if($_SERVER['REQUEST_METHOD'] === 'GET'){
	$result = $conn->query("Select * from secret_word LIMIT 1");
	$result = $result->fetch(PDO::FETCH_OBJ);
	$secret_word = $result->secret_word;
	$result2 = $conn->query("Select * from interns_data where username = 'bjafam'");
	$user = $result2->fetch(PDO::FETCH_OBJ);


?>

<!DOCTYPE html>
<html>
<head>
	<title>My Profile page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		* {
				margin: 0;
				padding: 0;
				box-sizing: border-box;
			}
      
			.wrapper{
				display: flex;
			}

			

		 .wrapper-profile{
			 flex: 60%;
			 /*width: 800px;*/
			 background: inherit;
			 padding: 40px;
			 text-align: center;
			 margin: auto;
			 margin-top: 5%;
			 font-family: Lato, "Helvetica Neue", Helvetica, Arial, sans-serif;
		 }

		 .wrapper-chat{
			 flex: 40%;
		 }

		 .wrapper-profile-img{
			 width: 300px;
			 height: 300px;
			 border-radius: 50%;
			 margin-bottom: 20px;
		 }

		 .wrapper-profile h1{
			 font-size: 40px;
			 letter-spacing: 4px;
			 font-weight: 100;
		 }

		 .wrapper-profile h5{
			 font-size: 20px;
			 letter-spacing: 3px;
			 font-weight: 100;
		 }

		 .wrapper-profile p{
			 text-align: justify;
		 }

		 .wrapper-profile ul{
			 margin: 0;
			 padding: 0;
		 }

		 .wrapper-profile li{
			 display: inline-block;
			 margin: 6px;
			 list-style: none;
		 }

		 .wrapper-profile li a{
			 text-decoration: none;
			 font-size: 60px;
			 color: #007bff;
			 transition: all ease-in-out 250ms;
		 }	

		 .wrapper-profile li a:hover{
			 color: #000000;
		 }	 

	/*	@media only screen and (max-width: 992px) {
			.wrapper-profile {
				width: 95%;
				margin: auto;
				margin-top: 5%;
			}

			.wrapper-profile-img{
				width: 250px;
				height: 250px;
			}
		}
*/
		 .chatbox{
			width: 500px;
			/*min-width: 390px;*/
			height: 600px;
			background: #444;
			padding: 25px;
			margin: 20px auto;
		}

		.chat-logs{
			padding: 10px;
			width: 100%;
			height: 450px;
			overflow-y: scroll;
			overflow-x: hidden;
		}

		.chat-logs::-webkit-scrollbar{
			width: 10px;
		}
		
		.chat-logs::-webkit-scrollbar-thumb{
			border-radius: 10px;
			background: rgba(255,255,255,0.1);
		}

		.chat{
			display: flex;
			flex-flow: row wrap;
			align-items: flex-start;
			margin-bottom: 10px;
		}
		.chat .bot-photo{
			width: 60px;
			height: 60px;
			/* background-color: #eee; */
			background-image: url("http://res.cloudinary.com/dpuyyqxnl/image/upload/v1525909043/bot.jpg");
      background-size: 100% 100%;
			border-radius: 50%;
		}

    .chat .user-photo{
			width: 60px;
			height: 60px;
			/* background-color: #eee; */
			background-image: url("http://res.cloudinary.com/dpuyyqxnl/image/upload/v1525909063/user.jpg");
      background-size: 100% 100%;
			border-radius: 50%;
		}
		.chat .chat-message {
			width: 80%;
			padding: 15px;
			margin: 5px 10px 0;
			border-radius: 10px;
			font-size:16px;
			color: #fff;
		}

		.bot .chat-message{
			background: #1ddced;
    
		}

		.user .chat-message{
			background: #1adda4;
			order: -1;
		}

		.chat-form{
			margin-top: 20px;
			display: flex;
			align-items: flex-start;
		}

		.chat-form input{
			background: #fbfbfb;
			width: 75%;
			height: 55px;
			resize: none;
			border: 2px solid #eee;
			padding: 10px;
			font-size: 18px;
			color: #333;
		}

		/* .chat-form input::-webkit-scrollbar{
			width: 5px;
		}
		
		.chat-form input::-webkit-scrollbar-thumb{
			border-radius: 10px;
			background: rgba(0,0,0,0.1);
		} */


		.chat-form input:focus{
			background: #fff;
		}

		.chat-form button{
			background: #1ddced;
			padding: 5px 15px;
			color: #fff;
			font-size: 30px;
			border: none;
			margin: 0 10px;
			border-radius: 5px;
			cursor: pointer;
		}

		.chat-form button:hover{
			background: #13c8d9;
		}
    
    @media only screen and (max-width: 992px){
			.wrapper{
				flex-direction: column;
			}
		}

		@media only screen and (max-width: 542px){
			.chatbox{
				max-width: 350px;
				
			}
      .chat .bot-photo{
			width: 30px;
			height: 30px;
			/* background-color: #eee; */
			background-image: url("http://res.cloudinary.com/dpuyyqxnl/image/upload/v1525909043/bot.jpg");
      background-size: 100% 100%;
			border-radius: 50%;
		}
		.chat .user-photo{
			width: 30px;
			height: 30px;
			/* background-color: #eee; */
			background-image: url("http://res.cloudinary.com/dpuyyqxnl/image/upload/v1525909063/user.jpg");
      background-size: 100% 100%;
			border-radius: 50%;
		}
      .chat .chat-message {
			width: 85%;
			padding: 5px;
			margin: 5px 5px 0;
			border-radius: 3px;
			font-size:16px;
			color: #fff;
		}
		}
	</style>
</head>
<body>
<div class="wrapper">
			<div class="wrapper-profile">
				<img src=<?php echo $user->image_filename?> alt="Afam Jude picture" class="wrapper-profile-img">
				<h3>NAME: <?php echo $user->name?></h3>
				<h3>USERNAME: <?php echo $user->username;?></h3>
				<h5>WEB DEVELOPER</h5>
				<p>A Chemical engineeer during the day and a budding web developer at Night. I have a good knowledge of HTML5, CSS, JavaScript and currently learning PHP. Hoping to make a career switch into full stack Web developement.</p>

				<ul>
					<li><a href="https://twitter.com/bobjayafam" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
					<li><a href="https://github.com/bobjayafam" target="_blank"><i class="fa fa-github-square"></i></a></li>
					<li><a href="https://facebook.com/bobjayafam" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
				</ul>
			</div>
			<div class="wrapper-chat">
				<p>You can chat with my BOT</p>
				<div class="chatbox" id="chatbox">
					<div class="chat-logs">
						<div class="chat bot">
							<div class="bot-photo"></div>
							<p class="chat-message">My Name is BjAfam BOT</p>
						</div>
						<div class="chat bot">
							<div class="bot-photo"></div>
							<p class="chat-message">You can ask me any question.<br> To get current bot version, type aboutbot <br> To train me, Enter in the following format: train:question#answer#password <br> where password is password</p>
						</div>
						
				
					</div>
        <div id="form">
          <form class="chat-form" method="post" id="chat-form">
						<input name="question" id="question" autocomplete="off">
						<button type="submit" name="submit" id="chat-btn">Send</button>
					</form>
				</div>
				</div>
			</div>
		</div>
	
	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script>
		$(document).ready(function(){
			
			$('#chat-form').submit(function(e){
				e.preventDefault(); //prevents the reloading of page after a form submits
				var question = $('#question');
				var question = question.val();
				if(question){  // checks if question is not an empty string
					$(".chat-logs").append(`<div class="chat bot">
							<div class="bot-photo"></div>
							<p class="chat-message">${question}</p>
						</div>
						`);
						$.ajax({
					url: '/profiles/BjAfam.php',
					type: 'POST',
					data: {question: question},
					dataType: 'json',
					success: function(response){
						$(".chat-logs").append(`<div class="chat user">
							<div class="user-photo"></div>
							<p class="chat-message">${response.answer}</p>
						</div>
						`);
						$(".chat-logs").stop().animate({ scrollTop: $(".chat-logs")[0].scrollHeight}, 1000);//Automatic scroll to bottom of chat
			      },
					error: function(error){
						console.log(error);
				  }
				});
				}
			
					
				
				$("#chat-form").trigger('reset');
			})
		});
	</script>
</body>
</html> 
<?php
}

?>