<?php
echo "i am  here";
include ('../config.example.php');
	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if(!$con){
  echo "couldn't connect";
}

	$question = $_POST['question'];
	 $x = 0;
	 $count = 3;
	 $count_hash = 0;
	

	while( $x < $count){
			if ($question[$x] == '#') {
				add_question($question);
				break;
				}
			elseif($question[$x] == '@'){
					
					add_answer($question);
					break;
				}
			else{
				display_answer($question);
				break;

			}
				$x = $x + 1;
			
			}
			
	
	
	function add_question($question){
		list($keyvalue, $real_question) = explode('#', $question);		
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		$real_question = mysqli_real_escape_string($con, $real_question);
		$question_query = "INSERT INTO `bot`(`question`) VALUES ('{$real_question}')";
		
		if(mysqli_query($con, $question_query)){
			
			echo "<p>Thanks! Now the Answer</p>";
			echo "<p>Tell me the answer by typing: <br>
			       <b>@the asnswer</b></p>";
			
		}
		else{
			echo "<p><b>Alice:</b> Sorry I couldn't process your question now. Ask again Later!</p?";
		}
		mysqli_close($con);
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
			echo "<p>Thank you for training me. <br>
			Now you can ask me that question, and I will answer it.<br>
			Type <b>The question</b></p>";
			
		}
		else{
			echo "<p>Couldn't learn your answer, mayber it's wrong or I am just too tired. Try again later. Thanks</p>";

		}
		
		mysqli_close($con);
	}

	function display_answer($question){
		//list($keyvalue, $real_question) = explode('?', $question);
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		$question = mysqli_real_escape_string($con, $question);
		$display_query = "SELECT answer FROM bot WHERE question = '$question'";
		$result = mysqli_query($con, $display_query);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_array($result);
			echo "<p>YOU: ".$question ;
			echo "</p>";
			echo "<p>Alice: ".$row['answer'];
			echo "</p>";
		}
		else{
			echo "<p>Sorry, your question is too hard for me. But you can train me. Remember I am smart.<br>
					To train me: <br>
					Tell me the question first by typing: <em><b>#your question</b></em><br>
					Then the answer by typing: <em><b>@the answer</b></em><br>
					Then ask
			</p>";
			
		}
		
	}
?>