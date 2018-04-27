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
<<<<<<< HEAD

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
		require "../answers.php";

		date_default_timezone_set("Africa/Lagos");

		// header('Content-Type: application/json');

=======

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
		require "../answers.php";

		date_default_timezone_set("Africa/Lagos");

		// header('Content-Type: application/json');

>>>>>>> Update profile
		if(!isset($_POST['question'])){
			echo json_encode([
				'status' => 1,
				'answer' => "What is your question"
			]);
			return;
		}
      if($question == 'aboutbot') {							
				echo json_encode([
								'status' => 0,
								'answer' => "v1"
							]);
							return;}
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
<<<<<<< HEAD

<!DOCTYPE html>
<html lang="en">
<head>

<style>
	.form-inline {
		height: auto;
    display: -ms-flexbox;
    /* display: flex; */
    -ms-flex-flow: row wrap;
    /* flex-flow: row wrap; */
    -ms-flex-align: center;
    align-items: center;
    position: fixed;
    width: 52.3%;
    bottom: 5%;
}
	#mainNav {
    position: fixed;
}
	.col-12 {
    padding: 1px;
}
	.btn {
    font-size: 14px;
    font-weight: 800;
    padding: 15px 25px;
    letter-spacing: 1px;
    text-transform: uppercase;
    border-radius: 0;
    border: 0;
    font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    position: fixed;
    bottom: 0;
    width: 50% !important;
    left: 0;
    background: black;
}
.col-md-4 {
    border: 0 !important;
    border-radius: 0 !important;
    margin: 0 !important;
    padding: 0 !important;
    height: 100%;
    text-align: center;
    position: fixed;
    /* width: 50%; */
    left: 0;
    top: 10%;
    background-color: #fff;
}
	.offset-md-1 {
    margin-left: 0 !important;
}
	.col-md-4 {
    -ms-flex: 0 0 33.333333%;
    flex: 0 0 50%;
    max-width: 50%;
    width: 50%;
    position: fixed;
}
	footer { display: none;}
	.profile {
          height: 100%;
    text-align: center;
    position: fixed;
    position: fixed;
    position: fixed;
    width: 50%;
    right: 0;
    background-color: #007bff;
}
	h1 {
    color: blue;
    color: white;
    text-align: center;
    bottom: 50%;
    left: 65%;
    position: fixed;
    font-family: Lato,'Helvetica Neue',Helvetica,Arial,sans-serif;
    font-weight: 700;
}
	p {
    position: fixed;
    bottom: 40%;
    left: 58%;
    line-height: 1.5;
    margin: 30px 0;
}
      </style>


  </head>

=======

<!DOCTYPE html>
<html lang="en">
<head>

<style>
	
	footer { display: none;}
	.profile {
          height: 100%;
    text-align: center;
    position: fixed;
    position: fixed;
    position: fixed;
    width: 50%;
    right: 0;
    background-color: #007bff;
}
	h1 {
    color: blue;
    color: white;
    text-align: center;
    bottom: 50%;
    left: 65%;
    position: fixed;
    font-family: Lato,'Helvetica Neue',Helvetica,Arial,sans-serif;
    font-weight: 700;
}
	p {
    position: fixed;
    bottom: 40%;
    left: 58%;
    line-height: 1.5;
    margin: 30px 0;
}
      </style>

  </head>

>>>>>>> Update profile
		
			<div class="body">
<div class="profile">
						<h1>Dennis Otugo</h1>
						<p>Human Being &nbsp;&bull;&nbsp; Cyborg &nbsp;&bull;&nbsp; Never asked for this</p>

					</div>
</div>

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
				url: "/profiles/dennisotugo.php",
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
