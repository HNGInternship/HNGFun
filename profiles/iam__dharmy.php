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
        $q = 'SELECT * FROM secret_word';
        $sql = $conn->query($q);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $data = $sql->fetch();
        $secret_word = $data["secret_word"];
    } catch (PDOException $err) {

        throw $err;
    }?>
	
<?php

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
		require "../answers.php";

		date_default_timezone_set("Africa/Lagos");

		// header('Content-Type: application/json');

		if(!isset($_POST['question'])){
			echo json_encode([
				'status' => 1,
				'answer' => "What is your question"
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
								'answer' => "No white spaces allowed in function name"
							]);
							return;
						}
						if(!function_exists($function_name)){
							echo json_encode([
								'status' => 0,
								'answer' => "Function not found"
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
					'answer' => "Sorry, I cannot answer your question.Please train me. The training data format is  <b>train: question # answer # password</b>"
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
					'answer' => "Invalid training format. <br> Type  <b>train: question # answer # password</b>"
				]);
				return;
			}
			$que = trim($split_string[0]);
			$ans = trim($split_string[1]);

			if(count($split_string) < 3){
				echo json_encode([
					'status' => 0,
					'answer' => "Please enter the training password to train me."
				]);
				return;
			}

			$password = trim($split_string[2]);
			//verify if training password is correct
			define('TRAINING_PASSWORD', 'password');
			if($password !== TRAINING_PASSWORD){
				echo json_encode([
					'status' => 0,
					'answer' => "Sorry you cannot train me."
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
				'answer' => "Yipeee, I have been trained"
			]);
			return;
		}

		echo json_encode([
			'status' => 0,
			'answer' => "Sorry I cannot answer that question, please train me"
		]);
		
	}
	else{
?>

<!DOCTYPE html>
<html lang="en">
<head>

<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
<style type="text/css">
      body {
			
			background-size: cover;
		}
		p{ color:black
		
		}
		h1{ color: blue
		}
		h3{ color: blue
		}
		h5{ color: white
		
		}
		.container{
            width: 100%;
            min-height: 100%
        }
        .body0 {
            height: 100%;
        }

        span {
            display: inline-block;
            vertical-align: middle;
            line-height: normal;
        }
		
		.chat-frame {
			border-color: #cccccc;
			color: #333333;
			background-color: #ffffff;
			padding: 20px;
			height: 550px;
			margin-top: 5%;
			margin-bottom: 50px;
		}

		.chat-messages {
			background-color: lightblue;
			padding: 5px;
			height: 300px;
			overflow-y: auto;
			margin-left: 15px;
			margin-right: 15px;
			border-radius: 6px;
			
		}

		.single-message {
			margin-bottom: 5px; 
			border-radius: 5px;
			min-height: 30px;
			
		}

		.single-message-bg {
			background-color: blue;
			
			
		}

		.single-message-bg2 {
			background-color: darkblue;
			
		}

		input[name=question] {
			height: 50px;
		}

		button[type=submit] {
			height: 50px;
			background-color: blue;
			color: black
		}

		.circle {
			width: 60%;
			margin-left: 20%;
			border-radius: 50%;
		}
		.f-icon {
			font-size: 40px;
		}
   
      </style>

  </head>

  <body style = "background color: #FFFFFF">

<!-- Main Content -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 offset-md-1 frame">
			<div class="row">
				<div class="col-md-12">
				<br/><br/>
					<div class="circle" align="center">
						<img src="http://res.cloudinary.com/iamdharmy/image/upload/v1523622015/iam__dharmy.png" alt="Profile Picture" class="rounded-circle img-fluid" / >
					</div>
				</div>	
			</div>

			<div class="row info">
				<div class="col-md-12">
					<h1 class="text-center">
						Soyombo Oluwadamilola
					</h1>
					<h5 class="text-center">  iam__dharmy</h5>
					<p class="text-center">I am an effective, creative and proactive individual, with a personal objective to build a career in an Information Technology company with a continuous improvement Environment</p>
					<p class="text-center">And so far HNG Internship has been helping in developing my IT skills in order for me to be able to achieve this objective.</p>
				
                    <p class="text-center">This internship has been WOW.
                     I've been able to greatly improve my html/css and design skills, and I have learnt the use of Github, Figma, MySQL, Pivotal Tracker, Dropbox Paper, Laragon and many other tools.</p>
					
				</div>

			</div>
<!--<footer>
			<div>
				<a href="https://github.com/iam-dharmy"><i class="fa fa-github"></i></i></a>&nbsp;&nbsp;
				<a href="https://twitter.com/@iam_dharmy"><i class="fa fa-twitter"></i></i></a>&nbsp;&nbsp;
				<a href="https://medium.com/@damis"><i class="fa fa-medium"></i></i></a>&nbsp;&nbsp;
				<a href="https://web.facebook.com/soyombo.damilola"><i class="fa fa-facebook"></i></i></a>	
			</div>
</footer>-->
</div>
<div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div>
<div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div>
<div>&nbsp;</div>
	<div class="col-md-4 offset-md-1 chat-frame">
			<h2 class="text-center"><u>CHATBOT</u></h2>
			<div class="row chat-messages" id="chat-messages">
				<div class="col-md-12" id="message-frame">
					<div class="row single-message">
						<div class="col-md-12 single-message-bg">
							<h5>Hello <span style="font-weight: bold">iam__bot</span></h5>
						</div>
					</div>
					<div class="row single-message">
						<div class="col-md-12 single-message-bg">
							<h5>Ask me your questions </h5>
						</div>
					</div>
					<div class="row single-message">
						<div class="col-md-12 single-message-bg">
							
							<h5>To train me, type <br/><b>train: question # answer # password</b><h5>
						</div>
					</div>
				</div>
			</div>
			
			
			<div class="row" style="margin-top: 40px;">
				<form class="form-inline col-md-12 col-sm-12" id="question-form">
					<div class="col-md-12 col-sm-12 col-12">
						<input class="form-control w-100" type="text" name="question" placeholder="Enter your message" />
					</div>
					<div class="col-md-12 col-sm-12 col-12" style="margin-top: 20px">
						<button type="submit" class="btn btn-info float-right w-100" >Enter</button>
					</div>
				</form>	
			</div>
		</div>
	</div>
</div>
<!--<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>-->
<!--
	<link href="https://static.oracle.com/cdn/jet/v4.0.0/default/css/alta/oj-alta-min.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>-->
<script>
	
	$(document).ready(function(){
		var questionForm = $('#question-form');
		questionForm.submit(function(e){
			e.preventDefault();
			var questionBox = $('input[name=question]');
			var question = questionBox.val();
			
			//display question in the message frame as a chat entry
			var messageFrame = $('#message-frame');
			var chatToBeDisplayed = '<div class="row single-message">'+
						'<div class="col-md-12 offset-md-2 single-message-bg2">'+
							'<h5>'+question+'</h5>'+
						'</div>'+
					'</div>';
			

			messageFrame.html(messageFrame.html()+chatToBeDisplayed);
			$("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);

			//send question to server
			$.ajax({
				url: "/profiles/iam__dharmy.php",
				type: "post",
				data: {question: question},
				dataType: "json",
				success: function(response){
					if(response.status == 1){
						var chatToBeDisplayed = '<div class="row single-message">'+
									'<div class="col-md-12 single-message-bg">'+
										'<h5>'+response.answer+'</h5>'+
									'</div>'+
								'</div>';

						messageFrame.html(messageFrame.html()+chatToBeDisplayed);
						questionBox.val("");	
						$("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
					}else if(response.status == 0){
						var chatToBeDisplayed = '<div class="row single-message">'+
									'<div class="col-md-12 single-message-bg">'+
										'<h5>'+response.answer+'</h5>'+
									'</div>'+
								'</div>';

						messageFrame.html(messageFrame.html()+chatToBeDisplayed);
						$("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
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
<?php } ?>