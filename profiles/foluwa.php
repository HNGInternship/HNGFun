
<html lang="en">
<?php  
	   require_once './db.php'
	 	 // Check connection
		if($link === false){
		    die("ERROR: Could not connect. " . mysqli_connect_error());}
		// Attempt insert query execution
		$sql = "INSERT INTO persons (question, answer) VALUES ('$questions', '$answers')";
		if(mysqli_query($link, $sql)){
		    echo "Records inserted successfully.";
		} else{
		    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	   //GET USER DETAILS 
	   $result = $conn->query("Select * from secret_word LIMIT 1");
	   $result = $result->fetch(PDO::FETCH_OBJ);
	   $secret_word = $result->secret_word;
	   $result2 = $conn->query("Select * from interns_data where username = 'foluwa'");
	   $user = $result2->fetch(PDO::FETCH_OBJ);

	   // Added
	   $name = $data["name"];
		$username = $data["username"];
		$imagelink = $data["image_filename"];
			
	
}	?>

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
		
		if(!isset($_POST['question'])){
			echo json_encode([
				'status' => 1,
				'answer' => "Please provide a question"
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
								'answer' => "I am sorry but I could not find that function"
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
					'answer' => "Unable to answer your question I need more training The training data format is <br> <b>train: question # answer</b>"
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
					'answer' => "Invalid training format. I cannot decipher the answer part of the question. <br> The correct training data format is <br> <b>train: question # answer</b>"
				]);
				return;
			}
			$que = trim($split_string[0]);
			$ans = trim($split_string[1]);
			if(count($split_string) < 3){
				echo json_encode([
					'status' => 0,
					'answer' => "Enter the password to train me."
				]);
				return;
			}
			$password = trim($split_string[2]);
			//verify if training password is correct
			define('TRAINING_PASSWORD', 'trainpwforhng');
			if($password !== TRAINING_PASSWORD){
				echo json_encode([
					'status' => 0,
					'answer' => "You are not authorized to train me"
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
				'answer' => "Thanks Knowldege added!"
			]);
			return;
		}
		echo json_encode([
			'status' => 0,
			'answer' => "Unable to answer your question I need more training"
		]);
		
	}
?>

