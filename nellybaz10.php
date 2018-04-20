

<!DOCTYPE html>
<html>
<head>
	<title>Nelson's Profile</title>
</head>
<body style="text-align: center; font-family: cursive;">
	<table align="center" width="100%">
		<tr>
			<td>
				
		<div  style="margin:30px 0 0 20%; border:1px solid gray; width: 60%; height: 500px; min-width: 300px; font-size: 14px; min-height: 300px" align="left" class="whole-content">
		<img style="max-width: 200px; max-height: 200px; border-radius: 8px; margin:30px 0 0 30px;" src="profile.jpg">

		<div style="padding-left: 30px">
			<h1>Nelson Bassey</h1>
			<p><b>Country:</b> Nigeria</p>
			<p style="width: 250px"><b>Education:</b>Computer Science student at African Leaderahip University, Rwanda.</p>
			<p><b>Interest:</b> Technology | Music</p>
			<p><b>Skills:</b> Python | HTML/CSS | JavaScript</p>

		</div>
	</div>

	</td>

	<td align="right">
		<div>
			
			<div  style="margin:30px 20% 0 0; border:1px solid gray; width: 50%; height: 500px; min-width: 300px; font-size: 14px; min-height: 300px" align="center" class="whole-content">
				<h3 style="margin-left: 15px; color: navy">I'm Alice, Nelly's smart bot</h3>
				<p>(Are you bored? chat with me)</p>
				<hr>

				<div id="bot-display" style="background-color:; height: 300px; width: 90%; overflow: scroll;">
					<p>Ask me any question, I will give you the answer</p>
					<!--<p>To train me: <br>
					Tell me the question first by typing: <em><b>#your question</b></em><br>
					Then the answer by typing: <em><b>@the answer</b></em><br>
					Then see if I am smart as I said: Ask by typing <br><em><b>your question</b></em></p>
				-->
				</div>

				<div style="width: 100%; position: relative; top: 30px;">
					<table>
						<tr>
							<td style=" width: 80%">					
								<input id="input" style="width: 100%; height: 30px" type="text" name="input">
							</td>
							<td >
								<button id="send" style="width: 100%; height: 35px; background-color: navy; color: white; border:none;">Send</button>
							</td>
						</tr>
					</table>
				</div>
		
			</div>
		</div>
	</td>
		</tr>
	</table>

<?php
include ('../config.example.php');
//include('../db.php');

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if(!$conn){
  echo "couldn't connect";
}
	function display_answer($question){
		//list($keyvalue, $real_question) = explode('?', $question);
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		$question = mysqli_real_escape_string($con, $question);
		$display_query = "SELECT answer FROM bot WHERE question = '$question'";
		$result = mysqli_query($con, $display_query);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_array($result);
			echo "<div class='this'>";
			echo "<p>YOU: ".$question ;
			echo "</p>";
			echo "<p>Alice: ".$row['answer'];
			echo "</p>";
			echo "</div>";
		}
		else{
			echo "<div class='this'>";
			echo "<p>Sorry, I could't process that, probably my knowledge is not that wide. You can train me 
					using the correct format. <br>
					<b>Corrrect Format:</b><br>
					train: your question#your answer@password</p>";
			echo "</div>";
			
		}
		
	
	}


	function add_question($real_question, $real_answer){
		//list($keyvalue, $real_question) = explode('#', $question);		
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		$real_question = mysqli_real_escape_string($con, $real_question);

		//check if already exist

		$check_question = "SELECT * FROM bot WHERE question = '$real_question'";
		$result = mysqli_query($con, $check_question);
		if(mysqli_num_rows($result) > 0){
			echo "<div class='this'>";
			echo "<p>I already know the asnwer to this question, just ask me</p>";
			echo "</div>";
		}else{
		$question_query = "INSERT INTO `bot`(`question`, `answer`) VALUES ('{$real_question}', '{$real_answer}')";
		
		if(mysqli_query($con, $question_query)){
			echo "<div class='this'>";
			echo "<p>Thank you for training me</p>";
			echo "<p>You can now ask that question</p>";
			       echo "</div>";
			
		}
		else{
			echo "<div class='this'>";
			echo "<p><b>Alice:</b> Sorry I couldn't process your question now. Ask again Later!</p?";
			echo "</div>";
		}
		mysqli_close($con);
	}
	}

		function add_answer($answer){
		list($keyvalue, $real_answer) = explode('@', $answer);	
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);	
		$real_answer = mysqli_real_escape_string($con, $real_answer);
		$get_last_id = "SELECT id from bot ORDER BY id DESC LIMIT 1";
		$result = mysqli_query($con, $get_last_id);
		$row = mysqli_fetch_array($result);
		$last_id = $row['id'];
		$answer_query = "UPDATE bot SET answer = '$real_answer' WHERE id = '$last_id'";
		if(mysqli_query($con, $answer_query)){
			echo "<div class='this'>";
			echo "<p>Thank you for training me. <br>
			Now you can ask me that question, and I will answer it.<br>
			Type <b>The question</b></p>";
			echo "</div>";
			
		}
		else{
			echo "<div class='this'>";
			echo "<p>Couldn't learn your answer, mayber it's wrong or I am just too tired. Try again later. Thanks</p>";
			echo "</div>";

		}
		
		mysqli_close($con);
	}

$question = $_POST['question'];
	//echo $question;
	 $x = 0;
	 $count = 3;
	 $count_hash = 0;

	 list($train_word, $question1) = explode(':', $question);
	 list($real_question, $real_answer) = explode('#', $question1);
	 list($real_answer, $pass) = explode('@', $real_answer);
	 
	 $pass = trim($pass);
	 $check_pass = 'password';

	 	if($question[5] == ':' && $pass == $check_pass){
	 		//echo "<div class='this'>";
	 		//echo $question;
	 		//echo "</div>";
	 		$real_question = trim($real_question);
	 		$real_answer = trim($real_answer);
	 		add_question($real_question ,$real_answer);
	 	}

	 	else if($question == 'aboutbot'){
	 			echo "<div class='this'>";
	 			echo "<p>ABOUT BOT<br><br>
	 			Name: Alice.<br>
	 					Version: Alice 1.5.2</p>";
	 			echo "</div>";
	 	}

	 	else{
	 		display_answer($question);
	 	}
	

	//while( $x < $count){
		//	if ($question[$x] == '#') {
			//	add_question($question);
				//break;
	//			}
		//	elseif($question[$x] == '@'){
					
//					add_answer($question);
	//				break;
		//		}
	//		else{
		//		display_answer($question);
			//	break;

		//	}
		//		$x = $x + 1;
		
		//	}
			
	
	
	

			
	
	
	



	}


?>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#send').click(function(){
				//
				var input = $('#input').val();
				//alert(input);
				$('#bot-display').load('profiles/nellybaz10.php .this', {
					question: input
				});
				return false;


				//$.ajax({
				//	url: '',
				//	type: 'post',
				//	data: {question: input},
				//	success: function(response){
						//var data_to_display = "<p>" + response + "</p>";
						//$('#bot-display').text(response);
						
				//			$('#bot-display').html('<p>answer displayed</p>'+response+'<p>seen</p>');
						
				//	}
//
				//});

			});

		});
	</script>

	
</body>
</html>