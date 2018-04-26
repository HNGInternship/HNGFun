<?php
	if($_SERVER['REQUEST_METHOD'] === "GET"){
		if(!defined('DB_USER')){
			require "../../config.php";		
			try {
			    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
			} catch (PDOException $pe) {
			    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
			}
		}
		$result = $conn->query("Select * from secret_word LIMIT 1");
		$result = $result->fetch(PDO::FETCH_OBJ);
		$secret_word = $result->secret_word;

		$result2 = $conn->query("Select * from interns_data where username='joat'");
		$user = $result2->fetch(PDO::FETCH_OBJ);
	}
?>

<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if(!defined('DB_USER')){
			require "../../config.php";		
			try {
			    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
			} catch (PDOException $pe) {
			    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
			}
		}
		require "../answers.php";
		date_default_timezone_set("Africa/Lagos");
		// header('Content-Type: application/json');
		if(!isset($_POST['question'])){
			echo json_encode([
				'status' => 1,
				'answer' => "Please type in a question"
			]);
			return;
		}
		$question = $_POST['question']; //get the entry into the chatbot text field
		//check if in training mode
		$index_of_train = stripos($question, "train:");
		if($index_of_train === false){//then in question mode
			$question = preg_replace('([\s]+)', ' ', trim($question)); //remove extra white space from question
			$question = preg_replace("([?.])", "", $question); //remove ? and .
			//check if answer already exists in database
			$question = "%$question%";
			$sql = "select * from chatbot where question like :question";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':question', $question);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$rows = $stmt->fetchAll();
			if(count($rows)>0){
				$index = rand(0, count($rows)-1);
				$row = $rows[$index];
				$answer = $row['answer'];	
				//check if the answer is to call a function
				$index_of_parentheses = stripos($answer, "((");
				if($index_of_parentheses === false){ //then the answer is not to call a function
					echo json_encode([
						'status' => 1,
						'answer' => $answer
					]);
				}else{//otherwise call a function. but get the function name first
					$index_of_parentheses_closing = stripos($answer, "))");
					if($index_of_parentheses_closing !== false){
						$function_name = substr($answer, $index_of_parentheses+2, $index_of_parentheses_closing-$index_of_parentheses-2);
						$function_name = trim($function_name);
						if(stripos($function_name, ' ') !== false){ //if method name contains spaces, do not invoke method
							echo json_encode([
								'status' => 0,
								'answer' => "The function name should not contain white spaces"
							]);
							return;
						}
						if(!function_exists($function_name)){
							echo json_encode([
								'status' => 0,
								'answer' => "I am unable to find the function"
							]);
						}else{
							echo json_encode([
								'status' => 1,
								'answer' => str_replace("(($function_name))", $function_name(), $answer)
							]);
						}
						return;
					}
				}
			}else{
				echo json_encode([
					'status' => 0,
					'answer' => "Unfortunately, I can't answer that question at the moment. I need to be trained. The training data format is <br> <b>train: question # answer</b>"
				]);
			}		
			return;
		}else{
			//in training mode
			//get the question and answer
			$question_and_answer_string = substr($question, 6);
			//remove excess white space in $question_and_answer_string
			$question_and_answer_string = preg_replace('([\s]+)', ' ', trim($question_and_answer_string));
			
			$question_and_answer_string = preg_replace("([?.])", "", $question_and_answer_string); //remove ? and . so that questions missing ? (and maybe .) can be recognized
			$split_string = explode("#", $question_and_answer_string);
			if(count($split_string) == 1){
				echo json_encode([
					'status' => 0,
					'answer' => "Invalid training format. I cannot understand the answer part of the question. <br> The correct training data format is <br> <b>train: question # answer</b>"
				]);
				return;
			}
			$que = trim($split_string[0]);
			$ans = trim($split_string[1]);
			if(count($split_string) < 3){
				echo json_encode([
					'status' => 0,
					'answer' => "training password required"
				]);
				return;
			}
			$password = trim($split_string[2]);
			//verify if training password is correct
			define('TRAINING_PASSWORD', 'password');
			if($password !== TRAINING_PASSWORD){
				echo json_encode([
					'status' => 0,
					'answer' => "invalid training password"
				]);
				return;
			}

			//insert into database
			$sql = "insert into chatbot (question, answer) values (:question, :answer)";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':question', $que);
			$stmt->bindParam(':answer', $ans);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			echo json_encode([
				'status' => 1,
				'answer' => "Thank you, I am now smarter"
			]);
			return;
		}
		echo json_encode([
			'status' => 0,
			'answer' => "Unfortunately, I can't answer that question at the moment. I need to be trained. The training data format is <br> <b>train: question # answer</b>"
		]);
		
	}
?>