<?php
	if($_SERVER['REQUEST_METHOD'] === "GET"){
?>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
		<title><?php echo $user->name ?>-Hng Intern</title>
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
						'<div class="col-md-8 offset-md-2 single-message-bg2">'+
							'<p>'+question+'</p>'+
						'</div>'+
						'<div class="col-md-2 single-message-bg2">'+
							'<span class="float-right fa fa-user f-icon"></span>'+
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
									'<div class="col-md-2 single-message-bg">'+
										'<span class="fa fa-user f-icon"></span>'+
									'</div>'+
									'<div class="col-md-8 single-message-bg">'+
										'<p>'+response.answer+'</p>'+
									'</div>'+
								'</div>';
						messageFrame.html(messageFrame.html()+chatToBeDisplayed);
						questionBox.val("");	
						$("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
					}else if(response.status == 0){
						var chatToBeDisplayed = '<div class="row single-message">'+
									'<div class="col-md-2 single-message-bg">'+
										'<span class="fa fa-user f-icon"></span>'+
									'</div>'+
									'<div class="col-md-8 single-message-bg">'+
										'<p>'+response.answer+'</p>'+
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
		<style type="text/css">
			body{
				background-color: #87ceeb;
				background: linear-gradient(to bottom right, #DDA0DD,  #87ceeb);
			}
			header{
				padding-top: 20px;
			}
			footer{
				padding-top: 25px;
				text-align: center;
				font-size: 25px;
				color: blue;
			}
			a{
				padding-left: 20px;
				padding-right: 20px;
			}
			footer > a {
				color: #0000ff;
			}
			#typingEffect {
				padding-top: 70px;
				font-size: 30px;
				font-weight: 40px;
				font-style: Arial,Verdana,Courier;
			}
			#socialMedia {
				padding-top: 30px;
				font-size: 30px;
				text-align: center;
			}
			#socialicons {
				padding-top: 20px;
			}
			#imageSection {
				padding-top: 50px;
				border: 2px solid black;
			}
			#myimage {
				border-radius: 50%;
				display: block; 
				margin-left: auto;
				 margin-right: auto; 
				 width: 50%; 
			}
			input[type=text] {
			    width: 100%;
			    padding: 12px 20px;
			    margin: 8px 0;
			    box-sizing: border-box;
			    border: 2px solid red;
			    border-radius: 4px;
			    background-color: skyblue;
    			color: white;
		    }
			#botSection{
				border: 2px solid black;
				font-size: 50px;
				font-weight: 50px;
				text-align: center;
			}
			#headerTime {
				text-align: right;
				color: #f4e8af;
			}

		</style>
	</head>
	<body class="container-fluid" onload="textType()" width="1oo%;" height="100%;">
		<header class="row" style="color:blue;">
				  <div class="col-sm-4"></div>
				  <div class="col-sm-4"></div>
				  <div class="col-sm-4" id="headerTime"><?php echo date("l jS \of F Y h:i:s A"); ?></div>
		</header>
		<main>
			<div class="row">
				<div class="col-sm-6">
						<section id="imageSection">
							<img id="myimage" src="http://res.cloudinary.com/dv7xj0ovh/image/upload/v1523625641/foludp_ryerff.jpg" alt="foluwa's picture" style="width:300px;height:350px;">
							<section id="typingEffect">
								<div><?php echo $user->name ?>;</div>
								<div id="socialMedia">
									<div id="socialicons">
										<a href="https://facebook.com/akintola.moronfoluwar"><i class="fa fa-facebook"></i></a>
										<a href="https://instagram.com/fantastic_foluwa"><i class="fa fa-instagram"></i></a>
										<a href="https://twitter.com/fantasticfoluwa"><i class="fa fa-twitter"></i></a>
										<a href="https://github.com/foluwa"><i class="fa fa-github"></i></a>
										<a href="https://slack.com/foluwa"><i class="fa fa-slack"></i></a>
									</div>
								</div>
							</section>
						</section>		
				</div>
				<div class="col-sm-6">
					<div> 
						<section id="botSection">MyBOT</section>
							<form action="" method="POST" style="position:relative;display:flex;">
								<label for="botInput"></label>
								<input type="text" name="botInput" width="40%" height="20px" placeholder="Your text goes here..."/>
								<label for="botSubmit"></label>
								<input name="botSubmit" name="submit" type="submit" >
							</form>
						<div><p><?php $mybotInp = $_REQUEST['botInput'];echo "You entered " . $mybotInp;?></p></div>	













							<div class="container-fluid">
										<div class="row">
											<div class="col-md-4 offset-md-1 chat-frame">
												<h2 class="text-center">Chatbot Interface</h2>
												<div class="row chat-messages" id="chat-messages">
													<div class="col-md-12" id="message-frame">
														<div class="row single-message">
															<div class="col-md-2 single-message-bg">
																<span class="fa fa-user f-icon"></span>
															</div>
									
															<div class="col-md-8 single-message-bg">
																<p>Hi! My name is <span style="font-weight: bold">Max</span></p>
															</div>
														</div>
														<div class="row single-message">
															<div class="col-md-2 single-message-bg">
																<span class="fa fa-user f-icon"></span>
															</div>
															<div class="col-md-8 single-message-bg">
																<p>Ask me your questions and I will try to answer them.</p>
															</div>
														</div>
														<div class="row single-message">
															<div class="col-md-2 single-message-bg">
																<span class="fa fa-user f-icon"></span>
															</div>
															<div class="col-md-8 single-message-bg">
																<p>To train me, enter the training string in this format:</p>
																<p><b>train: question # answer</b></p>
															</div>
														</div>
													</div>
												</div>
												<div class="row" style="margin-top: 40px;">
													<form class="form-inline col-md-12 col-sm-12" id="question-form">
														<div class="col-md-12 col-sm-12 col-12">
															<input class="form-control w-100" type="text" name="question" placeholder="Ask a question" />
														</div>
														<div class="col-md-12 col-sm-12 col-12" style="margin-top: 20px">
															<button type="submit" class="btn btn-info float-right w-100">Send</button>
														</div>
													</form>	
												</div>
											</div>
										</div>
									</div>














					</div>
				</div>
			</div>
			<footer>Foluwa @ <a href="https://hotels.ng">Hotels.ng</a></footer>
			<hr style="width:50%"/>
		</main>

		<script>
			window.onload = function() { document.body.className = ''; }
			window.ontouchmove = function() { return false; }
			window.onorientationchange = function() { document.body.scrollTop = 0; }
		</script>
		<?php
		   try {
		       $sql = 'SELECT * FROM secret_word';
		       $q = $conn->query($sql);
		       $q->setFetchMode(PDO::FETCH_ASSOC);
		       $data = $q->fetch();
		   } catch (PDOException $e) {
		       throw $e;
		   }
		   $secret_word = $data['secret_word'];
       ?>
	</body>
</html>