<?php
	if($_SERVER['REQUEST_METHOD'] === "GET"){
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>HNG FUN</title>
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Custom styles for this template -->
      <link href="../css/style2.css" rel="stylesheet">
      <link href="../css/style1.css" rel="stylesheet">
      <link href="../css/style.css" rel="stylesheet">
	  <link href="../css/carousel.css" rel="stylesheet">
	<style type="text/css">
		a:hover{
		  text-decoration: none;
		}
	</style>
</head>
<body style='background-color:#3f4447;'>
	
<div class='container'>
	<br><br>
	<div class='row'>
		<div class='col-sm-6' >
			<center><img height='100%' class='img-responsive' src="http://res.cloudinary.com/dlsfrelbb/image/upload/v1523639668/josh.png"></center>
		</div>
		<div class='col-sm-6'>
			<div>
				<br><br><br><br><br><br>
				<h1 style='font-family: "proxima-nova"; color:#fff; font-size: 22px; font-weight: 600; letter-spacing: .14em; line-height: 1em; text-transform: uppercase;'><?php echo $user->name; ?></h1>
				<h2 style='font-family: "proxima-nova"; color:#a3a3a3; font-size: 22px; line-height: 1.15em; text-transform: none;letter-spacing: .01em; margin-bottom:26px; text-align:left;'>I am a website devloper, android app devloper ,an animator and also love gaimg. Follow me anywhere.</h2>
				<h2 style='text-align:left;'><a href="mailto:starboi247@gmail.com" style='font-family: "proxima-nova"; color:#fff; font-size: 22px; font-weight: 600; letter-spacing: .14em; line-height: 1em; '>STARBOI247@GMAIL.COM</a></h2>
				<h2 style='text-align:left;'><a href="http://itsjoat.com" style='font-family: "proxima-nova"; color:#fff; font-size: 22px; font-weight: 600; letter-spacing: .14em; line-height: 1em; '>WEBSITE</a></h2>
				<div>
					<a href="https://instagram.com/its_joat"><img style='margin-right:10px;' width='40' height='40' src="http://res.cloudinary.com/dlsfrelbb/image/upload/v1523643336/instagram-icon-white.png"></a>
					<a href="https://twitter.com/its_joat"><img style='margin-right:10px;' width='40' height='40' src="http://res.cloudinary.com/dlsfrelbb/image/upload/v1523643336/icon-twitter-white-1.png"></a>
					<a href="https://m.youtube.com/channel/UCvLacR6r37O6N_dWEXDGUyQ"><img width='40' height='40' src="http://res.cloudinary.com/dlsfrelbb/image/upload/v1523643336/white-youtube-2-512.png"></a>
				</div>
			</div>
		</div>
	</div>
	<div class='row'>
		<div class='col-sm-2'></div>
		<div class="col-sm-8 chatfr">
		<h2 style='font-family: "proxima-nova"; color:#fff; font-size: 22px; line-height: 1.15em; text-transform: none;letter-spacing: .01em; margin-bottom:26px; text-align:left;'>Chat Bot</h2>
		<div class="row chats" id="chats" style='background-color:#fff; overflow-y: auto; height:400px; padding:10px; margin:0px;'>
			<div class="col-md-12" id="message-frame">
				<div class="row message">
					<div class="col-md-1 ">
						<p>Bot:</p>
					</div>

					<div class="col-md-8 ">
						<p>Welcome! I am <b>Jarvis</b></p>
					</div>
				</div>
				<div class="row message">
					<div class="col-md-1 ">
						<p>Bot:</p>
					</div>
					<div class="col-md-8 ">
						<p>Ask me your questions and I will try to answer them.</p>
					</div>
				</div>
				<div class="row message">
					<div class="col-md-1 ">
						<p>Bot:</p>
					</div>
					<div class="col-md-8 ">
						<p>you can also train me to answer new quetions</p>
						<p>To train me, enter the training string in this format</p>
						<p>train: question # answer</p>
					</div>
				</div>
			</div>
		</div>
		<form id="question-form">
			<input class="form-control w-100" type="text" name="question" placeholder="Ask a question" />
			<button type="submit" class="btn btn-info float-right w-100">Send</button>
		</form>	
	</div>
	<div class='col-sm-2'></div>
</div>

<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script>
	$(document).ready(function(){
		var questionForm = $('#question-form');
		questionForm.submit(function(e){
			e.preventDefault();

			var questionBox = $('input[name=question]');
			var question = questionBox.val();
			//display question in the message frame as a chat entry
			var messageFrame = $('#message-frame');
			var chatToBeDisplayed = '<div class="row message">'+
						'<div class="col-md-1 2">'+
							'<p>User:</p>'+
						'</div>'+
						'<div class="col-md-8 2">'+
							'<p>'+question+'</p>'+
						'</div>'+
						
					'</div>';
			messageFrame.html(messageFrame.html()+chatToBeDisplayed);
			$("#chats").scrollTop($("#chats")[0].scrollHeight);
			//send question to server
			$.ajax({
				url: "/profiles/joat.php",
				type: "post",
				data: {question: question},
				dataType: "json",
				success: function(response){
					if(response.status == 1){
						var chatToBeDisplayed = '<div class="row message">'+
									'<div class="col-md-1 ">'+
										'<p>Bot:</p>'+
									'</div>'+
									'<div class="col-md-8 ">'+
										'<p>'+response.answer+'</p>'+
									'</div>'+
								'</div>';
						messageFrame.html(messageFrame.html()+chatToBeDisplayed);
						questionBox.val("");	
						$("#chats").scrollTop($("#chats")[0].scrollHeight);
					}else if(response.status == 0){
						var chatToBeDisplayed = '<div class="row message">'+
									'<div class="col-md-1 ">'+
										'<p>Bot:</p>'+
									'</div>'+
									'<div class="col-md-8 ">'+
										'<p>'+response.answer+'</p>'+
									'</div>'+
								'</div>';
						messageFrame.html(messageFrame.html()+chatToBeDisplayed);
						$("#chats").scrollTop($("#chats")[0].scrollHeight);
					}
				},
				error: function(error){
					console.log(error);
				}
			})
		});
	});
</script>	
</body>
</html>

<?php 
	}
?>